@extends('admin.layout.master')
@section('content')
    @once
        @push('head')
            <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
        @endpush
        @push('script')
            <script>
                $(function() {
                    $('#datepicker').datepicker();
                });
            </script>
        @endpush
    @endonce

    @if (empty($courses))
        <form class="container-fluid" method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create Courses</h3>
                @else
                    <form class="container-fluid" method="post" action="{{ route('courses.update', $courses->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit Courses</h3>
    @endif
    <a href="{{ route('courses.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>
    <div class="container-fluid">
        <label for="name" class="form-label">Name</label>
        <textarea name="name" type="textarea" class="form-control mb-2 @error('name') is-invalid @enderror" id="name">{{ old('name', $courses->name ?? '') }}</textarea>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="container-fluid">
        <label for="note" class="form-label">Note</label>
        <textarea name="note" type="text" style="height: 300px;"
            class="form-control mb-2 @error('note') is-invalid @enderror" id="note">{{ old('note', $courses->note ?? '') }}</textarea>
        @error('note')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    @php
        $selected = null;
        if (!empty(old('majors_id'))) {
            $selected = old('majors_id');
        } elseif (!empty($courses)) {
            $selected = $courses->majors->id;
        }
    @endphp
    <div class="container-fluid">
        <label for="majors_id" class="form-label">Majors</label>
        <select name="majors_id" id="majors_id" class="form-select @error('majors_id') is-invalid @enderror">
            @if (empty($selected))
                <option value="" selected disabled hidden>Select majors</option>
            @endif
            @foreach ($majors as $major)
                <option value="{{ $major->id }}"{{ $selected == $major->id ? ' selected' : '' }}>
                    {{ $major->name }} </option>
            @endforeach
        </select>
        @error('country_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="container-fluid">
        <label for="tuition" class="form-label">Tuition</label>
        <input name="tuition" id="id" class="form-control mb-2 @error('tuition') is-invalid @enderror"
            value="{{ old('tuition', $courses->tuition ?? '') }}">
        @error('tuition')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="container-fluid">
                <label for="timestart" class="form-label">Start</label>
                <input name="timestart" type="date" id="id"
                    class="form-control mb-2 @error('timestart') is-invalid @enderror"
                    value="{{ old('timestart', $courses->timestart ?? '') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="container-fluid">
                <label for="timeend" class="form-label">End</label>
                <input name="timeend" type="date" id="id"
                    class="form-control mb-2 @error('timeend') is-invalid @enderror"
                    value="{{ old('timeend', $courses->timeend ?? '') }}">
            </div>
            @error('timeend')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-4"></div>
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
