@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
    @endpush
@endonce

@section('content')
@if (empty($level))
<form class="container-fluid" method="post" action="{{ route('level.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3>Create level</h3>
@else
<form class="container-fluid" method="post" action="{{ route('level.update',  $level->id) }}" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3>Edit level</h3>
@endif
      <a href="{{ route('level.index') }}" class="btn btn-primary">Back</a>
    </div>
  </div>
  <div class="container-fluid">
    <label for="name" class="form-label">Name</label>
    <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $level->name ?? '') }}">
    @error('name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="note" class="form-label">Note</label>
    <input name="note" type="text" class="form-control mb-2 @error('note') is-invalid @enderror" id="note" placeholder="" value="{{ old('note', $level->note ?? '') }}">
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
