@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container-fluid">
        <div>
            <h1 style="padding-left: 5px">Danh sách user</h1>
            <a href="{{ route('user.create') }}" class="btn btn-new" style="margin-left: 8px;">+Add News</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center" scope="col">Avatar</th>
                    <th style="text-align:center" scope="col">Name</th>
                    <th style="text-align:center" scope="col">Email</th>
                    <th style="text-align:center" scope="col">Address</th>
                    <th style="text-align:center" scope="col">Active</th>
                    <th style="text-align:center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($users))
                    @foreach ($users as $key => $user)
                    @php
                        $avatarImage = $user->avata;
                        $base64Avatar = base64_encode(Storage::get('admin/avatar/'. $avatarImage) ?? '');
                    @endphp
                        <tr>
                            <td style="text-align:center"><img width="50px" src="{{ 'data:image/png;base64,'. $base64Avatar }}" alt=""></td>
                            <td style="text-align:center">{{ $user->name }}</td>
                            <td style="text-align:center">{{ $user->email }}</td>
                            <td style="text-align:center">{{ $user->address }}</td>
                            <td style="text-align:center">
                                <form class="d-inline" method="post" action="{{ route('userAdmin.active', $user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <input type="hidden" name="active" value="{{ ($user->active) == 1 ? '0' : '1' }}">
                                    <button type="submit"  class="btn btn-{{ ($user->active) == 1 ? 'success' : 'danger' }}">{{ ($user->active) == 1 ? 'Yes' : 'No' }}</button>
                                </form>
                            </td>
                            <td style="text-align:center">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="post" action="{{ route('user.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @if (!empty($users))
        <div class="float-left">
            <strong>{{ 'Show '.$users->count() .' in ' .App\Models\User::count().' entries' }}</strong>
        </div>
        {{$users->links()}}
        @endif
    </div>
@endsection
