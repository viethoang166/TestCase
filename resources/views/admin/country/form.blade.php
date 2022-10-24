@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
    @endpush
@endonce

@include('layout.summernote')

@section('content')
    @if (empty($countries))
        <form class="container-fluid" method="post" action="{{ route('country.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create Country</h3>
                @else
                    <form class="container-fluid" method="post" action="{{ route('country.update', $countries->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit Country</h3>
    @endif
    <a href="{{ route('country.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="container-fluid">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror"
                    id="name" placeholder="" value="{{ old('name', $countries->name ?? '') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="container-fluid">
                <label for="code" class="form-label">code</label>
                <input name="code" type="text" class="form-control mb-2 @error('code') is-invalid @enderror"
                    id="code" placeholder="" value="{{ old('code', $countries->code ?? '') }}">
                @error('code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="container-fluid">
                <label for="content" class="form-label">Description</label>
                <textarea name="description" id="content" type="text" style="height: 150px;"
                    class="form-control mb-2 @error('description') is-invalid @enderror" id="description">{{ old('description', $countries->description ?? '') }}</textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="container-fluid" style="margin-bottom:20px;">
                <label for="attachment" class="form-label">Image</label>
                <input class="form-control" type="file" id="attachment" name="image">
                @if(!empty($countries))
                    @php
                    $image = base64_encode(Storage::get('admin/image/'. $countries->image) ?? '');
                    @endphp
                    <img width="35%" style="padding-top: 20px" src="{{ 'data:image/png;base64,'. $image }}" alt="">
                @endif
            </div>

        </div>
        <div class="row mt-3">
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </div>
    </form>
@endsection
