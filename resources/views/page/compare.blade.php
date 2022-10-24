@extends('layout.master')
@once
    @push('head')
        <link rel="stylesheet" href="{{ url('assets/css/landing.css') }}">
        <link rel="stylesheet" href="{{ url('../compare.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ url('assets/js/landing.js') }}"></script>
    @endpush
@endonce
@section('main')

<div class="banner">
  <img width="100%" src="{{ url('../image') }}/logo/banner2.png">
</div>
<div class="main" margin="50px">
  @if (!empty($schools))


  <div class="container-fluid row" id="compareschool">
    <div class="col-md-2">
        <div class="c-row-0">
          <img id="pdf" width="60%" src="{{url('../images') }}/pdf-logo.jpg">
          <button type="submit">Xuất PDF</button>
        </div>
        <!--<div class="c-row-1">
          Giới thiệu chung
        </div>-->
        <div class="c-row-2" id="menu">
          Thành phố
        </div>
        <div class="c-row-3" id="menu">
          Thông tin nổi bật
        </div>
        <div class="c-row-4" id="menu">
          Chương trình học
        </div>
        <div class="c-row-5" id="menu">
          Cơ sở vật chất
        </div>
        <div class="c-row-6" id="menu">
          Học phí
        </div>
        <div class="c-row-7" id="menu">
          Học bổng
        </div>
        <div class="c-row-8" id="menu">
          Điều kiện đầu vào
        </div>
        <div class="c-row-9" id="menu">
          Feedback
        </div>
        
    </div>
    <div class="col-md-10 row">
      @foreach ($schools as $school )
      <div class="col-md-3">
    
  @php
      $link = 'https://via.placeholder.com/150';
      if ($bannerImage = $school->images->where('banner', 1)->first()) {
          if ($base64Banner = Storage::get($bannerImage->file)) {
              $link = 'data:image/png;base64,' . base64_encode($base64Banner);
          }
      }
  @endphp
            <div class="c-row-0">
            <img id="image_school" width="100px" src="{{ $link }}" alt=""><br>
            <hr  width="100%" color="red">  
              <div id="name_school">
                {{ $school->name }}
              </div>
            </div>

        <!--<div class="c-row-1">
          {{ $school->email }}
        </div>-->
        <div class="c-row-2">
        {{$school->city->name}}
        </div>
        <div class="c-row-3">
          {{$school->infor}}
        </div>
        <div class="c-row-4">
        @foreach($school->majors as $major)
         {{$major -> name}}<br>
        @endforeach
        </div>
        <div class="c-row-5">
        We are the UK’s leading provider of digital and blended distance education
        </div>
        <div class="c-row-6">
          @if(!empty($school->min_price))
            {{$school->min_price}}$ - {{$school->max_price}}$
          @else
            {{"N/A"}}
          @endif  
        </div>
        <div class="c-row-7">
          @foreach($school->scholarships as $sl)
            {{$sl -> name}}<br>
            {{$sl -> type}}
          @endforeach
        </div>
        <div class="c-row-8">
        @foreach($school->scholarships as $sl)
            {!!$sl -> condition!!}<br>
          @endforeach
        </div>
        <div class="c-row-9">
          @foreach($school ->feedback as $fb)
            {{$fb->content}} 
          @endforeach
        </div>
        <div class="c-row">
        <div class="Button js-open-modal middle bordered" data-modal-id="#ModalContactInformation">
            <button class="Button-control flex items-center justify-center" type="button"><span class="Button-control-title">{{ __('landing.contact.send-info') }}</span>
            </button>
        </div>
          <button type="submit" id="hoso">Nộp hồ sơ</button>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="ModalContactInformation Modal @if ($errors->first('contact-info-*')) active @endif" id="ModalContactInformation">
        <div class="Modal-overlay"> </div>
        <div class="Modal-main">
            <div class="Modal-header">
                {{ __('landing.modal.contact.header') }}
                <div class="Modal-close Modal-header-close"><img src="./assets/icons/icon-close.svg" alt=""></div>
            </div>
            <div class="Modal-body">
                <form class="ModalContactInformation-form" id="contact_infoForm" action="{{ route('storeContactInfo')}}" method="POST">
                    @csrf
                    <div class="ModalContactInformation-form-control flex flex-wrap">
                        <div class="ModalContactInformation-form-item">
                            <div class="Input small bordered">
                                <input name="contact-info-name" type="text" class="Input-control mb-2 @error('contact-info-name') is-invalid @enderror" id="contact-info-name" placeholder="Tên của bạn">
                                @error('contact-info-name')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="ModalContactInformation-form-item">
                            <div class="Select small bordered">
                                <select name="contact-info-country_id" id="contact-info-country_id" class="Select-control @error('contact-info-country_id') is-invalid @enderror">
                                        <option value="" selected disabled hidden>{{ __('landing.modal.contact.country') }}</option>
                                    @foreach($countries as $country)
                                      <option value="{{ $country->id }}"> {{ $country->name }} </option>
                                    @endforeach
                                  </select>
                                  @error('contact-info-country_id')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                <div class="Select-arrow"> <img src="./assets/icons/icon-angle-down.svg" alt=""></div>
                            </div>
                        </div>
                        <div class="ModalContactInformation-form-item">
                        <div class="Input small bordered">
                            <input name="contact-info-phone" type="text" class="Input-control @error('contact-info-phone') is-invalid @enderror" id="contact-info-phone" placeholder="{{ __('landing.modal.contact.phone') }}">
                            @error('contact-info-phone')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>
                        <div class="ModalContactInformation-form-item">
                        <div class="Select small bordered">
                            <select name="contact-info-level_id" id="contact-info-level_id" class="Select-control @error('contact-info-level_id') is-invalid @enderror">
                                <option value="" selected disabled hidden>{{ __('landing.modal.contact.level') }}</option>
                                @if (!empty($levels))
                                    @foreach($levels as $level)
                                    <option value="{{ $level->id }}"> {{ $level->name }} </option>
                                    @endforeach
                                @endif
                              </select>
                              @error('contact-info-level_id')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            <div class="Select-arrow"> <img src="./assets/icons/icon-angle-down.svg" alt=""></div>
                        </div>
                        </div>
                        <div class="ModalContactInformation-form-item">
                        <div class="Input small bordered">
                            <input name="contact-info-email" type="email" class="Input-control @error('contact-info-email') is-invalid @enderror" id="contact-info-email" placeholder="{{ __('landing.modal.contact.email') }}">
                            @error('contact-info-email')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>
                    </div>
                    <div class="ModalContactInformation-form-submit flex justify-center">
                        <div class="Button secondary small" data-modal-id="">
                            <input class="Button-control Button-control-title flex items-center justify-center" type="submit" value="{{ __('landing.modal.contact.submit') }}" onclick="document.querySelector('#contact_infoForm').submit()">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
  {{ $schools->links() }}
  @endif

@endsection