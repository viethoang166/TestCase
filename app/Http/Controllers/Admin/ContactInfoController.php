<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ContactInfoRequest;
use App\Models\ContactInfo;
use App\Repositories\Admin\ContactInfo\ContactInfoRepository;
use App\Repositories\Admin\Country\CountryRepository;
use App\Repositories\Admin\Level\LevelRepository;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $contactInfoRepository;
    protected $countryRepository;
    protected $levelRepository;

    public function __construct(ContactInfoRepository $contactInfoRepository, CountryRepository $countryRepository, LevelRepository $levelRepository)
    {
        $this->contactInfoRepository = $contactInfoRepository;
        $this->countryRepository = $countryRepository;
        $this->levelRepository = $levelRepository;
    }

    public function index()
    {
        return view('admin.contact-info.index', [
            'contactInfos' => $this->contactInfoRepository->paginate(),
            'countries' => $this->countryRepository->getAll(),
            'levels' => $this->levelRepository->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact-info.form', [
            'countries' => $this->countryRepository->getAll(),
            'levels' => $this->levelRepository->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactInfoRequest $request)
    {
        $data = $request->validated();
        $data['status'] = 0;
        $this->contactInfoRepository->save($data);
        return redirect()->route('contact-info.index')->with('message', 'Successful added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$contactInfo = $this->contactInfoRepository->findById($id)) {
            abort(404);
        }
        return view('admin.contact-info.form', [
            'contactInfo' => $this->contactInfoRepository->findById($id),
            'countries' => $this->countryRepository->getAll(),
            'levels' => $this->levelRepository->getAll(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactInfoRequest $request, $id)
    {
       $this->contactInfoRepository->save($request->validated(), ['id' => $id]);
       return redirect()->route('contact-info.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->contactInfoRepository->deleteById($id);
        return redirect()->route('contact-info.index');
    }

    public function changeStatus(Request $request, $id)
    {
        $status = $request->post('status');
        $status = (($status + 1) < count(\App\Models\ContactInfo::STATUS)) ? $status + 1 : 0;

        if (! $contactInfo = $this->contactInfoRepository->findById($id)) {
            abort(404);
        }

        $contactInfo->status = $status;
        $contactInfo->save();

        return redirect()->route('contact-info.index');
    }
}
