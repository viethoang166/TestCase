@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid">

        <div>
            <h1>List Majors</h1>
            <a href="{{ route('majors.create') }}" class="btn btn-new">+Addnew</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center ; width: 5%" scope="col">List</th>
                    <th style="text-align:center ; width: 20%" scope="col">Name</th>
                    <th style="text-align:center ; width: 55%" scope="col">Note</th>
                    <th style="text-align:center ; width: 20%" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($majors))
                    @foreach ($majors as $key => $major)
                        <tr>
                            <td style="text-align:center">{{ $key + 1 }}</td>
                            <td style="text-align:center">{{ $major->name }}</td>
                            <td
                                style="display: block;
                text-align:center;
                display: -webkit-box;
                height: 16px*1.3*3;
                font-size: 16px;
                line-height: 2.3;
                -webkit-line-clamp: 3;  /* số dòng hiển thị */
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;">
                                {{ $major->note }}
                            </td>
                            <td style="text-align:center">
                                <a href="{{ route('majors.edit', $major->id) }}" class="btn btn-primary">Edit</a>

                                <form class="d-inline" method="post" action="{{ route('majors.destroy', $major->id) }}">
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
        @if (!empty($majors))
            <div class="float-left">
                <strong>{{ 'Show ' . $majors->count() . ' in ' . $majors->total() }}</strong>
            </div>
            {{ $majors->links() }}
        @endif
    </div>
@endsection
