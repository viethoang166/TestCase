@extends('layout.master')
@section('main')
    <div class="newspage" style="width: 100%;">
        <div class="banner-wrapper">
            <div class="banner-image">
                <img src="{{ url('../image') }}/logo/image-banner-new.png" alt="">
            </div>
            <div class="banner-overlay"></div>
            <h1 class="banner-text">Tin tức & sự kiện</h1>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="newspage-left">
                    <div class="news-text d-flex justify-content-between">
                        <h3>Tin tức & sự kiện</h3>
                        <div class="news-category">
                            <form class="form-inline" method="GET" action="{{ route('newsfilter') }}">
                                <div class="input-group">
                                    <select class="form-select"name="type" id="inputGroupSelect04"
                                        aria-label="Example select with button addon">
                                        <option selected>Thể loại...</option>
                                        @for ($i = 0; $i < 2; $i++)
                                            <option value="{{ $i }}">
                                                @switch($i)
                                                    @case(0)
                                                        Tin tức
                                                    @break

                                                    @case(1)
                                                        Sự kiện
                                                    @break

                                                    @default
                                                @endswitch
                                            </option>
                                        @endfor
                                    </select>
                                    <button class="btn-search fa fa-search" type="submit"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="container news-background ">
                        <div class="row">
                            @foreach ($news as $new)
                                @php
                                    $bannerImage = $new->images->where('banner', 1)->first();
                                    $base64Banner = base64_encode(Storage::get('news/' . $bannerImage->file) ?? '');
                                @endphp
                                <div class="col-lg-4">
                                    <div class="card">
                                        <a href="{{ route('newspage_detail', ['id' => $new->id]) }}">
                                            <img width="100%" height="200px"
                                                src="{{ 'data:image/png;base64,' . $base64Banner }}" title=""
                                                alt="">
                                        </a>
                                        <div class="card-body" style="height: 250px; overflow-y:hidden;">
                                            <h5 class="card-title"><a
                                                    href="{{ route('newspage_detail', ['id' => $new->id]) }}">{{ $new->title }}</a>
                                            </h5>
                                            <div class="card-text">{!! $new->content !!}</div>
                                        </div>
                                        <div class="news-icon">
                                            <a class="icon-fa" href=""><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a>
                                            <a class="icon-fa" href=""><i class="fa fa-google"
                                                    aria-hidden="true"></i></a>
                                            <a class="icon-fa" href=""> <i class="fa fa-instagram"
                                                    aria-hidden="true"></i></a>
                                            <a class="icon-fa" href=""> <i class="fa fa-twitter"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="paginate-news" style="padding-left: 360px">
                            @if (!empty($news))
                            {{ $news->links() }}
                        @endif
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="newspage-right">
                    <div class="news-text">
                        <h3>Tin tức & sự kiện</h3>
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
                                            <img src="{{ 'data:image/png;base64,' . $base64Banner }}" title=""
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="{{ route('newspage_detail', ['id' => $new->id]) }}">
                                            <h5 class="mt-0 mb-1">{{ $new->title }}</h5>
                                        </a>
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
