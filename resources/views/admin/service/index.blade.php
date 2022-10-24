@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container-fluid">
        <div>
            <h1>Danh sách Service</h1>
            <a href="{{ route('service.create') }}" class="btn btn-new" style="margin-left: 8px;">+Add</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:left" scope="col">Name</th>
                    <th style="text-align:left" scope="col">Content</th>
                    <th style="text-align:left" scope="col">Active</th>
                    <th style="text-align:left; width: 15%" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($services))
                    @foreach ($services as $key => $service)
                        <tr>
                            <td style="text-align:left">{{ $service->name }}</td>
                            <td style="text-align:left">{{ substr($service->description,0,200) }}</td>
                            <td style="text-align:left">
                                <form class="d-inline" method="post" action="{{ route('service.status.change', $service->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $service->id }}">
                                    <input type="hidden" name="active" value="{{ ($service->active) == 1 ? '0' : '1' }}">
                                    <button type="submit" class="btn btn-{{ ($service->active) == 1 ? 'success' : 'danger' }}">{{ ($service->active) == 1 ? 'Public' : 'Private' }}</button>
                                </form>
                                </td>
                            <td style="text-align:left">
                                <a href="{{ route('service.edit', $service->id) }}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="post" action="{{ route('service.destroy', $service->id) }}">
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
        @if (!empty($services))
        <div class="float-left">
            <strong>{{ 'Show '.$services->count() .' in ' .App\Models\Service::count().' entries' }}</strong>
        </div>
        {{$services->links()}}
        @endif
    </div>
@endsection
