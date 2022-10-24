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
            <h1 style="padding-left: 5px">Danh sách giá trị cốt lõi</h1>
            <a href="{{ route('core-value.create') }}" class="btn btn-new" style="margin-left: 8px;">+Add News</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center; width:5%" scope="col">STT</th>
                    <th style="text-align:center; width:10%" scope="col">Image</th>
                    <th style="text-align:center; width:25%" scope="col">Title</th>
                    <th style="text-align:center; width:40%" scope="col">Description</th>
                    <th style="text-align:center; width:20%" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($coreValues))
                    @foreach ($coreValues as $key => $coreValue)
                    @php
                        $image = $coreValue->image;
                        $base64Image = base64_encode(Storage::get('admin/core-value/'. $image) ?? '');
                    @endphp
                        <tr>
                            <td style="text-align:center">{{ $key+1}}</td>
                            <td style="text-align:center"><img width="150px" src="{{ 'data:image/png;base64,'. $base64Image }}" alt=""></td>
                            <td style="text-align:center">{{ $coreValue->title }}</td>
                            <td>
                                <div
                                    style="display: block;
                                display: -webkit-box;
                                font-size: 16px;
                                line-height: 1.3;
                                -webkit-line-clamp: 5;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                text-align:center;">
                                    {!! $coreValue->description !!}

                                </div>
                            </td>

                            <td style="text-align:center">
                                <a href="{{ route('core-value.edit', $coreValue->id) }}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="post" action="{{ route('core-value.destroy', $coreValue->id) }}">
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
        <div class="float-left">
            <strong>{{ 'Show '.$coreValues->count() .' in '.$coreValues->total() }}</strong>
        </div>
        {{$coreValues->links()}}
    </div>
@endsection
