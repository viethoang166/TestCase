@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">
    @endpush

@endonce

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container-fluid">
        <div>
            <h1>Danh sách tin tức & sự kiện</h1>
            <div class="news-category-admin">
                <form class="form-inline" method="GET" action="{{ route('newsfilteradmin') }}">
                    <div class="input-group">
                        <select class="form-select adminnew-cate" name="type" id="inputGroupSelect04"
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
                        <div class="button-newsadmin">
                            <button class="btn-search fa fa-search adminnew-but " type="submit"></button>
                        </div>
                    </div>
                </form>
            </div>
            <a href="{{ route('news.create') }}" class="btn btn-new" style="margin-left: 8px;">+Addnew</a>
        </div>
        <table class="table" style="border-bottom-width:0px;">

            <thead>
                <tr>
                    <th style="text-align:center;width: 5%" scope="col">Stt</th>
                    <th style="text-align:center;width: 20%" scope="col">Title</th>
                    <th style="text-align:center;width: 10%" scope="col">Image</th>
                    <th style="text-align:center;width: 30%" scope="col">Content</th>
                    <th style="text-align:center;width: 5%" scope="col">Type</th>
                    <th style="text-align:center;width: 10%" scope="col">Status</th>
                    <th style="text-align:center;width: 15%" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($news))
                    @foreach ($news as $key => $new)
                        @php
                            $bannerImage = $new->images->where('banner', 1)->first();
                            $base64Banner = base64_encode(Storage::get('news/' . $bannerImage->file) ?? '');
                        @endphp
                        <tr style="padding:10px;">
                            <td style="text-align:center">{{ $key + 1 }}</td>
                            <td>
                                <div
                                    style="display: block;
                                text-align:center;
                                display: -webkit-box;
                                /* height: 150px; */
                                font-size: 16px;
                                line-height: 2.3;
                                -webkit-line-clamp: 3;  /* số dòng hiển thị */
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis;">
                                    {{ $new->title }}
                                </div>
                            </td>
                            <td style="text-align:center"><img width="60%"
                                    src="{{ 'data:image/png;base64,' . $base64Banner }}" alt=""></td>
                            <td style="">
                                <div
                                    style="display: block;
                                display: -webkit-box;
                                font-size: 16px;
                                /* height: 150px; */
                                line-height: 1.3;
                                -webkit-line-clamp: 5;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis;">
                                    {!! $new->content !!}

                                </div>
                            </td>
                            <td style="text-align:center">
                                @switch($new->type)
                                    @case(0)
                                        News
                                    @break

                                    @case(1)
                                        Event
                                    @break
                                @endswitch
                            </td>
                            <td style="text-align:center">
                                <form class="d-inline" method="post" action="{{ route('news.status', $new->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $new->id }}">
                                    <input type="hidden" name="status" value="{{ $new->status == 1 ? '0' : '1' }}">
                                    <button type="submit"
                                        class="btn btn-{{ $new->status == 1 ? 'success' : 'danger' }}">{{ $new->status == 1 ? 'Public' : 'Private' }}</button>
                                </form>
                            </td>
                            <td style="text-align:center">
                                <a href="{{ route('news.edit', $new->id) }}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="post" action="{{ route('news.destroy', $new->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        
            @if (!empty($news))
                <div class="float-left">
                    <strong>{{ 'Show ' . $news->count() . ' in ' . $news->total() }}</strong>
                </div>
                {{ $news->links() }}
            @endif
 
    </div>
@endsection
