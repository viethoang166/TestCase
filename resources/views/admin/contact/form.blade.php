@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if (isset($edit))
        <form class="container-fluid" method="post" action="{{ route('contact.update', $contact->id) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Chi tiết liên hệ</h3>
                    <a href="{{ route('contact.show', 1) }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="container-fluid">
                <label for="title" class="form-label">Hotline</label>
                <input type="text" value="{{ $contact->hotline }}" class="form-control" name="hotline">
                @error('hotline')
                    <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            <div class="container-fluid">
                <label for="title" class="form-label">Email</label>
                <input type="text" value="{{ $contact->email }}" class="form-control" name="email">
                @error('email')
                    <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            <div class="container-fluid">
                <label for="title" class="form-label">Address</label>
                <input type="text" value="{{ $contact->address }}" class="form-control" name="address">
                @error('address')
                    <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            <div class="container-fluid">
                <label for="title" class="form-label">Facebook</label>
                <input type="text" value="{{ $contact->facebook }}" class="form-control" name="facebook">
                @error('facebook')
                    <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            <div class="container-fluid">
                <label for="title" class="form-label">Zalo</label>
                <input type="text" value="{{ $contact->zalo }}" class="form-control" name="zalo">
                @error('zalo')
                    <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            <div class="container-fluid">
                <label for="title" class="form-label">Map</label>
                <textarea name="map" id="" cols="30" rows="5" class="form-control">{{ $contact->map }}</textarea>
                @error('map')
                    <span class="text-danger text-left">{{ $message }}</span>
                @enderror
            </div>
            <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">
                <label for="attachment" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <span class="text-danger text-left">{{ $message }}</span>
                @enderror
                <br>
                <img src="{{ $contact->image }}" width="100px">

            </div>
            <div class="row mt-3">
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary" value="Save">

                </div>
            </div>
        </form>
    @endif
    @if (isset($show))
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <form class="container-fluid" method="post" action="{{ route('contact.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Chi tiết liên hệ</h3>
                    <a href="{{ route('contact.edit', 1) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
            <div class="container-fluid">
                <label for="title" class="form-label">Hotline</label>
                <input type="text" value="{{ $contact->hotline }}" class="form-control" disabled>
            </div>
            <div class="container-fluid">
                <label for="title" class="form-label">Email</label>
                <input type="text" value="{{ $contact->email }}" class="form-control" disabled>
            </div>
            <div class="container-fluid">
                <label for="title" class="form-label">Address</label>
                <input type="text" value="{{ $contact->address }}" class="form-control" disabled>
            </div>
            <div class="container-fluid">
                <label for="title" class="form-label">Facebook</label>
                <input type="text" value="{{ $contact->facebook }}" class="form-control" disabled>
            </div>
            <div class="container-fluid">
                <label for="title" class="form-label">Zalo</label>
                <input type="text" value="{{ $contact->zalo }}" class="form-control" disabled>
            </div>
            <div class="container-fluid">
                <label for="title" class="form-label">Map</label>
                <input type="text" value="{{ $contact->map }}" class="form-control" disabled>
            </div>
            <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">
                <label for="attachment" class="form-label">Image</label>
                <img src="{{ $contact->image }}" width="70%">

            </div>
        </form>
    @endif
@endsection
