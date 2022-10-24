<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CountryRequest;
use App\Models\Contact;
use App\Repositories\Admin\Country\CountryRepository;
use App\Models\Country;


class CountryController extends Controller
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function index()
    {
        return view('admin.country.index', [
            'countries' => $this->countryRepository->orderBy('id', 'DESC')->paginate(),
        ]);
    }


    public function create()
    {
        return view('admin.country.form');
    }

    public function store(CountryRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalName = explode('.', $file->getClientOriginalName());
            $name = $originalName[0];
            $filename = uniqid() . '.' . $originalName[1];
            $file->storeAs('admin/image/', $filename);
            $data['image'] = $filename;
        }
        $this->countryRepository->save($data);
        return redirect()->route('country.index')->with('message', 'Successful added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if (!$countries = $this->countryRepository->findById($id)) {
            abort(404);
        }
        return view('admin.country.form', [
            'countries' => $countries,
        ]);
    }

    public function update(CountryRequest $request, $id)
    {
        if (!$countries = $this->countryRepository->findById($id)) {
            abort(404);
        }
        $filePath = storage_path('app' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR);

        $data = $request->all();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $originalName = explode('.', $file->getClientOriginalName());
            $name = $originalName[0];
            $filename = uniqid() . '.' . $originalName[1];
            $file->storeAs('admin/image/', $filename);

            if(!empty($countries->image)){
                unlink($filePath . $countries->image);
            }
            $data['image'] = $filename;
        }
        $this->countryRepository->save($data, ['id' => $id]);
        return redirect()->route('country.index');
    }


    public function destroy($id)
    {
        $this->countryRepository->deleteById($id);

        return redirect()->route('country.index');

    }

    public function showForm()
    {
    	$countries = Country::all();

    	return view('schools.form', compact('countries'));
    }
}
