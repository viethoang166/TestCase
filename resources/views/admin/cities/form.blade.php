@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
    @endpush
@endonce

@include('layout.summernote')

@section('content')
    @if (empty($cities))
        <form class="container-fluid" method="post" action="{{ route('cities.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create City</h3>
                @else
                    <form class="container-fluid" method="post" action="{{ route('cities.update', $cities->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit City</h3>
    @endif
    <a href="{{ route('cities.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="container-fluid">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror"
                    id="name" placeholder="" value="{{ old('name', $cities->name ?? '') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">
                <label for="attachment" class="form-label">Image</label>
                <input class="form-control" type="file" id="attachment" name="image">
                @if (!empty($cities))
                    @php
                        $image = base64_encode(Storage::get('admin/image/' . $cities->image) ?? '');
                    @endphp
                    <img width="35%" style="padding-top: 20px" src="{{ 'data:image/png;base64,' . $image }}" alt="">
                @endif
            </div>
        </div>
        <div class="col-md-6">
            @php
                $selected = null;
                if (!empty(old('country_id'))) {
                    $selected = old('country_id');
                } elseif (!empty($cities)) {
                    $selected = $cities->country->id;
                }
            @endphp
            <div class="container-fluid">
                <label for="country_id" class="form-label">Country </label>
                <select name="country_id" id="country_id" class="form-select @error('country_id') is-invalid @enderror">
                    @if (empty($selected))
                        <option value="" selected disabled hidden> country </option>
                    @endif
                    @foreach ($country as $country)
                        <option value="{{ $country->id }}"{{ $selected == $country->id ? ' selected' : '' }}>
                            {{ $country->name }} </option>
                    @endforeach
                </select>
                @error('country_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div style="padding-top: 50px" class="container-fluid">
                <label for="content" class="form-label">Description</label>
                <textarea name="description" id="content" type="text" style="height: 150px;"
                    class="form-control mb-2 @error('description') is-invalid @enderror" id="description">{{ old('description', $cities->description ?? '') }}</textarea>
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
