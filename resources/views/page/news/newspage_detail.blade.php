@extends('layout.master')
@section('main')
 @foreach ($newsdetail as $new)
            @php
                $bannerImage = $new->images->where('banner', 1)->first();
                $base64Banner = base64_encode(Storage::get('news/' . $bannerImage->file) ?? '');
            @endphp
    <div class="newspage-detail" style="width: 100%;">

            <div class="banner-news">
                <div class="banner-image">
                    <img src="{{ 'data:image/png;base64,' . $base64Banner }}" alt="">
                </div>
            </div>

    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="newsdetail-left">
                    <div class="news-detail-text">
                        <h3>{{ $new->title }}</h3>
                    </div>
                    <div class="news-detail">
                        <div class="news-detail-icon">
                            <a class="icon-faa" href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a class="icon-fa" href=""><i class="fa fa-google" aria-hidden="true"></i></a>
                            <a class="icon-fa" href=""> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a class="icon-fa" href=""> <i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </div>
                        <div class="news-detail-date">
                            <p>Tin tức | {{ $new->created_at }}</p>
                        </div>
                    </div>
                    <div class="boder-solid"></div>
                    <div class="text-news">
                        <div class="text-1">
                            {!! $new->content !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-4">
                <div class="newspage-right">
                    <div class="news-text">
                        <h3>Tin tức và sự kiện</h3>
                    </div>
                    <div class="container news-background">
                        <div class="news-right-boder">
                            @foreach ($news as $new)
                                @php
                                    $bannerImage = $new->images->where('banner', 1)->first();
                                    $base64Banner = base64_encode(Storage::get('news/' . $bannerImage->file) ?? '');
                                @endphp
                                <div class="news-right">
                                    <div class="media">
                                        <a href="{{ route('newspage_detail', ['id' => $new->id]) }}">
                                            <img width="200px" height="150px"
                                                src="{{ 'data:image/png;base64,' . $base64Banner }}" title=""
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="{{ route('newspage_detail', ['id' => $new->id]) }}"><h5 class="mt-0 mb-1">{{ $new->title }}</h5></a>
                                    </div>
                                </div>
                                <div class="news-date">
                                    <div>
                                        <p>Tin tức</p>
                                    </div>
                                    <div>
                                        <p>{{ $new->created_at }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop()
