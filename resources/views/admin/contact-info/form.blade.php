@extends('admin.layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">
    @endpush
@endonce

@section('content')

@if (empty($contactInfo))
<form class="container-fluid" method="post" action="{{ route('contact-info.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3>Create contact info</h3>
@else
<form class="container-fluid">
  @php
    $isShow = true;
  @endphp
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3>Show contact_info</h3>
@endif
      <a href="{{ route('contact-info.index') }}" class="btn btn-primary">Back</a>
    </div>
  </div>
  <div class="container-fluid">
    <label for="name" class="form-label">Name</label>
    <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $contactInfo->name ?? '') }}" @isset($isShow) disabled @endisset>
    @error('name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="email" class="form-label">Email</label>
    <input name="email" type="text" class="form-control mb-2 @error('email') is-invalid @enderror" id="email" placeholder="" value="{{ old('email', $contactInfo->email ?? '') }}"  @isset($isShow) disabled @endisset>
    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="container-fluid">
    <label for="phone" class="form-label">Phone</label>
    <input name="phone" type="text" class="form-control mb-2 @error('phone') is-invalid @enderror" id="phone" placeholder="" value="{{ old('phone', $contactInfo->phone ?? '') }}" @isset($isShow) disabled @endisset>
    @error('phone')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  @php
      $selectedCountry = old('country_id', $contactInfo->country_id ?? '');
  @endphp
  <div class="container-fluid">
    <label for="country" class="form-label">Quốc gia</label>
    <select name="country_id" id="country_id" class="form-select @error('country_id') is-invalid @enderror" @isset($isShow) disabled @endisset>
        @if (empty($countries))
          <option value="" selected disabled hidden> Select a country </option>
        @endif
        @foreach($countries as $country)
          <option value="{{ $country->id }}"{{ ($selectedCountry == $country->id) ? ' selected' : ''}}> {{ $country->name }} </option>
        @endforeach
      </select>
      @error('country_id')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>

  @php
    $selectedLevel = old('level_id', $contactInfo->level_id ?? '')
  @endphp
  <div class="container-fluid">
    <label for="level_id" class="form-label">Bậc học</label>
    <select name="level_id" id="level_id" class="form-select @error('level_id') is-invalid @enderror" @isset($isShow) disabled @endisset>
        @empty($levels)
          <option value="" selected disabled hidden> Select a level </option>
        @endempty
        @if (!empty($levels))
            @foreach($levels as $level)
            <option value="{{ $level->id }}"{{ ($selectedLevel == $level->id) ? ' selected' : ''}}> {{ $level->name }} </option>
            @endforeach
        @endif
      </select>
      @error('level_id')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>
  @empty($isShow)
    <div class="row mt-3">
        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">
            Save
        </button>
        </div>
    </div>
  @endempty
</form>
@endsection
