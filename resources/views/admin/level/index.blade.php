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
            <h1>Danh sách bậc học</h1>
            <a href="{{ route('level.create') }}" class="btn btn-new" style="margin-left: 8px;">+Add</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center" scope="col">Id</th>
                    <th style="text-align:center" scope="col">Name</th>
                    <th style="text-align:center" scope="col">Note</th>
                    <th style="text-align:center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($levels))
                    @foreach ($levels as $key => $level)
                        <tr>
                            <td style="text-align:center">{{ $level->id }}</td>
                            <td style="text-align:center">{{ $level->name }}</td>
                            <td style="text-align:center">{{ $level->note }}</td>
                            <td style="text-align:center">
                                <a href="{{ route('level.edit', $level->id) }}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="post" action="{{ route('level.destroy', $level->id) }}">
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
        @if (!empty($levels))
        <div class="float-left">
            <strong>{{ 'Show '.$levels->count() .' in '.$levels->total() }}</strong>
        </div>
        {{$levels->links()}}
        @endif
    </div>
@endsection
