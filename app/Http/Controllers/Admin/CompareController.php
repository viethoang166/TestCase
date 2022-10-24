<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Repositories\Admin\Compare\CompareRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CompareRequest;
use App\Models\City;
use App\Repositories\School\SchoolRepositoryInterface as SchoolRepository;
use App\Repositories\Admin\Country\CountryRepositoryInterface as CountryRepository;
use App\Repositories\Admin\Feedback\FeedbackRepositoryInterface as FeedbackRepository;
use App\Repositories\Admin\Level\LevelRepositoryInterface as LevelRepository;

use Illuminate\Support\Facades\DB;

class CompareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $compareRepository;

    protected $schoolRepository;
     protected $countryRepository;
     protected $feedbackRepository;
     protected $levelRepository;
  
    

    public function __construct(SchoolRepository $schoolRepository, CountryRepository $countryRepository,  FeedbackRepository $feedbackRepository, LevelRepository $levelRepository)
    {
        $this->schoolRepository = $schoolRepository;
        $this->countryRepository = $countryRepository;
        $this->feedbackRepository = $feedbackRepository;
        $this->levelRepository = $levelRepository;
        
        
    }
    
    

    public function index()
    {

        /*$schools = $this->schoolRepository->findById(1);
        $schools1 = $this->schoolRepository->findById(2);
        $schools2 = $this->schoolRepository->findById(3);
        $schools3 = $this->schoolRepository->findById(4);
        //$school = School::all()->sortByDesc("id");
        return view('page.compare',[
        'schools' => $schools,
        'schools1' => $schools1,
        'schools2' => $schools2,
        'schools3' => $schools3,
        ]);*/

        $schools = School::paginate(4);
        return view('page.compare', [
            'schools' => $schools,
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
        //return view('admin.compare.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('page.compare');
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
    public function update(CompareRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
