<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CityRequest;
use App\Repositories\Admin\Country\CountryRepository;
use App\Repositories\Admin\City\CityRepository;
use App\Models\City;
use App\Models\Country;



class CityController extends Controller
{
    protected $countryRepository;
    protected $cityRepository;

    public function __construct(CountryRepository $countryRepository , CityRepository $cityRepository)
    {
        $this->countryRepository = $countryRepository;
        $this->cityRepository = $cityRepository;
    }


    public function index()
    {
        return view('admin.cities.index', [
            'country' => $this->countryRepository->getAll(),
            'cities' => $this->cityRepository->orderBy('id', 'DESC')->paginate(),
        ]);
    }


    public function create()
    {
        return view('admin.cities.form', [
            'country' => $this->countryRepository->getAll(),
        ]);
    }


    public function store(CityRequest $request)
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
        $this->cityRepository->save($data);

        return redirect()->route('cities.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        if (!$cities = $this->cityRepository->findById($id)) {
            abort(404);
        }
        return view('admin.cities.form', [
            'cities' => $cities,
            'country' => $this->countryRepository->getAll()
        ]);
    }


    public function update(CityRequest $request, $id)
    {
        if (! $cities = $this->cityRepository->findById($id)) {
            abort(404);
        }
        $filePath = storage_path('app\\admin\\image\\');

        $data = $request->all();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $originalName = explode('.', $file->getClientOriginalName());
            $name = $originalName[0];
            $filename = uniqid() . '.' . $originalName[1];
            $file->storeAs('admin/image/', $filename);

            if(!empty($cities->image)){
                unlink($filePath . $cities->image);
            }
            $data['image'] = $filename;
        }
        $this->cityRepository->save($data, ['id' => $id]);

        return redirect()->route('cities.index')->with(
            'success',
            'Edit completed successfully.'
        );
    }

    public function destroy($id)
    {
        $this->cityRepository->deleteById($id);

        return redirect()->route('cities.index');
    }

    public function showCitiesInCountry(Request $request)
	{
		if ($request->ajax()) {
			$provinces = \App\Models\Country::where('id', $request->country_id)->firstOrFail()->cities;
            
            //$provinces = \App\Models\Country::findOrFail($request->country_id)->provinces;

			return response()->json($provinces);
		}
        
	}
}
