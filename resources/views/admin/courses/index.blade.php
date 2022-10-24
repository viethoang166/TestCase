@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
@php
    // var_dump(get_class_methods(App\Models\Course::class))
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
  <h1>List Courses</h1>
  <a href="{{route('courses.create')}}" class="btn btn-new">+Addnew</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th style="text-align:center ; width: 10%" scope="col">Name</th>
      <th style="text-align:center ; width: 10%" scope="col">Majors</th>
      <th style="text-align:center ; width: 5%" scope="col">Tuition(vnd)</th>
      <th style="text-align:center ; width: 30%" scope="col">Note</th>
      <th style="text-align:center ; width: 10%" scope="col">Time_Start</th>
      <th style="text-align:center ; width: 10%" scope="col">Time_End</th>
      <th style="text-align:center ; width: 20%" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(!empty($courses))
        @foreach($courses as $key => $course)
    <tr>
      <td style="text-align:center">{{$course->name}}</td>
      <td style="text-align:center">{{$course->majors->name}}</td>
      <td style="text-align:center">{{$course->tuition}}</td>
      <td style="display: block;
                text-align:center;
                display: -webkit-box;
                height: 16px*1.3*3;
                font-size: 16px;
                line-height: 2.3;
                -webkit-line-clamp: 3;  /* số dòng hiển thị */
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;">
                {{$course->note}}
            </td>
      <td style="text-align:center">{{$course->timestart}}</td>
      <td style="text-align:center">{{$course->timeend}}</td>
      <td style="text-align:center">
        <a href="{{route('courses.edit', $course->id)}}" class="btn btn-primary">Edit</a>
        <form class="d-inline" method="post" action="{{ route('courses.destroy', $course->id) }}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
      </form>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
@if (!empty($courses))
<div class="float-left">
    <strong>{{ 'Show '.$courses->count() .' in '.$courses->total() }}</strong>
</div>
{{$courses->links()}}
@endif
@endsection
