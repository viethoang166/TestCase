@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if (empty($feedback))
        <form class="container-fluid" method="post" action="{{ route('feedback.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create Feedback</h3>
                @else
                    <form class="container-fluid" method="post" action="{{ route('feedback.update', $feedback->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit Feedback</h3>
    @endif
    <a href="{{ route('feedback.index') }}" class="btn btn-primary">Back</a>
    </div>
    <div class="col-md-3">
        <div class="container-fluid">
            <label for="created_at" class="form-label" style="margin-right: 10px;">Type</label>
            <select class="form-select" name="type" aria-label="Default select example">
                <option value="0"@if(isset($feedback) && $feedback->type == 0) selected @endif>Text</option>
                <option value="1"@if(isset($feedback) && $feedback->type == 1) selected @endif>Video</option>
            </select>
            @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="container-fluid">
            <label for="created_at" class="form-label" style="margin-right: 10px;">Status</label>
            <select class="form-select" name="status" aria-label="Default select example">
                <option value="0"@if(isset($feedback) && $feedback->status == 0) selected @endif>Private</option>
                <option value="1"@if(isset($feedback) && $feedback->status == 1) selected @endif>Public</option>
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="container-fluid">
            <label for="created_at" class="form-label" style="margin-right: 10px;">Customer</label>
            <select class="form-select" name="customer_id" aria-label="Default select example">
                <option value="" disabled>Select...</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}"@if(isset($feedback) && $feedback->customer_id == $customer->id) selected @endif>{{ $customer->name }}</option>
                @endforeach
            </select>
            @error('feedback_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="container-fluid">
            <label for="created_at" class="form-label" style="margin-right: 10px;">School</label>
            <select class="form-select" name="school_id" aria-label="Default select example">
                <option value="" disabled>Select...</option>
                @foreach($schools as $school)
                    <option value="{{ $school->id }}"@if(isset($feedback) && $feedback->school_id == $school->id) selected @endif>{{ $school->name }}</option>
                @endforeach
            </select>
            @error('school_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="container-fluid">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" rows="6" name="content">{{ old('content', $feedback->content ?? '') }}</textarea>
            @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
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
