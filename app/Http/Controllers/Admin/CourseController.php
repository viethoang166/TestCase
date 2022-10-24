<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\Course\CourseRepository;
use App\Repositories\Admin\Majors\MajorsRepository;
use App\Http\Requests\Admin\CourseRequest;



class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $courseRepository;
    protected $majorsRepository;

    public function __construct(CourseRepository $courseRepository, MajorsRepository $majorsRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->majorsRepository = $majorsRepository;

    }

    public function index()
    {
        return view('admin.courses.index', [
            'courses' => $this->courseRepository->paginate()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.form',[
            'majors' => $this->majorsRepository->getAll(),
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $this->courseRepository->save($request->validated());

        return redirect()->route('courses.index')->with(
            'success',
            'Creation completed successfully.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$courses = $this->courseRepository->findById($id)) {
            abort(404);
        }

        // dd($courses->timestart->format('d-m-Y'));

        return view('admin.courses.form', [
            'courses' => $courses,
            'majors' => $this->majorsRepository->getAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $this->courseRepository->save($request->validated(), ['id' => $id]);

        return redirect()->route('courses.index')->with(
            'success',
            'Updation completed successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->courseRepository->deleteById($id);

        return redirect()->route('courses.index')->with(
            'success',
            'Deleted successfully.'
        );
    }
}
