@extends('admin.layout.master')

@once
    @push('head')
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <h1 style="padding-left: 5px">Danh sách tư vấn</h1>
            <a href="{{ route('contact-info.create') }}" class="btn btn-new" style="margin-left: 8px;">+Add News</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center" scope="col">Id</th>
                    <th style="text-align:center" scope="col">Name</th>
                    <th style="text-align:center" scope="col">Email</th>
                    <th style="text-align:center" scope="col">Hotline</th>
                    <th style="text-align:center" scope="col">Status</th>
                    <th style="text-align:center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($contactInfos))
                    @foreach ($contactInfos as $key => $contactInfo)
                        <tr>
                            <td style="text-align:center">{{ $contactInfo->id }}</td>
                            <td style="text-align:center">{{ $contactInfo->name }}</td>
                            <td style="text-align:center">{{ $contactInfo->email }}</td>
                            <td style="text-align:center">{{ $contactInfo->phone }}</td>
                            <td style="text-align:center">
                                <form class="d-inline" method="post" action="{{ route('change-status-contactinfo', $contactInfo->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="{{ $contactInfo->status }}">
                                    <button type="submit"  class="btn btn-@switch ($contactInfo->status) @case (0)warning @break  @case (1)primary @break  @case(2)success @break @endswitch">
                                        {{ array_search($contactInfo->status, \App\Models\ContactInfo::STATUS) }}
                                    </button>
                                </form>
                            </td>
                            <td style="text-align:center">
                                <a href="{{ route('contact-info.show', $contactInfo->id) }}" class="btn btn-primary">Show</a>
                                <form class="d-inline" method="post" action="{{ route('contact-info.destroy', $contactInfo->id) }}">
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
        @if (!empty($contactInfos))
        <div class="float-left">
            <strong>{{ 'Show '.$contactInfos->count() .' in '.$contactInfos->total() }}</strong>
        </div>
        {{$contactInfos->links()}}
        @endif
    </div>
@endsection

