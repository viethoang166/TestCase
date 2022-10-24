<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\SchoolRequest;
use App\Repositories\School\SchoolRepositoryInterface as SchoolRepository;
use App\Repositories\Admin\Majors\MajorsRepositoryInterface as MajorsRepository;
use App\Repositories\ImageSchool\ImageSchoolRepositoryInterface as ImageSchoolRepository;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter as S3Adapter;
use App\Repositories\Admin\Country\CountryRepositoryInterface as CountryRepository;
use App\Models\Country;
use App\Http\Requests\Admin\UpdateSchoolRequest;
use App\Models\School;

class SchoolController extends Controller
{
    protected $schoolRepository;
    protected $majorsRepository;
    protected $imageschoolRepository;

    public function __construct(
        SchoolRepository $schoolRepository,
        ImageSchoolRepository $imageschoolRepository,
        MajorsRepository $majorsRepository,
        CountryRepository $countryRepository
    ) {
        $this->schoolRepository = $schoolRepository;
        $this->majorsRepository = $majorsRepository;
        $this->imageschoolRepository = $imageschoolRepository;
        $this->countryRepository = $countryRepository;
    }

    public function index(Request $request)
    {
        return view('admin.schools.index', [
            'schools' => $this->schoolRepository->with('country')->paginate(),
            'countries' => $this->countryRepository->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.schools.form', [
            'majors' => $this->majorsRepository->getAll(),
            'countries' => Country::all(),
        ]);
    }

    public function store(SchoolRequest $request)
    {
        $data = $request->validated();
        $schoolRepository = $this->schoolRepository->save($data);

        $schoolRepository->majors()->sync($request->input('major_ids'));

        if ($request->hasFile('image')) {
            $i = 0;
            foreach ($request->file('image') as $image) {
                $originalName = explode('.', $image->getClientOriginalName());
                $name = $originalName[0];
                $filename = uniqid() . '.' . $originalName[1];
                $path = $image->store('/news');
                $schoolRepository->images()->create([
                    'name' => $name,
                    'file' => $path,
                    'banner' => $i == $data['banner'],
                ]);
                $i++;
            }
        }

        return redirect()
            ->route('schools.index')
            ->with('success', 'Creation completed successfully.');
    }

    public function show()
    {
    }

    public function edit($id)
    {
        if (!($schools = $this->schoolRepository->findById($id))) {
            abort(404);
        }

        return view('admin.schools.form', [
            'schools' => $schools,
            'majors' => $this->majorsRepository->getAll(),
            'countries' => Country::all(),
        ]);
    }

    public function update(UpdateSchoolRequest $request, $id)
    {
        if (!($school = $this->schoolRepository->findById($id))) {
            abort(404);
        }
        $fileDir = storage_path('app/');
        $data = $request->validated();
        $this->schoolRepository->save($data, ['id' => $id]);
        $school->majors()->sync($request->input('major_ids'));

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $no => $file) {
                // Lưu file vào trước
                //dd($file);
                $originalName = explode('.', $file->getClientOriginalName());
                $name = $originalName[0];
                $filename = uniqid() . '.' . $originalName[1];
                $path = $file->store('news');
                //dd($path);
                //$path = $request->file('image')->store('news'.$filename,'s3');
                // Kiểm tra xem new đã có image này chưa
                if ($school->images->has($no)) {
                    $image = $school->images->get($no);

                    // Xóa file nếu tồn tại
                    if (is_file($fileDir . $image->file)) {
                        unlink($fileDir . $image->file);
                    }

                    // Cập nhật ảnh
                    $image->name = $name;
                    $image->file = $path;
                    $image->save();
                } else {
                    $school->images()->create([
                        'name' => $name,
                        'file' => $path,
                    ]);
                }
            }
        }
        foreach ($school->refresh()->images as $no => $image) {
            $image->banner = $no == $data['banner'];
            $image->save();
        }

        return redirect()
            ->route('schools.index')
            ->with('success', 'Update completed successfully.');
    }

    public function destroy($id)
    {
        if (!($school = $this->schoolRepository->findById($id))) {
            abort(404);
        }
        $fileDir = storage_path('app/');
        // Xóa file nếu tồn tại
        foreach ($school->images as $image) {
            if (is_file($fileDir . $image->file)) {
                unlink($fileDir . $image->file);
            }
        }
        $this->schoolRepository->deleteById($id);

        return redirect()
            ->route('schools.index')
            ->with('success', 'Deletion completed successfully.');
    }

    public function indexFiltering(Request $request)
    {
        //dd($request);
        $filter = $request->query('country');

        if (!empty($filter)) {
            $schools = School::sortable()
                ->where('schools.country_id', 'like', '%' . $filter . '%')
                ->paginate(5);
        } else {
            $schools = School::sortable()->paginate(5);
        }

        //return view('schools.index')->with('schools', $schools);
        return view('admin.schools.index', [
            'schools' => $schools,
            'countries' => $this->countryRepository->getAll(),
        ]);
    }
}
