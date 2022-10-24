@extends('admin.layout.master')

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
<div>
    <h1>Danh sách trường đại học</h1>
    <a href="{{route('compare.create')}}" class="btn btn-new" style="margin-left: 8px;">+Addnew</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Avatar</th>
            <th scope="col">Name</th>
            <th scope="col">City</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($users))
        @foreach($users as $key => $user)
        <tr>
            <td><img width="50px" src="{{asset('uploads/avatar/'.$user->avatar)}}" alt=""></td>
            <td>{{$user->infor}}</td>
            <td>{{$user->city}}</td>
            <td>
                <a href="{{route('compare.edit', $user->id)}}" class="btn btn-primary">Edit</a>
                <form class="d-inline" method="post" action="{{ route('compare.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection