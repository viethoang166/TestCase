<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IntroductionSlide;
use App\Repositories\Admin\IntroductionSlide\IntroductionSlideRepository;


class IntroductionSlideController extends Controller
{
    protected $introductionSlideRepository;

    public function __construct(IntroductionSlideRepository $introductionSlideRepository)
    {
        $this->introductionSlideRepository = $introductionSlideRepository;
    }

    public function index()
    {
        return view('admin.introduction-slide.index', [
            'introductionSlides' => $this->introductionSlideRepository->paginate(),
        ]);
    }
        
    public function create()
    {
        return redirect()->route('introduction-slide.index');
    }
        
    public function store(Request $request)
    {
        $request->validate(['file' => 'required']);

        $file = $request->file('file');
        $extension = current(array_slice(explode('.', $file->getClientOriginalName()), -1));
        $fileName = uniqid() . '.' . $extension;
        $file->storeAs(IntroductionSlide::BANNER_PATH, $fileName);
        $this->introductionSlideRepository->save([
            'file' => $fileName,
        ]);

        return redirect()->route('introduction-slide.index')->with(
            'success',
            'Creation completed successfully.'
        );
    }
        
    public function show($id)
    {
        return redirect()->route('introduction-slide.index');
    }
        
    public function edit($id)
    {
        return redirect()->route('introduction-slide.index');
    }
        
    public function update(Request $request, $id)
    {
        return redirect()->route('introduction-slide.index');
    }
        
    public function destroy($id)
    {
        if (! $introductionSlide = $this->introductionSlideRepository->findById($id)) {
            abort(404);
        }

        $filePath = storage_path('app' . DIRECTORY_SEPARATOR . IntroductionSlide::BANNER_PATH . $introductionSlide->file);
        if (is_file($filePath))
        unlink($filePath);

        $this->introductionSlideRepository->deleteById($id);

        return redirect()->route('introduction-slide.index')->with(
            'success',
            'Deletion completed successfully.'
        );
    }
}
