@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
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
            <h1 style="padding-left: 5px">Danh sách ảnh banner trang giới thiệu</h1>
        </div>
        @php
            $id = 1;
        @endphp
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center" scope="col">STT</th>
                    <th style="text-align:center" scope="col">Preview</th>
                    <th style="text-align:center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($introductionSlides))
                    @foreach ($introductionSlides as $introductionSlide)
                        @php
                            $link = 'https://via.placeholder.com/960x250.png';
                            if ($file = Storage::get(\App\Models\IntroductionSlide::BANNER_PATH . $introductionSlide->file)) {
                                $link = 'data:image/png;base64, ' . base64_encode($file);
                            }
                        @endphp
                        <tr>
                            <td style="text-align:center">{{ $id++ }}</td>
                            <td style="text-align:center"><img height="100px" src="{{ $link }}" alt=""></td>

                            <td style="text-align:center">
                                <form class="d-inline" method="post"
                                    action="{{ route('introduction-slide.destroy', $introductionSlide->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <form method="post" action="{{ route('introduction-slide.store') }}" enctype="multipart/form-data">
                        @csrf
                        <td style="text-align:center"> Thêm mới </td>

                        <td style="text-align:center">
                            <input class="form-control" type="file" id="attachment" name="file">
                        </td>

                        <td style="text-align:center">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
