<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\History\HistoryRepository;
use App\Http\Requests\Admin\HistoryRequest;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $historyRepository;

    public function __construct(HistoryRepository $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }

    public function index()
    {
        return view('admin.history.index',[
            'history' => $this->historyRepository->orderBy('id', 'DESC')->paginate(),
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.history.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HistoryRequest $request)
    {
        
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = explode('.', $image->getClientOriginalName());
            $name = $originalName[0];
            $filename = uniqid() . '.' . $originalName[1];

            $image->storeAs('admin/history/', $filename);
            $data['image'] = $filename;
        }

        $this->historyRepository->save($data);

        return redirect()->route('history.index')->with(
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
        if (! $history = $this->historyRepository->findById($id)) {
            abort(404);
        }

        return view('admin.history.form', [
            'history' => $history,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HistoryRequest $request, $id)
    {
        if (! $history = $this->historyRepository->findById($id)) {
            abort(404);
        }
        $filePath = storage_path('app\\admin\\history\\');

        $data = $request->validated();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $originalName = explode('.', $image->getClientOriginalName());
            $name = $originalName[0];
            $filename = uniqid() . '.' . $originalName[1];
            $image->storeAs('admin/history/', $filename);

            if(!empty($history->image)){
                unlink($filePath . $history->image);
            }
            $data['image'] = $filename;
        }
        $this->historyRepository->save($data, ['id' => $id]);

        return redirect()->route('history.index')->with(
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
        if (! $history = $this->historyRepository->findById($id)) {
            abort(404);
        }
        $filePath = storage_path('app\\admin\\history\\');

        if(!empty($history->image)){
            unlink($filePath . $history->image);
        }
        $this->historyRepository->deleteById($id);

        return redirect()->route('history.index')->with(
            'success',
            'Deletion completed successfully.'
        );
    }
}
