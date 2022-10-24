<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\UpdateNewsRequest;
use App\Repositories\Admin\News\NewsRepository;
use App\Repositories\Admin\Image_news\Image_newsRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\News;



class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $newsRepository;
    protected $image_newsRepository;

    public function __construct(NewsRepository $newsRepository, Image_newsRepository $image_newsRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->image_newsRepository = $image_newsRepository;
    }

    public function index()
    {
        return view('admin.news.index', [
            'news' => $this->newsRepository->orderBy('created_at', 'DESC')->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::guard('admin')->user()->id;

        $newsRepository = $this->newsRepository->save($data);

        if ($request->hasFile('image')) {
            $i = 0;
            foreach ($request->file('image') as $image) {
                $originalName = explode('.', $image->getClientOriginalName());
                $name = $originalName[0];
                $filename = uniqid() . '.' . $originalName[1];

                $image->storeAs('news', $filename);
                $newsRepository->images()->create([
                    'name' => $name,
                    'file' => $filename,
                    'banner' => ($i == $data['banner']),
                ]);
                $i++;
            }
        }

        return redirect()->route('news.index')->with(
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
        if (!$news = $this->newsRepository->findById($id)) {
            abort(404);
        }

        return view('admin.news.form', [
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        if (!$new = $this->newsRepository->findById($id)) {
            abort(404);
        }
        $fileDir = storage_path('app\\news\\');

        $data = $request->validated();

        $this->newsRepository->save($data, ['id' => $id]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $no => $file) {
                // Lưu file vào trước
                $originalName = explode('.', $file->getClientOriginalName());
                $name = $originalName[0];
                $filename = uniqid() . '.' . $originalName[1];
                $file->storeAs('news', $filename);

                // Kiểm tra xem new đã có image này chưa
                if ($new->images->has($no)) {
                    $image = $new->images->get($no);

                    // Xóa file nếu tồn tại
                    if (is_file($fileDir . $image->file)) {
                        unlink($fileDir . $image->file);
                    }

                    // Cập nhật ảnh
                    $image->name = $name;
                    $image->file = $filename;
                    $image->save();
                } else {
                    $new->images()->create([
                        'name' => $name,
                        'file' => $filename,
                    ]);
                }
            }
        }
        foreach ($new->refresh()->images as $no => $image) {
            $image->banner = ($no == $data['banner']);
            $image->save();
        }

        return redirect()->route('news.index')->with(
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
        if (!$new = $this->newsRepository->findById($id)) {
            abort(404);
        }
        $fileDir = storage_path('app\\news\\');
        // Xóa file nếu tồn tại
        foreach ($new->images as $image) {
            if (is_file($fileDir . $image->file)) {
                unlink($fileDir . $image->file);
            }
        }
        $this->newsRepository->deleteById($id);

        return redirect()->route('news.index')->with(
            'success',
            'Deletion completed successfully.'
        );
    }
    public function changeStatus(Request $request)
    {
        $input = $request->all();
        if (! $new = $this->newsRepository->findById($input['id'])) {
            abort(404);
        }
        $this->newsRepository->save($input, ['id' => $input['id']]);
        return redirect()->route('news.index')->with(
            'success',
            'Edit active successfully.'
        );
    }

    public function NewsFilteringadmin(Request $request)
    {
        $filter = $request->query('type');

        if (isset($filter)) {
            $news = News::where('type', '=', $filter)->where('status' , '=', 1 )
                ->paginate(5);
        } else {
            $news = News::paginate(5);
        }
        return view('admin.news.index', [
            'news' => $news,
        ]);
    }
}
