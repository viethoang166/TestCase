@extends('layout.master')
@once
    @push('head')
        <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
    @endpush
@endonce
@section('main')
<div class="NewsPage">
    <div class="container">
      <div class="NewsPage-wrapper flex flex-wrap"> 
        <div class="">
          <div class="Card">
            <div class="Card-header">Dịch vụ</div>
            <div class="Card-body" style="padding: 2.4rem 2rem;">
              <div class="NewsPage-list flex flex-wrap">
                @if (!empty($services))
                    @foreach ($services as $key => $service)
                <div class="NewsPage-list-item">
                  <div class="NewBlock vertical"><a class="NewBlock-image" href="{{ route('service.post', $service->id) }}"><img src="{{$service->image}}" alt=""></a>
                    <div class="NewBlock-info"><a class="NewBlock-info-title" href="{{ route('service.post', $service->id) }}">{{$service->name}}</a>
                      <p class="NewBlock-info-description">{{substr($service->description, 0, 200)}}</p>
                    </div>
                  </div>
                </div>
                @endforeach
                @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="NewsPage-wrapper-item">
        </div>
      </div>
    </div>
  </div>
  @endsection
