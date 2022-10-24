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
    @if (empty($historyDetail))
        <form class="container-fluid" method="post" action="{{ route('history-detail.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create History Detail</h3>
                @else
                    <form class="container-fluid" method="post" action="{{ route('history-detail.update', $historyDetail->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit History-detail</h3>
    @endif
    <a href="{{ route('history-detail.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>
    
    <div class="container-fluid">
        <label for="year" class="form-label">Year</label>
        <textarea name="year" style="" type="text"
            class="form-control mb-2 @error('year') is-invalid @enderror" id="year">{{ old('year', $historyDetail->year ?? '') }}</textarea>
        @error('year')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="container-fluid">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" style="height:200px;" type="text"
            class="form-control mb-2 @error('description') is-invalid @enderror" id="description">{{ old('description', $historyDetail->description ?? '') }}</textarea>
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
