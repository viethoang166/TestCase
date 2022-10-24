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
            <h1>Danh sách Customer</h1>
            <a href="{{ route('customer.create') }}" class="btn btn-new" style="margin-left: 8px;">+Add</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center" scope="col">Avatar</th>
                    <th style="text-align:center" scope="col">Name</th>
                    <th style="text-align:center" scope="col">Email</th>
                    <th style="text-align:center" scope="col">Active</th>
                    <th style="text-align:left; width: 15%" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($customers))
                    @foreach ($customers as $key => $customer)
                        <tr>
                            <td style="text-align:center"><img width="50px" src="{{ asset($customer->avata) }}" alt=""></td>
                            <td style="text-align:center">{{ $customer->name }}</td>
                            <td style="text-align:center">{{ $customer->email }}</td>
                            <td style="text-align:center">
                                <form class="d-inline" method="post" action="{{ route('customerAdmin.active', $customer->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $customer->id }}">
                                    <input type="hidden" name="active" value="{{ ($customer->active) == 1 ? '0' : '1' }}">
                                    <button type="submit"  class="btn btn-{{ ($customer->active) == 1 ? 'success' : 'danger' }}">{{ ($customer->active) == 1 ? 'Public' : 'Private' }}</button>
                                </form>
                            </td>
                            <td style="text-align:center">
                                <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="post" action="{{ route('customer.destroy', $customer->id) }}">
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
        @if (!empty($customers))
        <div class="float-left">
            <strong>{{ 'Show '.$customers->count() .' in '.$customers->total() }}</strong>
        </div>
        {{$customers->links()}}
        @endif
    </div>
@endsection
