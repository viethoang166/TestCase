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
            <h1 style="padding-left: 5px">HistoryDetail</h1>
            <a href="{{ route('history-detail.create') }}" class="btn btn-new" style="margin-left: 8px;">+Add News</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center; width:5%" scope="col">STT</th>
                    <th style="text-align:center; width:10%" scope="col">Year</th>
                    <th style="text-align:center; width:60%" scope="col">Description</th>
                    <th style="text-align:center; width:25%" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($historyDetails))
                    @foreach ($historyDetails as $key => $historyDetail)
                        <tr>
                            <td style="text-align:center">{{ $key+1}}</td>
                            <td style="text-align:center">{{ $historyDetail->year}}</td>
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
                                    {!! $historyDetail->description !!}

                                </div>
                            </td>

                            <td style="text-align:center">
                                <a href="{{ route('history-detail.edit', $historyDetail->id) }}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="post" action="{{ route('history-detail.destroy', $historyDetail->id) }}">
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
            <strong>{{ 'Show '.$historyDetails->count() .' in '.$historyDetails->total() }}</strong>
        </div>
        {{$historyDetails->links()}}
    </div>
@endsection
