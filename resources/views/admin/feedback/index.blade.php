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
            <h1>Danh sách Feedback</h1>
            <a href="{{ route('feedback.create') }}" class="btn btn-new" style="margin-left: 8px;">+Add</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:left" scope="col">Type</th>
                    <th style="text-align:left" scope="col">Content</th>
                    <th style="text-align:left" scope="col">Status</th>
                    <th style="text-align:left; width: 15%" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($feedbacks))
                    @foreach ($feedbacks as $key => $feedback)
                        <tr>
                            <td style="text-align:left">{{ __(array_search($feedback->type, \App\Models\Feedback::TYPES) ?? "Undefined") }}</td>
                            <td style="text-align:left">{!! $feedback->content !!}</td>
                            <td style="text-align:left">
                                <form class="d-inline" method="post" action="{{ route('change-status-feedback', $feedback->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-{{ ($feedback->status) == 1 ? 'success' : 'danger' }}">{{ __(array_search($feedback->status, \App\Models\Feedback::STATUSES) ?? "Undefined") }}</button>
                                </form>
                            </td>
                            <td style="text-align:left">
                                <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="post" action="{{ route('feedback.destroy', $feedback->id) }}">
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
        @if (!empty($feedbacks))
        <div class="float-left">
            <strong>{{ 'Show '.$feedbacks->count() .' in '.$feedbacks->total() }}</strong>
        </div>
        {{$feedbacks->links()}}
        @endif
    </div>
@endsection
