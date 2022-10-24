@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if (empty($user))
        <form class="container-fluid" method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3>Create user</h3>
                @else
                    <form class="container-fluid" method="post" action="{{ route('user.update', $user->id) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h3>Edit User</h3>
    @endif
    <a href="{{ route('user.index') }}" class="btn btn-primary">Back</a>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="container-fluid">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror"
                    id="name" placeholder="" value="{{ old('name', $user->name ?? '') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="container-fluid">
                <label for="age" class="form-label">Age</label>
                <input name="age" type="text" class="form-control mb-2 @error('age') is-invalid @enderror"
                    id="age" placeholder="" value="{{ old('age', $user->age ?? '') }}">
                @error('age')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="container-fluid">
                <label for="sex" class="form-label">Sex</label>
                <select class="form-select mb-2 @error('sex') is-invalid @enderror" name="sex" id="sex">
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
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="container-fluid">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="text" class="form-control mb-2 @error('email') is-invalid @enderror"
                    id="email" placeholder="" value="{{ old('email', $user->email ?? '') }}">
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
                    id="phone" placeholder="" value="{{ old('phone', $user->phone ?? '') }}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <label for="address" class="form-label">Address</label>
        <input name="address" type="text" class="form-control mb-2 @error('address') is-invalid @enderror" id="address"
            placeholder="" value="{{ old('address', $user->address ?? '') }}">
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="container-fluid">
                <label for="type" class="form-label">Type</label>
                <select class="form-select mb-2 @error('type') is-invalid @enderror" id="type" name="type">
                    @foreach (\App\Models\User::TYPES as $type => $value)
                        <option value="{{ $value }}">{{ $type }}</option>
                    @endforeach
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
                <label for="active" class="form-label">Active</label>
                <select class="form-select mb-2 @error('active') is-invalid @enderror" id="active" name="active">
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
        <div class="col-md-6"></div>
    </div>
    <div class="container-fluid">
        <label for="avata" class="form-label">Avatar</label>
        <div class="d-flex justify-content-center align-items-center">
            @php
                $link = 'https://via.placeholder.com/150';
                if (isset($user)) {
                    if ($avata = Storage::get('admin/avatar/' . $user->avata)) {
                        $link = 'data:image/png;base64,' . base64_encode($avata);
                    }
                }
            @endphp
            <div class="d-flex justify-content-center align-items-center" style="width: 150px; height: 150px">
                <img src="{{ $link }}" alt="" style="max-width:100%; height:auto">
            </div>
            <input class="form-control mb-2 @error('avata') is-invalid @enderror" type="file" id="avata" name="avata">
        </div>
        @error('avata')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    @if (empty($user))
        <div class="row">
            <div class="col-md-6">
                <div class="container-fluid">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror"
                        id="password" placeholder="">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="container-fluid">
                    <label for="password-confirm" class="form-label">Confirmed Password</label>
                    <input id="password-confirm" type="password" class="form-control mb-2" name="password_confirmation">
                </div>
            </div>
        </div>
    @endif
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </div>
    </form>
@endsection
