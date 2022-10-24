@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if (empty($customer))
        <form class="container-fluid" method="post" action="{{ route('customer.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create Customer</h3>
                @else
                    <form class="container-fluid" method="post" action="{{ route('customer.update', $customer->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit Customer</h3>
    @endif
    <a href="{{ route('customer.index') }}" class="btn btn-primary">Back</a>
    </div>
    <div class="col-md-6">
        <div class="container-fluid">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror"
                id="name" placeholder="" value="{{ old('name', $customer->name ?? '') }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="container-fluid">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="text" class="form-control mb-2 @error('email') is-invalid @enderror"
                id="email" placeholder="" value="{{ old('email', $customer->email ?? '') }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="container-fluid">
            <label for="phone" class="form-label">Phone</label>
            <input name="phone" type="text" class="form-control mb-2 @error('phone') is-invalid @enderror"
                id="phone" placeholder="" value="{{ old('phone', $customer->phone ?? '') }}">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="container-fluid">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror"
                id="password" value="{{ old('password', $customer->password ?? '') }}" placeholder="">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="container-fluid">
            <label for="age" class="form-label">Age</label>
            <input name="age" type="text" class="form-control mb-2 @error('age') is-invalid @enderror" id="age"
                placeholder="" value="{{ old('age', $customer->age ?? '') }}">
            @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="container-fluid">
            <label for="created_at" class="form-label" style="margin-right: 10px;">Sex</label>
            <select class="form-select" name="sex" aria-label="Default select example">
                <option value="Nam">Male</option>
                <option value="Nữ">Female</option>
            </select>
            @error('sex')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="container-fluid">
            <label for="created_at" class="form-label" style="margin-right: 10px;">Active</label>
            <select class="form-select" name="active" aria-label="Default select example">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            @error('active')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="container-fluid" style="margin-top:20px; margin-bottom:20px;">
        <label for="attachment" class="form-label">Avatar</label>
        <input class="form-control" type="file" id="attachment" name="avata">
        @error('avata')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @if (!empty($customer))
            <img width="100px" src="{{ asset($customer->avata) }}" alt="">
        @endif
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
