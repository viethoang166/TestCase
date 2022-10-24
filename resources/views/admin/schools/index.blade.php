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
            <h1>Danh sách Trường Học</h1>
            <a href="{{ route('schools.create') }}" class="btn btn-new" style="margin-left: 8px;">+Addnew</a>
        </div>
        <form class="form-inline" method="GET" action="{{ route('filter') }}">
            <div class="input-group">
                <select class="form-select"name="country" id="inputGroupSelect04"
                    aria-label="Example select with button addon">
                    <option selected>Country...</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach

                </select>
                <button class=" btn-search fa fa-search" type="submit"></button>
            </div>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align:center" scope="col">Stt</th>
                <th style="text-align:center" scope="col">School Name</th>
                <th style="text-align:center" scope="col">Image</th>
                <th style="text-align:center" scope="col">Email</th>
                <th style="text-align:center" scope="col">Address</th>
                <th style="text-align:center" scope="col">Phone</th>
                <th style="text-align:center" scope="col" @sortablelink('country_id', 'Country')</th>
                <th style="text-align:center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($schools))
                @foreach ($schools as $key => $new)
                    @php
                        $link = 'https://via.placeholder.com/150';
                        if ($bannerImage = $new->images->where('banner', 1)->first()) {
                            if ($base64Banner = Storage::get($bannerImage->file)) {
                                $link = 'data:image/png;base64,' . base64_encode($base64Banner);
                            }
                        }
                    @endphp
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $new->name }}</td>
                        <td><img width="100px" src="{{ $link }}" alt=""></td>
                        <td>{{ $new->email }}</td>
                        <td>{{ $new->address }}</td>
                        <td>{{ $new->phone }}</td>
                        <td>{{ $new->country->name }}</td>
                        <td>
                            <a href="{{ route('schools.edit', $new->id) }}" class="btn btn-primary">Edit</a>
                            <form class="d-inline" method="post" action="{{ route('schools.destroy', $new->id) }}">
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
    @if (!empty($schools))
        <div class="float-left">
            <strong>{{ 'Show ' . $schools->count() . ' in ' . $schools->total() }}</strong>
        </div>
        {{ $schools->links() }}
    @endif
@endsection
