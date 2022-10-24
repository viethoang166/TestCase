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
            <h1>Danh sách quốc gia</h1>
            <a href="{{ route('country.create') }}" class="btn btn-new" style="margin-left: 8px;">AddCountry</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center; width: 5%" scope="col">STT</th>
                    <th style="text-align:center; width: 10%" scope="col">Name</th>
                    <th style="text-align:center; width: 10%" scope="col">Code</th>
                    <th style="text-align:center; width: 20%" scope="col">Image</th>
                    <th style="text-align:center; width: 30%" scope="col">Description</th>
                    <th style="text-align:center; width: 15%" scope="col">Action</th>
                </tr>
            </thead>
            <tbody style="margin-bottom: 10px">
                @if (!empty($countries))
                    @foreach ($countries as $key => $con)
                        @php
                            $image = $con->image;
                            $country_image = base64_encode(Storage::get('admin/image/' . $image) ?? '');
                        @endphp
                        <tr>
                            <td style="text-align:center">{{{$key+1}}}</td>
                            <td style="text-align:center">{{ $con->name }}</td>
                            <td style="text-align:center">{{ $con->code }}</td>
                            <td style="text-align:center"><img width="60%"
                                    src="{{ 'data:image/png;base64,' . $country_image }}" alt=""></td>
                            <td
                                style="text-align:center;overflow: auto; display: flex;justify-content: space-around; min-height:56px; max-height: 150px;">
                                {!! $con->description ?? '<p> No Information</p>'  !!}</td>
                            <td style="text-align:center">
                                <a href="{{ route('country.edit', $con->id) }}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="post" action="{{ route('country.destroy', $con->id) }}" data-toggle="modal" data-target="#deleteCategory">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        >Delete</button>
                                </form>

                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @if (!empty($countries))
        <div class="float-left">
            <strong>{{ 'Show '.$countries->count() .' in '.$countries->total() }}</strong>
        </div>
        {{$countries->links()}}
        @endif
    </div>
@endsection

