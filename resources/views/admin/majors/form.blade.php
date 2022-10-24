@extends('admin.layout.master')
@section('content')
@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
    @endpush
@endonce

@if(empty($majors))
<form class="container-fluid" method="post" action="{{ route('majors.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3>Create Majors</h3>
@else
<form class="container-fluid" method="post" action="{{ route('majors.update', $majors->id) }}"
  enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <div class="row">
      <div class="d-flex justify-content-between">
          <h3>Edit Majors</h3>
@endif
      <a href="{{ route('majors.index') }}" class="btn btn-primary">Back</a>
    </div>
  </div>
  <div class="container-fluid">
    <label for="name" class="form-label">Name</label>
    <textarea name="name" type="textarea" class="form-control mb-2 @error('name') is-invalid @enderror" id="name">{{ old('name', $majors->name ?? '') }}</textarea>
    @error('name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="note" class="form-label">Note</label>
    <textarea name="note" type="text" style="height: 300px;" class="form-control mb-2 @error('note') is-invalid @enderror" id="note">{{ old('note', $majors->note ?? '') }}</textarea>
    @error('note')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="row mt-3">
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">
        Save
      </button>
    </div>
  </div>
</form>

@endsection
