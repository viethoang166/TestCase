@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
    @php
        // var_dump(get_class_methods(App\Models\scho::class))
    @endphp

    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <h1>List Scholarships</h1>
        <a href="{{ route('scholarships.create') }}" class="btn btn-new">+Addnew</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align:center ; width: 5%" scope="col">STT</th>
                <th style="text-align:center ; width: 10%" scope="col">Name</th>
                <th style="text-align:center ; width: 10%" scope="col">Money</th>
                <th style="text-align:center ; width: 10%" scope="col">school</th>
                <th style="text-align:center ; width: 35%" scope="col">Condition</th>
                <th style="text-align:center ; width: 10%" scope="col">Status</th>
                <th style="text-align:center ; width: 20%" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($scholarships))
                @foreach ($scholarships as $key => $scho)
                    <tr>
                        <td style="text-align:center">{{ $key + 1 }}</td>
                        <td style="text-align:center">{{ $scho->name }}</td>
                        <td style="text-align:center">{{ $scho->type }}</td>
                        <td style="text-align:center">{{ $scho->school->name }}</td>
                        <td
                            style="display: block;
                text-align:center;
                display: -webkit-box;
                height: 135px;
                font-size: 16px;
                line-height: 2.3;
                -webkit-line-clamp: 3;  /* số dòng hiển thị */
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;">
                            {!! $scho->condition !!}
                        </td>
                        <td style="text-align:center">
                            <form class="d-inline" method="post" action="{{ route('scholarships.status', $scho->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $scho->id }}">
                                <input type="hidden" name="status" value="{{ $scho->status == 1 ? '0' : '1' }}">
                                <button type="submit"
                                    class="btn btn-{{ $scho->status == 1 ? 'success' : 'danger' }}">{{ $scho->status == 1 ? 'Public' : 'Private' }}</button>
                            </form>
                        </td>
                        <td style="text-align:center">
                            <a href="{{ route('scholarships.edit', $scho->id) }}" class="btn btn-primary">Edit</a>
                            <form class="d-inline" method="post" action="{{ route('scholarships.destroy', $scho->id) }}">
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
    @if (!empty($scholarships))
    <div class="float-left">
        <strong>{{ 'Show '.$scholarships->count() .' in '.$scholarships->total() }}</strong>
    </div>
    {{$scholarships->links()}}
    @endif
   
@endsection
