<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\Majors\MajorsRepository;
use App\Http\Requests\Admin\MajorsRequest;
use Illuminate\Http\Request;

class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $majorsRepository;

    public function __construct(MajorsRepository $majorsRepository)
    {
        $this->majorsRepository = $majorsRepository;
    }

    public function index()
    {
        return view('admin.majors.index',[
            'majors' => $this->majorsRepository->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.majors.form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MajorsRequest $request)
    {
        $this->majorsRepository->save($request->validated());

        return redirect()->route('majors.index')->with(
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
        if (!$majors = $this->majorsRepository->findById($id)) {
            abort(404);
        }
        return view('admin.majors.form', [
            'majors' => $majors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MajorsRequest $request, $id)
    {
        $this->majorsRepository->save($request->validated(), ['id' => $id]);

        return redirect()->route('majors.index')->with(
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
        $this->majorsRepository->deleteById($id);

        return redirect()->route('majors.index')->with(
            'success',
            'Deleted successfully.'
        );
    }
}
