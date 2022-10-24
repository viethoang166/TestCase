<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IntroductionAbout;
use App\Repositories\Admin\IntroductionAbout\IntroductionAboutRepository;

class IntroductionAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected $introductionAboutRepository;

    public function __construct(IntroductionAboutRepository $introductionAboutRepository)
    {
        $this->introductionAboutRepository = $introductionAboutRepository;
    }

    public function index()
    {
        return redirect()->route('introduction-about.show', -1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!$this->introductionAboutRepository->getAll()->isEmpty()) {
            return redirect()->route('introduction-about.show', -1);
        }

        return view('admin.introduction-about.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$this->introductionAboutRepository->getAll()->isEmpty()) {
            return redirect()->route('introduction-about.show', -1);
        }

        $data = $request->validate([
            'image' => 'required',
            'description' => 'required',
        ]);

        $file = $request->file('image');
        $extension = current(array_slice(explode('.', $file->getClientOriginalName()), -1));
        $fileName = uniqid() . '.' . $extension;
        $file->storeAs(IntroductionAbout::IMAGE_PATH, $fileName);
        $data['image'] = $fileName;
        $this->introductionAboutRepository->save($data);

        return redirect()->route('introduction-about.show', -1)->with(
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
        $introductionAbouts = $this->introductionAboutRepository->getAll();
        if ($introductionAbouts->isEmpty()) {
            return redirect()->route('introduction-about.create');
        }

        return view('admin.introduction-about.form', [
            'isShow' => true,
            'introductionAbout' => $introductionAbouts->first(),
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
        $introductionAbouts = $this->introductionAboutRepository->getAll();
        if ($introductionAbouts->isEmpty()) {
            return redirect()->route('introduction-about.create');
        }

        return view('admin.introduction-about.form', [
            'introductionAbout' => $introductionAbouts->first(),
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
        $introductionAbouts = $this->introductionAboutRepository->getAll();
        if ($introductionAbouts->isEmpty()) {
            return redirect()->route('introduction-about.create');
        }
        $introductionAbout = $introductionAbouts->first();

        $data = $request->validate([
            'image' => 'nullable',
            'description' => 'required',
        ]);

        $data['image'] = $introductionAbout->image;
        if ($request->hasFile('image')){
            $filePath = storage_path('app' . DIRECTORY_SEPARATOR . IntroductionAbout::IMAGE_PATH . $introductionAbout->image);
            if (is_file($filePath)) unlink($filePath);

            $file = $request->file('image');
            $extension = current(array_slice(explode('.', $file->getClientOriginalName()), -1));
            $fileName = uniqid() . '.' . $extension;
            $file->storeAs(IntroductionAbout::IMAGE_PATH, $fileName);
            $data['image'] = $fileName;
        }
        $this->introductionAboutRepository->save($data, ['id' => $introductionAbout->id]);

        return redirect()->route('introduction-about.show', -1)->with(
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
        return redirect()->route('introduction-about.show', -1);
    }
}
