@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if (empty($service))
        <form class="container-fluid" method="post" action="{{ route('service.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create Service</h3>
                @else
                    <form class="container-fluid" method="post" action="{{ route('service.update', $service->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit Service</h3>
    @endif
    <a href="{{ route('service.index') }}" class="btn btn-primary">Back</a>
    </div>
    <div class="col-md-12">
        <div class="container-fluid">
            <label for="created_at" class="form-label" style="margin-right: 10px;">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $service->name ?? '') }}">
            @error('name')
                <span class="invalid-service" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="container-fluid">
            <label for="created_at" class="form-label" style="margin-right: 10px;">Active</label>
            <select class="form-select" name="active" aria-label="Default select example">
                <option value="0"@if(isset($service) && $service->active == 0) selected @endif>Private</option>
                <option value="1"@if(isset($service) && $service->active == 1) selected @endif>Public</option>
            </select>
            @error('active')
                <span class="invalid-service" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="container-fluid">
            <label for="created_at" class="form-label" style="margin-right: 10px;">Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <span class="invalid-service" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="container-fluid">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" rows="6" name="description">{{ old('description', $service->description ?? '') }}</textarea>
            @error('description')
                <span class="invalid-service" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="container-fluid">
            <input type="hidden" name="user_id" value="{{ $user_id }}">
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
