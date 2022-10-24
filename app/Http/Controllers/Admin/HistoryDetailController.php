<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\HistoryDetail\HistoryDetailRepository;
use App\Http\Requests\Admin\HistoryDetailRequest;

class HistoryDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $historyDetailRepository;

    public function __construct(HistoryDetailRepository $historyDetailRepository)
    {
        $this->historyDetailRepository = $historyDetailRepository;
    }

    public function index()
    {
        return view('admin.history-detail.index',[
            'historyDetails' => $this->historyDetailRepository->orderBy('id', 'DESC')->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.history-detail.form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HistoryDetailRequest $request)
    {
        $this->historyDetailRepository->save($request->validated());
        return redirect()->route('history-detail.index')->with(
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
        if (! $historyDetail = $this->historyDetailRepository->findById($id)) {
            abort(404);
        }

        return view('admin.history-detail.form', [
            'historyDetail' => $historyDetail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HistoryDetailRequest $request, $id)
    {

        $this->historyDetailRepository->save($request->validated(), ['id' => $id]);

        return redirect()->route('history-detail.index')->with(
            'success',
            'Edit completed successfully.'
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
        $this->historyDetailRepository->deleteById($id);

        return redirect()->route('history-detail.index')->with(
            'success',
            'Deleted successfully.'
        );
    }
}
