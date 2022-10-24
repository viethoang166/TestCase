@extends('layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ url('assets/css/landing.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ url('assets/js/landing.js') }}"></script>
    @endpush
@endonce

@section('main')
    <section class="HomeBanner">
        <div class="HomeBanner-wrapper">
            <div class="owl-carousel" id="HomeBanner-carousel">
                <div class="HomeBanner-carousel-item"> <img src="{{ url('assets/images/image-home-banner.png') }}" alt=""></div>
                <div class="HomeBanner-carousel-item"> <img src="{{ url('assets/images/image-home-banner.png') }}" alt=""></div>
                <div class="HomeBanner-carousel-item"> <img src="{{ url('assets/images/image-home-banner.png') }}" alt=""></div>
            </div>
        </div>
    </section>
    <div class="FilterInformation">
        <div class="container">
            <div class="FilterInformation-wrapper">
                <div class="FilterInformation-title">{{ __('landing.filter.title') }}</div>
                <form class="FilterInformation-form flex flex-wrap" action="#">
                    <div class="FilterInformation-form-item">
                        <div class="Select middle bordered">
                            <select class="Select-control">
                                <option value="" selected disabled hidden>{{ __('landing.filter.country') }}</option>
                                @if (!empty($countries))
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="Select-arrow"> <img src="{{ url('assets/icons/icon-angle-down.svg') }}" alt=""></div>
                        </div>
                    </div>
                    <div class="FilterInformation-form-item">
                        <div class="Select middle bordered">
                            <select class="Select-control">
                                <option value="" selected disabled hidden>{{ __('landing.filter.city') }}</option>
                                @if (!empty($cities))
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="Select-arrow"> <img src="{{ url('assets/icons/icon-angle-down.svg') }}" alt=""></div>
                        </div>
                    </div>
                    <div class="FilterInformation-form-item">
                        <div class="Select middle bordered">
                            <select class="Select-control">
                                <option value="" selected disabled hidden>{{ __('landing.filter.level') }}</option>
                                @if (!empty($levels))
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="Select-arrow"> <img src="{{ url('assets/icons/icon-angle-down.svg') }}" alt=""></div>
                        </div>
                    </div>
                    <div class="FilterInformation-form-item">
                        <div class="Select middle bordered">
                            <select class="Select-control">
                                <option value="" selected disabled hidden>{{ __('landing.filter.ranking') }}</option>
                                @if (!empty($courses))
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="Select-arrow"> <img src="{{ url('assets/icons/icon-angle-down.svg') }}" alt=""></div>
                        </div>
                    </div>
                    <div class="FilterInformation-form-item">
                        <div class="Select middle bordered">
                            <select class="Select-control">
                                <option value="" selected disabled hidden>{{ __('landing.filter.course') }}</option>
                                @if (!empty($countries))
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="Select-arrow"> <img src="{{ url('assets/icons/icon-angle-down.svg') }}" alt=""></div>
                        </div>
                    </div>
                    <div class="FilterInformation-form-item">
                        <div class="Select middle bordered">
                            <select class="Select-control">
                                <option value="" selected disabled hidden>{{ __('landing.filter.school') }}</option>
                                @if (!empty($schools))
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="Select-arrow"> <img src="{{ url('assets/icons/icon-angle-down.svg') }}" alt=""></div>
                        </div>
                    </div>
                    <div class="FilterInformation-form-item">
                        <div class="Select middle bordered">
                            <select class="Select-control">
                                <option value="" selected disabled hidden>{{ __('landing.filter.major') }}</option>
                            </select>
                            <div class="Select-arrow"> <img src="{{ url('assets/icons/icon-angle-down.svg') }}" alt=""></div>
                            @if (!empty($majors))
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="FilterInformation-form-item expand">
                        <div class="Input middle bordered">
                            <input class="Input-control" type="text" placeholder="{{ __('landing.filter.placeholder') }}">
                        </div>
                    </div>
                    <div class="FilterInformation-form-item submit">
                        <div class="Button middle bordered" data-modal-id="">
                            <button class="Button-control flex items-center justify-center" type="button"><span class="Button-control-title">{{ __('landing.filter.search') }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="Welcome">
        <div class="Welcome-wrapper">
            <div class="Welcome-title flex items-center justify-center">
                <h2>{{ __('landing.welcome.title.text') }}</h2>
                <h1>{{ __('landing.welcome.title.name') }}</h1>
            </div>
            <div class="Welcome-row flex flex-wrap">
                <div class="Welcome-row-item first image">
                    <div class="Welcome-row-item-image"><img src="{{ url('assets/images/image-welcome-1.png') }}" alt=""></div>
                </div>
                <div class="Welcome-row-item">
                    <div class="Welcome-row-item-content">
                        <p>{{ __('landing.welcome.introduction.text') }}</p>
                        <ul>
                            <li>{{ __('landing.welcome.introduction.benefit.1') }}</li>
                            <li>{{ __('landing.welcome.introduction.benefit.2') }}</li>
                            <li>{{ __('landing.welcome.introduction.benefit.3') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="Welcome-row-item">
                    <div class="Welcome-row-item-content">
                        <h4>{{ __('landing.welcome.schedule.text') }}</h4>
                        <div class="Welcome-row-item-content-table">
                            <table>
                                <thead>
                                    <tr>
                                        <td>{{ __('landing.welcome.schedule.day') }}</td>
                                        <td>{{ __('landing.welcome.schedule.time') }}</td>
                                        <td>{{ __('landing.welcome.schedule.country') }}</td>
                                        <td>{{ __('landing.welcome.schedule.address') }}</td>
                                        <td>{{ __('landing.welcome.schedule.school') }}</td>
                                        <td>{{ __('landing.welcome.schedule.register') }}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($schedules))
                                        @foreach ($schedules as $schedule)
                                            <tr>
                                                <td>{{ date('d-m-Y', strtotime($schedule->from)) }}</td>
                                                <td>{{ date('H:i', strtotime($schedule->from)) }}</td>
                                                <td>{{ $schedule->school->country->name }}</td>
                                                <td>{{ $schedule->school->address }}</td>
                                                <td>{{ $schedule->school->name }}</td>
                                                <td>
                                                    <form class="Button small bordered">
                                                        <button class="Button-control flex items-center justify-center js-open-modal" type="button" data-modal-id="#ModalContactInformation">
                                                            <span class="Button-control-title">{{ __('landing.welcome.schedule.register') }}</span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else {{-- Placeholder --}}
                                        <tr>
                                            <td>08/10</td>
                                            <td>15:30</td>
                                            <td>UK</td>
                                            <td>VP HN</td>
                                            <td> <span>OXFORD INTERNATIONAL</span></td>
                                            <td>
                                                <div class="Button small bordered">
                                                    <button class="Button-control flex items-center justify-center js-open-modal" type="button" data-modal-id="#ModalContactInformation">
                                                        <span class="Button-control-title">{{ __('landing.welcome.schedule.register') }}</span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="Welcome-row-item last image">
                    <div class="Welcome-row-item-image"> <img src="{{ url('assets/images/image-welcome-2.png') }}" alt=""></div>
                </div>
            </div>
        </div>
    </section>
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
    <section class="Contact">
        <div class="container">
            <div class="Contact-wrapper flex flex-wrap">
                <div class="Contact-wrapper-item">
                    <div class="Contact-item-image"> <img src="{{ url('assets/images/image-contact-1.png') }}" alt=""></div>
                    <div class="Contact-item-btn flex justify-center">
                        <div class="Button middle bordered" data-modal-id="">
                            <button class="Button-control flex items-center justify-center" type="button"><span class="Button-control-title">{{ __('landing.contact.send-CV') }}</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="Contact-wrapper-item">
                    <div class="Contact-item-image"> <img src="{{ url('assets/images/image-contact-2.png') }}" alt=""></div>
                    <div class="Contact-item-btn flex justify-center">
                        <div class="Button js-open-modal middle bordered" data-modal-id="#ModalContactInformation">
                            <button class="Button-control flex items-center justify-center" type="button"><span class="Button-control-title">{{ __('landing.contact.send-info') }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="Customers">
        <div class="Customers-wrapper">
            <div class="Customers-title flex items-center justify-center">
                <h2>{{ __('landing.customer.title.text') }}</h2>
                <h1>{{ __('landing.customer.title.name') }}</h1>
            </div>
            <div class="owl-carousel" id="Customers-carousel">
                @if (!empty($feedbackReviews))
                    @foreach ($feedbackReviews as $feedbackReview)
                        <div class="item">
                            <div class="Customers-carousel-item flex items-center">
                                <div class="Customers-carousel-item-image"><img src="{{ $feedbackReview->customer->avata }}" alt="">
                                    <div class="Customers-carousel-item-image-badge flex items-center justify-center">{{ __('landing.customer.review.country', ['country' => $feedbackReview->school->country->name]) }}</div>
                                </div>
                                <div class="Customers-carousel-item-info">
                                    <h5 class="Customers-carousel-item-info-title">{{ $feedbackReview->customer->name }}</h5>
                                    <h6 class="Customers-carousel-item-info-subtitle">{{ $feedbackReview->school->name }}</h6>
                                    <p class="Customers-carousel-item-info-description">{{ $feedbackReview->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else {{-- Placeholder --}}
                    <div class="item">
                        <div class="Customers-carousel-item flex items-center">
                            <div class="Customers-carousel-item-image"><img src="{{ url('assets/images/image-customer.png') }}" alt="">
                                <div class="Customers-carousel-item-image-badge flex items-center justify-center">Du học anh</div>
                            </div>
                            <div class="Customers-carousel-item-info">
                                <h5 class="Customers-carousel-item-info-title">Tran Thanh Hung</h5>
                                <h6 class="Customers-carousel-item-info-subtitle">Đại học Anh Quốc</h6>
                                <p class="Customers-carousel-item-info-description">“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. “</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="Customers-carousel-item flex items-center">
                            <div class="Customers-carousel-item-image"><img src="{{ url('assets/images/image-customer.png') }}" alt="">
                                <div class="Customers-carousel-item-image-badge flex items-center justify-center">Du học anh</div>
                            </div>
                            <div class="Customers-carousel-item-info">
                                <h5 class="Customers-carousel-item-info-title">Tran Thanh Hung</h5>
                                <h6 class="Customers-carousel-item-info-subtitle">Đại học Anh Quốc</h6>
                                <p class="Customers-carousel-item-info-description">“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. “</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="Customers-carousel-item flex items-center">
                            <div class="Customers-carousel-item-image"><img src="{{ url('assets/images/image-customer.png') }}" alt="">
                                <div class="Customers-carousel-item-image-badge flex items-center justify-center">Du học anh</div>
                            </div>
                            <div class="Customers-carousel-item-info">
                                <h5 class="Customers-carousel-item-info-title">Tran Thanh Hung</h5>
                                <h6 class="Customers-carousel-item-info-subtitle">Đại học Anh Quốc</h6>
                                <p class="Customers-carousel-item-info-description">“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. “</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="Events">
        <div class="Events-wrapper">
            <div class="Events-title flex items-center justify-center">
                <h2>{{ __('landing.event.title') }}</h2>
            </div>
            <div class="owl-carousel" id="Events-carousel">
                @if (!empty($events))
                    @foreach ($events as $event)
                        <div class="item">
                            <div class="Events-carousel-item"><img src="{{ $event->images->get(0) }}" alt=""></div>
                        </div>
                    @endforeach
                @else {{-- Placeholder --}}
                    <div class="item">
                        <div class="Events-carousel-item"><img src="{{ url('assets/images/image-event.png') }}" alt=""></div>
                    </div>
                    <div class="item">
                        <div class="Events-carousel-item"><img src="{{ url('assets/images/image-event.png') }}" alt=""></div>
                    </div>
                    <div class="item">
                        <div class="Events-carousel-item"><img src="{{ url('assets/images/image-event.png') }}" alt=""></div>
                    </div>
                    <div class="item">
                        <div class="Events-carousel-item"><img src="{{ url('assets/images/image-event.png') }}" alt=""></div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="Courses">
        <div class="Courses-bg"> <img src="{{ url('assets/images/bg-courses.png') }}" alt=""></div>
        <div class="container">
            <div class="Courses-wrapper">
                <div class="Courses-title flex items-center justify-center">
                    <h2>{{ __('landing.course.title') }}</h2>
                </div>
                <div class="Courses-list flex flex-wrap">
                    @if (!empty($courses))
                        @foreach ($courses as $course)
                            <div class="Courses-list-item">
                                <div class="Courses-list-item-image"> <img src="{{ url('assets/icons/icon-plane-world.svg') }}" alt=""></div>
                                <h3 class="Courses-list-item-title">{{ $course->name }}</h3>
                                <p class="Courses-list-item-description">{{ $course->note }}</p>
                            </div>
                        @endforeach
                    @else {{-- Placeholder --}}
                        <div class="Courses-list-item">
                            <div class="Courses-list-item-image"> <img src="{{ url('assets/icons/icon-plane-world.svg') }}" alt=""></div>
                            <h3 class="Courses-list-item-title">ELEmantary:Grade 2</h3>
                            <p class="Courses-list-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                        <div class="Courses-list-item">
                            <div class="Courses-list-item-image"> <img src="{{ url('assets/icons/icon-plane-world.svg') }}" alt=""></div>
                            <h3 class="Courses-list-item-title">ELEmantary:Grade 2</h3>
                            <p class="Courses-list-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                        <div class="Courses-list-item">
                            <div class="Courses-list-item-image"> <img src="{{ url('assets/icons/icon-plane-world.svg') }}" alt=""></div>
                            <h3 class="Courses-list-item-title">ELEmantary:Grade 2</h3>
                            <p class="Courses-list-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="Partners">
        <div class="container">
            <div class="Partners-wrapper">
                <div class="Partners-title">
                    <h2><span>300</span>{{ __('landing.partner.title') }}</h2>
                </div>
                <div class="Partners-list flex flex-wrap">
                    @if(!empty($schools))
                        @foreach ($schools as $school)
                            <div class="Partners-list-col">
                                <div class="Partners-list-item"><img src="{{ $school->images->get(0) }}" alt=""></div>
                            </div>
                        @endforeach
                    @else {{-- Placeholder --}}
                        <div class="Partners-list-col">
                            <div class="Partners-list-item"><img src="{{ url('assets/images/image-partner-1.png') }}" alt=""></div>
                        </div>
                        <div class="Partners-list-col">
                            <div class="Partners-list-item"><img src="{{ url('assets/images/image-partner-2.png') }}" alt=""></div>
                        </div>
                        <div class="Partners-list-col">
                            <div class="Partners-list-item"><img src="{{ url('assets/images/image-partner-3.png') }}" alt=""></div>
                        </div>
                        <div class="Partners-list-col">
                            <div class="Partners-list-item"><img src="{{ url('assets/images/image-partner-4.png') }}" alt=""></div>
                        </div>
                        <div class="Partners-list-col">
                            <div class="Partners-list-item"><img src="{{ url('assets/images/image-partner-5.png') }}" alt=""></div>
                        </div>
                        <div class="Partners-list-col">
                            <div class="Partners-list-item"><img src="{{ url('assets/images/image-partner-6.png') }}" alt=""></div>
                        </div>
                        <div class="Partners-list-col">
                            <div class="Partners-list-item"><img src="{{ url('assets/images/image-partner-1.png') }}" alt=""></div>
                        </div>
                        <div class="Partners-list-col">
                            <div class="Partners-list-item"><img src="{{ url('assets/images/image-partner-2.png') }}" alt=""></div>
                        </div>
                        <div class="Partners-list-col">
                            <div class="Partners-list-item"><img src="{{ url('assets/images/image-partner-3.png') }}" alt=""></div>
                        </div>
                        <div class="Partners-list-col">
                            <div class="Partners-list-item"><img src="{{ url('assets/images/image-partner-4.png') }}" alt=""></div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="Feedback">
        <div class="Feedback-wrapper">
            <div class="Feedback-title">
                <h2>{{ __('landing.feedback.title') }}</h2>
            </div>
            <div class="owl-carousel" id="Feedback-carousel">
                @if (!empty($feedbackVideos))
                    @foreach ($feedbackVideos as $feedbackVideo)
                        <div class="item">
                            <div class="Feedback-carousel-item"><iframe width="560" height="315" src="{{ $feedbackVideo->content }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                        </div>
                    @endforeach
                @else {{-- Placeholder --}}
                    <div class="item">
                        <div class="Feedback-carousel-item"><iframe width="560" height="315" src="https://www.youtube.com/embed/7tIMHzn0Gzg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    </div>
                    <div class="item">
                        <div class="Feedback-carousel-item"><iframe width="560" height="315" src="https://www.youtube.com/embed/7tIMHzn0Gzg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    </div>
                    <div class="item">
                        <div class="Feedback-carousel-item"><iframe width="560" height="315" src="https://www.youtube.com/embed/7tIMHzn0Gzg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    </div>
                    <div class="item">
                        <div class="Feedback-carousel-item"><iframe width="560" height="315" src="https://www.youtube.com/embed/7tIMHzn0Gzg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
