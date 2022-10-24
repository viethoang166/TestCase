<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IntroductionVision;
use App\Repositories\Admin\IntroductionVision\IntroductionVisionRepository;

class IntroductionVisionController extends Controller
{
    protected $introductionVisionRepository;

    public function __construct(IntroductionVisionRepository $introductionVisionRepository)
    {
        $this->introductionVisionRepository = $introductionVisionRepository;
    }

    public function index()
    {
        return redirect()->route('introduction-vision.show', -1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!$this->introductionVisionRepository->getAll()->isEmpty()) {
            return redirect()->route('introduction-vision.show', -1);
        }

        return view('admin.introduction-vision.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$this->introductionVisionRepository->getAll()->isEmpty()) {
            return redirect()->route('introduction-vision.show', -1);
        }

        $data = $request->validate([
            'description' => 'required',
            'background' => 'required',
        ]);

        $file = $request->file('background');
        $extension = current(array_slice(explode('.', $file->getClientOriginalName()), -1));
        $fileName = uniqid() . '.' . $extension;
        $file->storeAs(IntroductionVision::BACKGROUND_PATH, $fileName);
        $data['background'] = $fileName;
        $this->introductionVisionRepository->save($data);

        return redirect()->route('introduction-vision.show', -1)->with(
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
        $introductionVisions = $this->introductionVisionRepository->getAll();
        if ($introductionVisions->isEmpty()) {
            return redirect()->route('introduction-vision.create');
        }

        return view('admin.introduction-vision.form', [
            'isShow' => true,
            'introductionVision' => $introductionVisions->first(),
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
        $introductionVisions = $this->introductionVisionRepository->getAll();
        if ($introductionVisions->isEmpty()) {
            return redirect()->route('introduction-vision.create');
        }

        return view('admin.introduction-vision.form', [
            'introductionVision' => $introductionVisions->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $introductionVisions = $this->introductionVisionRepository->getAll();
        if ($introductionVisions->isEmpty()) {
            return redirect()->route('introduction-vision.create');
        }
        $introductionVision = $introductionVisions->first();

        $data = $request->validate([
            'background' => 'nullable',
            'description' => 'required',
        ]);

        $data['background'] = $introductionVision->background;
        if ($request->hasFile('background')){
            $filePath = storage_path('app' . DIRECTORY_SEPARATOR . IntroductionVision::BACKGROUND_PATH . $introductionVision->background);
            if (is_file($filePath)) unlink($filePath);

            $file = $request->file('background');
            $extension = current(array_slice(explode('.', $file->getClientOriginalName()), -1));
            $fileName = uniqid() . '.' . $extension;
            $file->storeAs(IntroductionVision::BACKGROUND_PATH, $fileName);
            $data['background'] = $fileName;
        }
        $this->introductionVisionRepository->save($data, ['id' => $introductionVision->id]);

        return redirect()->route('introduction-vision.show', -1)->with(
            'success',
            'Update completed successfully.'
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
        return redirect()->route('introduction-vision.show', -1);
    }
}
