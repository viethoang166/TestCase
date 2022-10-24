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
            <h1 style="padding-left: 5px">Overview history</h1>
            <a href="{{ route('history.create') }}" class="btn btn-new" style="margin-left: 8px;">+Add News</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center; width:10%" scope="col">Image</th>
                    <th style="text-align:center; width:25%" scope="col">Overview</th>
                    <th style="text-align:center; width:20%" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($history))
                    @foreach ($history as $key => $his)
                    @php
                        $image = $his->image;
                        $base64Image = base64_encode(Storage::get('admin/history/'. $image) ?? '');
                    @endphp
                        <tr>
                            <td style="text-align:center"><img width="150px" src="{{ 'data:image/png;base64,'. $base64Image }}" alt=""></td>
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
                                    {!! $his->overview !!}

                                </div>
                            </td>

                            <td style="text-align:center">
                                <a href="{{ route('history.edit', $his->id) }}" class="btn btn-primary">Edit</a>
        
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="float-left">
            <strong>{{ 'Show '.$history->count() .' in '.$history->total() }}</strong>
        </div>
        {{$history->links()}}
    </div>
@endsection
