<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\School\SchoolRepository;
use App\Repositories\Admin\Scholarship\ScholarshipRepository;
use App\Http\Requests\Admin\ScholarshipRequest;


class ScholarshipController extends Controller
{
    protected $schoolRepository;
    protected $scholarshipRepository;

    public function __construct(SchoolRepository $schoolRepository, ScholarshipRepository $scholarshipRepository)
    {
        $this->schoolRepository = $schoolRepository;
        $this->scholarshipRepository = $scholarshipRepository;

    }

    public function index()
    {
        return view('admin.scholarships.index', [
            'scholarships' => $this->scholarshipRepository->paginate()
        ]);
    }

    public function create()
    {
        return view('admin.scholarships.form', [
            'school' => $this->schoolRepository->getAll(),
        ]);
    }

    public function store(ScholarshipRequest $request)
    {
        // dd($request->all());
        $this->scholarshipRepository->save($request->validated());
        return redirect()->route('scholarships.index')->with(
            'success',
            'Creation completed successfully.'
        );
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if (!$scholarships = $this->scholarshipRepository->findById($id)) {
            abort(404);
        }
        return view('admin.scholarships.form', [
            'scholarships' => $scholarships,
            'school' => $this->schoolRepository->getAll(),
        ]);
    }

    public function update(ScholarshipRequest $request, $id)
    {
        $this->scholarshipRepository->save($request->validated(), ['id' => $id]);

        return redirect()->route('scholarships.index')->with(
            'success',
            'Updation completed successfully.'
        );
    }


    public function destroy($id)
    {
        $this->scholarshipRepository->deleteById($id);

        return redirect()->route('scholarships.index')->with(
            'success',
            'Deleted successfully.'
        );
    }

    public function changeStatus(Request $request)
    {
        $input = $request->all();
        if (! $scholarships = $this->scholarshipRepository->findById($input['id'])) {
            abort(404);
        }
        $this->scholarshipRepository->save($input, ['id' => $input['id']]);
        return redirect()->route('scholarships.index')->with(
            'success',
            'Edit active successfully.'
        );
    }
}
