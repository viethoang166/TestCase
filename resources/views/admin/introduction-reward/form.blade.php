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
    @if (empty($introductionReward))
        <form class="container-fluid" method="post" action="{{ route('introduction-reward.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create Introduction Reward</h3>
                @else
                    <form class="container-fluid" method="post"
                        action="{{ route('introduction-reward.update', $introductionReward->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit Introduction Reward</h3>
    @endif
    <a href="{{ route('introduction-reward.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>
    <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">
        <label for="attachment" class="form-label">Icon</label>
        @if (!isset($isShow))
            <input class="form-control" type="file" id="attachment" name="icon">
        @endif
        @if (!empty($introductionReward))
            @php
                $link = url('');
                if ($image = Storage::get(\App\Models\IntroductionReward::ICON_PATH . $introductionReward->icon)) {
                    $link = 'data:image/png;base64, ' . base64_encode($image);
                }
            @endphp
            <img width="100px" src="{{ $link }}" alt="">
        @endif
    </div>
    <div class="container-fluid">
        <label for="title" class="form-label">Title</label>
        <input name="title" type="text" class="form-control mb-2 @error('title') is-invalid @enderror" id="title"
            placeholder="" value="{{ old('title', $introductionReward->title ?? '') }}"
            @isset ($isShow) readonly @endisset>
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" style="height:200px;" type="text"
            class="form-control mb-2 @error('description') is-invalid @enderror" id="description" @isset ($isShow) readonly @endisset>{{ old('description', $introductionReward->description ?? '') }}</textarea>
        @error('description')
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
@endsection
