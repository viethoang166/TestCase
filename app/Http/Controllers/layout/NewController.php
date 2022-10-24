<?php

namespace App\Http\Controllers\layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Image_news;


class NewController extends Controller
{
    public function index()
    {
        $news = News::select('id', 'title','type','status', 'content','created_at')->orderBy('created_at', 'DESC')->where('status', 1)->paginate(6);
        $news_image = Image_news::select('id', 'name', 'file')->where('banner', 1)->get();
        return view('page.news.newspage',compact('news', 'news_image'));
    }

    public function news_detail(Request $request, $id)
    {
        $news = News::select('id', 'title','type','status', 'content','created_at')->orderBy('created_at', 'DESC')->where('status', 1)->paginate(4);
        $newsdetail = news::where('id', $id)->where('status', 1)->get();
        $newsdetail_image = Image_news::select('id', 'name', 'file')->where('banner', 1)->get();
        return view('page.news.newspage_detail',compact('newsdetail', 'newsdetail_image','news'));
    }
    public function NewsFiltering(Request $request)
    {
        $filter = $request->query('type');

        if (isset($filter)) {
            $news = News::where('type', '=', $filter)->where('status' , '=', 1 )
                ->paginate(5);
        } else {
            $news = News::paginate(5);
        }
        return view('page.news.newspage', [
            'news' => $news,
        ]);
    }
}
