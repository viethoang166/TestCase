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
    @if (empty($coreValue))
        <form class="container-fluid" method="post" action="{{ route('core-value.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create Core-Value</h3>
                @else
                    <form class="container-fluid" method="post" action="{{ route('core-value.update', $coreValue->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit User</h3>
    @endif
    <a href="{{ route('core-value.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>
    <div class="container-fluid">
        <label for="title" class="form-label">Title</label>
        <textarea name="title" type="text" class="form-control mb-2 @error('title') is-invalid @enderror" id="title"
            placeholder="">{{ old('title', $coreValue->title ?? '') }}</textarea>
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="container-fluid">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" style="height:200px" type="text"
            class="form-control mb-2 @error('description') is-invalid @enderror" id="description">{{ old('description', $coreValue->description ?? '') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">
        <label for="attachment" class="form-label">Image</label>
        <input class="form-control" type="file" id="attachment" name="image">
        @if (!empty($coreValue))
            @php
                $image = base64_encode(Storage::get('admin/core-value/' . $coreValue->image) ?? '');
            @endphp
            <img height="200px" src="{{ 'data:image/png;base64,' . $image }}" alt="">
        @endif
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
