@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
    @endpush

@endonce

@include('layout.summernote')

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    @if (empty($news))
        <form class="container-fluid" method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Thêm mới tin tức</h3>
                @else
                    <form class="container-fluid" method="post" action="{{ route('news.update', $news->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Chỉnh sửa bài post</h3>
    @endif
    <a href="{{ route('news.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>
    <div class="container-fluid">
        <label for="title" class="form-label">Title</label>
        <textarea name="title" type="textarea" class="form-control mb-2 @error('title') is-invalid @enderror" id="title">{{ old('title', $news->title ?? '') }}</textarea>
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="container-fluid">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" type="text" style="height: 300px;"
            class="form-control mb-2 @error('title') is-invalid @enderror" id="content">{{ old('content', $news->content ?? '') }}</textarea>
        @error('content')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    @php
        $status = old('status', $news->status ?? 1);
        $type = old('type', $news->type ?? 1);
    @endphp
    <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">
        <label for="created_at" class="form-label" style="margin-right: 10px;">Status</label>
        <select class="form-select" name="status" aria-label="Default select example">
            <option value="1" @if ($status == 1) selected @endif>Yes</option>
            <option value="0" @if ($status == 0) selected @endif>No</option>
        </select>
    </div>

    <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">
        <label for="created_at" class="form-label" style="margin-right: 10px;">Type</label>
        <select class="form-select" name="type" aria-label="Default select example">
            <option value="1" @if ($type == 1) selected @endif>Event</option>
            <option value="0" @if ($type == 0) selected @endif>News</option>
        </select>
    </div>
    @php
        // $banner = old('banner', $news->images->pluck('banner')->search(1) ?? '')
    @endphp
    <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">
        <label for="attachment" class="form-label">Image</label>
        <div class="input-group-btn">
            <button class="btn btn-success btnAddImage" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
        </div>
        @if (!empty($news->images))
            @php
                $i = 0;
            @endphp
            @foreach ($news->images as $image)
                @php
                    $base64Image = base64_encode(Storage::get('news/' . $image->file) ?? '');
                @endphp
                <div class="imageblock">
                    <div class="form-check increment">
                        <div class="form-check-label d-inline-flex">
                            <input type="file" name="image[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-danger btnRemoveImage" style="margin-top: 0px" type="button"><i
                                        class="glyphicon glyphicon-remove"></i> Remove</button>
                            </div>
                        </div>
                        <input class="form-check-input" style="margin-left: 15px" name="banner" type="radio"
                            id="inlineCheckbox1" value="{{ $i++ }}"
                            @if ($image->banner == 1) checked @endif>
                    </div>
                    <img width="50px" style="margin-bottom: 10px" src="{{ 'data:image/png;base64,' . $base64Image }}"
                        alt="">
                </div>
            @endforeach
        @else
            <div class="imageblock">
                <div class="form-check increment">
                    <div class="form-check-label d-inline-flex">
                        <input type="file" name="image[]" class="form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-success btnAddImage" style="margin-top: 0px" type="button"><i
                                    class="glyphicon glyphicon-plus"></i>Add</button>
                        </div>
                    </div>
                    <input class="form-check-input" style="margin-left: 15px" name="banner" type="radio"
                        id="inlineCheckbox1" value="0">
                </div>
            </div>
        @endif
        @error('banner')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </div>
    </form>

    <script type="text/javascript">
        $(document).ready(function() {
            let i = $('.imageblock').last().find('.form-check-input').val();
            $(".btnAddImage").click(function() {
                let html = `
        <div class="imageblock">
          <div class="form-check" style="margin-top:10px">
            <div class="form-check-label d-inline-flex">
              <input type="file" name="image[]" class="form-control">
              <div class="input-group-btn">
                <button class="btn btn-danger btnRemoveImage" style="margin-top: 0px" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
              </div>
            </div>
            <input class="form-check-input" style="margin-left: 15px" name="banner" type="radio" id="inlineCheckbox1" value="${++i}">
          </div>
        </div>
      `;
                $(".imageblock").parent().append(() => html);
            });

            $("body").on("click", ".btnRemoveImage", function() {
                $(this).parents(".imageblock").remove();
            });

        });
    </script>
@endsection
