@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
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
    @if (isset($isShow))
        <form class="container-fluid">
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Show Introduction About</h3>
                @elseif (empty($introductionVision))
                    <form class="container-fluid" method="post" action="{{ route('introduction-vision.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Create Introduction Vision</h3>
                            @else
                                <form class="container-fluid" method="post"
                                    action="{{ route('introduction-vision.update', $introductionVision->id) }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="d-flex justify-content-between">
                                            <h3>Edit Introduction Vision</h3>
    @endif
    <a href="{{ route('introduction-vision.show', -1) }}" class="btn btn-primary">Back</a>
    </div>
    </div>
    <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">
        <label for="attachment" class="form-label">background</label><br>
        @if (!isset($isShow))
            <input class="form-control" type="file" id="attachment" name="background">
        @endif
        @if (!empty($introductionVision))
            @php
                $link = '';
                if ($file = Storage::get(\App\Models\IntroductionVision::BACKGROUND_PATH . $introductionVision->background)) {
                    $link = 'data:image/png;base64, ' . base64_encode($file);
                }
            @endphp
            <img height="400px" src="{{ $link }}" alt="">
        @endif
    </div>
    <div class="container-fluid">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" style="height:400px" type="text" class="form-control mb-2 @error('description') is-invalid @enderror"
            id="description" @isset($isShow) readonly @endisset>{{ old('description', $introductionVision->description ?? '') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row mt-3">
        @if (isset($isShow))
            <div class="d-flex justify-content-center">
                <a href="{{ route('introduction-vision.edit', -1) }}" class="btn btn-primary">
                    Edit
                </a>
            </div>
        @else
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        @endif
    </div>
    </form>
@endsection
