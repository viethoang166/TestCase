<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoreValue;
use App\Repositories\Admin\CoreValue\CoreValueRepository;
use App\Http\Requests\Admin\CoreValueRequest;


class CoreValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $coreValueRepository;

    public function __construct(CoreValueRepository $coreValueRepository)
    {
        $this->coreValueRepository = $coreValueRepository;
    }

    public function index()
    {
        return view('admin.core-value.index',[
            'coreValues' => $this->coreValueRepository->orderBy('id', 'DESC')->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.core-value.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoreValueRequest $request)
    {
        
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = explode('.', $image->getClientOriginalName());
            $name = $originalName[0];
            $filename = uniqid() . '.' . $originalName[1];

            $image->storeAs(CoreValue::IMAGE_PATH, $filename);
            $data['image'] = $filename;
        }

        $this->coreValueRepository->save($data);

        return redirect()->route('core-value.index')->with(
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
        if (! $coreValue = $this->coreValueRepository->findById($id)) {
            abort(404);
        }

        return view('admin.core-value.form', [
            'coreValue' => $coreValue,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoreValueRequest $request, $id)
    {
        if (! $coreValue = $this->coreValueRepository->findById($id)) {
            abort(404);
        }
        $filePath = storage_path('app\\admin\\core-value\\');

        $data = $request->validated();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $originalName = explode('.', $image->getClientOriginalName());
            $name = $originalName[0];
            $filename = uniqid() . '.' . $originalName[1];
            $image->storeAs(CoreValue::IMAGE_PATH, $filename);

            if(!empty($coreValue->image)){
                unlink($filePath . $coreValue->image);
            }
            $data['image'] = $filename;
        }
        $this->coreValueRepository->save($data, ['id' => $id]);

        return redirect()->route('core-value.index')->with(
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
        if (! $coreValue = $this->coreValueRepository->findById($id)) {
            abort(404);
        }
        $filePath = storage_path('app\\admin\\core-value\\');

        if(!empty($coreValue->image)){
            unlink($filePath . $coreValue->image);
        }
        $this->coreValueRepository->deleteById($id);

        return redirect()->route('core-value.index')->with(
            'success',
            'Deletion completed successfully.'
        );
    }
}
