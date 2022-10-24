@extends('layout.master')
@once
    @push('head')
        <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
    @endpush
@endonce
@section('main')
<div class="NewPage">
    <section class="Banner">
      <div class="Banner-wrapper"> 
        <div class="Banner-image" style="height: 50rem;"><img src="{{$service->image}}" alt=""></div>
      </div>
    </section>
    <div class="container">
      <div class="NewPage-wrapper flex flex-wrap"> 
          <div class="NewPage-detail">
            <div class="NewPage-detail-header">
              <h1 class="NewPage-detail-header-title">{{$service->name}}</h1>
              <div class="NewPage-detail-header-row flex justify-between items-center">
              </div>
            </div>
            <div class="NewPage-detail-content style-content">
                <p>{{$service->description}}</p>
            </div>
          </div>
        <div class="NewPage-wrapper-item">
        </div>
      </div>
    </div>
  </div>
@endsection
