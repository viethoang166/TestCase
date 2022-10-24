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
            <h1>Danh sách thành phố</h1>
            <a href="{{ route('cities.create') }}" class="btn btn-new" style="margin-left: 8px;">Add City</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center; width: 5%" scope="col">STT</th>
                    <th style="text-align:center; width: 10%" scope="col">City</th>
                    <th style="text-align:center; width: 10%" scope="col">Country</th>
                    <th style="text-align:center; width: 15%" scope="col">Image</th>
                    <th style="text-align:center; width: 40%" scope="col">Description</th>
                    <th style="text-align:center; width: 15%" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($cities))
                    @foreach ($cities as $key => $city)
                    @php
                        $image = $city->image;
                        $city_image = base64_encode(Storage::get('admin/image/'. $image) ?? '');
                    @endphp
                        <tr>
                            <td style="text-align:center">{{$key+1}}</td>
                            <td style="text-align:center">{{ $city->name }}</td>
                            <td style="text-align:center">{{ $city->country->name }}</td>
                            <td style="text-align:center"><img width="60%" src="{{ 'data:image/png;base64,'. $city_image }}" alt=""></td>
                            <td style="overflow: auto; display: flex;justify-content: space-around; max-height: 150px;">{!! $city->description ?? '<p> No Ìnormation</p>' !!}</td>
                            <td style="text-align:center">
                                <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="post" action="{{ route('cities.destroy', $city->id) }}">
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
        @if (!empty($cities))
        <div class="float-left">
            <strong>{{ 'Show '.$cities->count() .' in '.$cities->total() }}</strong>
        </div>
        {{$cities->links()}}
        @endif
    </div>
@endsection
