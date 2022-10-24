@extends('admin.layout.master')
@section('content')
    @once
        @push('head')
            <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
        @endpush
    @endonce
    @include('layout.summernote')
    @if (empty($scholarships))
        <form class="container-fluid" method="post" action="{{ route('scholarships.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create Scholarship</h3>
                @else
                    <form class="container-fluid" method="post"
                        action="{{ route('scholarships.update', $scholarships->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit Scholarship</h3>
    @endif
    <a href="{{ route('scholarships.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="container-fluid">
                    <label for="name" class="form-label">Name</label>
                    <textarea name="name" type="textarea" placeholder="name scholarship" class="form-control mb-2 @error('name') is-invalid @enderror" id="name">{{ old('name', $scholarships->name ?? '') }}</textarea>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="container-fluid">
                    <label for="type" class="form-label">Scholarship money</label>
                    <textarea name="type" type="textarea" placeholder="1000$-10000$/Free tuition" class="form-control mb-2 @error('type') is-invalid @enderror"
                        id="type">{{ old('type', $scholarships->type ?? '') }}</textarea>
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <label for="condition" class="form-label">Condition</label>
        <textarea name="condition" id="content" type="text" style="height: 300px;"
            class="form-control mb-2 @error('condition') is-invalid @enderror">{{ old('condition', $scholarships->condition ?? '') }}</textarea>
        @error('condition')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    @php
        $selected = null;
        if (!empty(old('school_id'))) {
            $selected = old('school_id');
        } elseif (!empty($scholarships)) {
            $selected = $scholarships->school->id;
        }
    @endphp
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">

                <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">
                    <label for="school_id" class="form-label">School</label>
                    <select name="school_id" id="school_id" class="form-select @error('school_id') is-invalid @enderror">
                        @if (empty($selected))
                            <option value="" selected disabled hidden>Select school</option>
                        @endif
                        @foreach ($school as $scho)
                            <option value="{{ $scho->id }}"{{ $selected == $scho->id ? ' selected' : '' }}>
                                {{ $scho->name }} </option>
                        @endforeach
                    </select>
                    @error('country_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                @php
                    $status = old('status', $scholarships->status ?? 1);
                @endphp
                <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">
                    <label for="created_at" class="form-label" style="margin-right: 10px;">Status</label>
                    <select class="form-select" name="status" aria-label="Default select example">
                        <option value="1" @if ($status == 1) selected @endif>Yes</option>
                        <option value="0" @if ($status == 0) selected @endif>No</option>
                    </select>
                </div>
            </div>
        </div>
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
