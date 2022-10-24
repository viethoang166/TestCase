@extends('layout.master')

@once
    @push('head')
        <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
        <style>
            .About-description {
                display: block;
                display: -webkit-box;
                height: 10.8rem;
                /* 4 (lines) * 1.8 (font-size) * 1.5 (line-height) */
                -webkit-line-clamp: 4;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                text-align: center;
            }
            .About-wrapper-item:hover .About-description {
                height: auto;
                -webkit-line-clamp: 999999999;
                overflow: visible;
            }
            .CoreValues-carousel-item-title {
                display: block;
                display: -webkit-box;
                height: 4.32rem;
                /* 1 (lines) * 3.6 (font-size) * 1.2 (line-height) */
                -webkit-line-clamp: 1;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                text-align: center;
            }

            .CoreValues-carousel-item-description {
                display: block;
                display: -webkit-box;
                height: 10.8rem;
                /* 4 (lines) * 1.8 (font-size) * 1.5 (line-height) */
                -webkit-line-clamp: 4;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                text-align: center;
            }

            .CoreValues-carousel-item:hover .CoreValues-carousel-item-title {
                height: auto;
                -webkit-line-clamp: 999999999;
                overflow: visible;
            }

            .CoreValues-carousel-item:hover .CoreValues-carousel-item-description {
                height: auto;
                -webkit-line-clamp: 999999999;
                overflow: visible;
            }

            .Vision-wrapper .Vision-description {
                display: block;
                display: -webkit-box;
                height: 10.8rem;
                /* 4 (lines) * 1.8 (font-size) * 1.5 (line-height) */
                -webkit-line-clamp: 4;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                text-align: center;
            }
            .popover {
                --form-width: calc(100vw / 1.5);
                max-width: var(--form-width, 400px);
                width: var(--form-width, 400px);
            }
            .popover-header .Vision-title h2{
                color: #212529;
                font-size: 3.6rem;
            }
            .popover-body .Vision-description{
                color: #212529;
                font-size: 1.8rem;
            }
        </style>
        <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ url('assets/js/landing.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
            integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
            integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endpush
    @push('scripts')
        <script>
            $(function() {
                let visionTitle = $(".Vision-title").clone();
                let visionDesc = $(".Vision-description").clone();
                $('#Vision-Showmore').popover({
                    title: () => visionTitle,
                    content: () => visionDesc,
                    html: true,
                    placement: 'top'
                })
            })
        </script>
    @endpush
@endonce

@section('main')
    <section class="HomeBanner">
        <div class="HomeBanner-wrapper">
            <div class="owl-carousel" id="HomeBanner-carousel" style="z-index: unset">
                @if (!$introductionSlides->isEmpty())
                    @foreach ($introductionSlides as $introductionSlide)
                        @php
                            $link = url('assets/images/image-banner-about.png');
                            if ($file = Storage::get(\App\Models\IntroductionSlide::BANNER_PATH . $introductionSlide->file)) {
                                $link = 'data:image/png;base64, ' . base64_encode($file);
                            }
                        @endphp
                        <div class="HomeBanner-carousel-item">
                            <img src="{{ $link }}" alt="">
                        </div>
                    @endforeach
                @else
                    <div class="HomeBanner-carousel-item">
                        <img src="{{ url('assets/images/image-banner-about.png') }}" alt="">
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="About">
        <div class="container">
            <div class="About-wrapper flex flex-wrap">
                @if (isset($introductionAbout))
                    @php
                        $link = url('assets/images/image-banner-about.png');
                        if ($image = Storage::get(\App\Models\IntroductionAbout::IMAGE_PATH . $introductionAbout->image)) {
                            $link = 'data:image/png;base64, ' . base64_encode($image);
                        }
                    @endphp
                    <div class="About-wrapper-item" >
                        <div class="About-image"> <img  style="height:500px " src="{{ $link }}" alt=""></div>
                    </div>
                    <div class="About-wrapper-item" style="margin-top:150px">
                        <div class="About-title flex items-center justify-center wow animate__animated animate__fadeInUp">
                            <h2>Giới thiệu về KingStudy</h2>
                        </div>
                        <div class="About-description">{{ $introductionAbout->description }}</div>
                        <div class="About-btns flex flex-wrap">
                            <div class="Button secondary js-open-modal small" data-modal-id="#ModalContactInformation">
                                <button class="Button-control flex items-center justify-center" type="button"><span
                                        class="Button-control-title">Liên hệ</span>
                                </button>
                            </div>
                            <div class="Button small" data-modal-id="">
                                <button class="Button-control flex items-center justify-center" type="button"><span
                                        class="Button-control-title">Nộp hồ sơ</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="About-wrapper-item">
                        <div class="About-image"> <img src="./assets/images/image-about.png" alt=""></div>
                    </div>
                    <div class="About-wrapper-item">
                        <div class="About-title flex items-center justify-center wow animate__animated animate__fadeInUp">
                            <h2>Giới thiệu về KingStudy</h2>
                        </div>
                        <div class="About-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the 1960s </div>
                        <div class="About-btns flex flex-wrap">
                            <div class="Button secondary js-open-modal small" data-modal-id="#ModalContactInformation">
                                <button class="Button-control flex items-center justify-center" type="button"><span
                                        class="Button-control-title">Liên hệ</span>
                                </button>
                            </div>
                            <div class="Button small" data-modal-id="">
                                <button class="Button-control flex items-center justify-center" type="button"><span
                                        class="Button-control-title">Nộp hồ sơ</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="CoreValues">
        <div class="container">
            <div class="CoreValues-wrapper">
                <div class="CoreValues-title wow animate__ animate__fadeInUp animated"
                    style="visibility: visible; animation-name: fadeInUp;">
                    <h2>Giá trị cốt lõi</h2>
                </div>
                <div class="CoreValues-carousel owl-carousel" id="CoreValues-carousel">
                    @if (!$coreValues->isEmpty())
                        @foreach ($coreValues as $coreValue)
                            @php
                                $link = asset('assets/images/image-value-core-1.png');
                                if ($file = Storage::get(\App\Models\CoreValue::IMAGE_PATH . $coreValue->image)) {
                                    $link = 'data:image/png;base64, ' . base64_encode($file);
                                }
                            @endphp
                            <div class="item">
                                <div class="CoreValues-carousel-item">
                                    <div class="CoreValues-carousel-item-image"><img style="height: 300px; border-radius: 2rem 2rem 0 0" src="{{ $link }}"
                                            alt=""></div>
                                    <h3 class="CoreValues-carousel-item-title" title="{{ $coreValue->title }}">
                                        {{ $coreValue->title }}</h3>
                                    <p class="CoreValues-carousel-item-description" title="{{ $coreValue->description }}">
                                        {{ $coreValue->description }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="item">
                            <div class="CoreValues-carousel-item">
                                <div class="CoreValues-carousel-item-image"><img
                                        src="{{ asset('assets/images/image-value-core-1.png') }}" alt=""></div>
                                <h3 class="CoreValues-carousel-item-title">Lorem Ipsum </h3>
                                <p class="CoreValues-carousel-item-description">Lorem Ipsum is simply dummy text of the
                                    printing
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="CoreValues-carousel-item">
                                <div class="CoreValues-carousel-item-image"><img
                                        src="{{ asset('assets/images/image-value-core-2.png') }}" alt=""></div>
                                <h3 class="CoreValues-carousel-item-title">Lorem Ipsum </h3>
                                <p class="CoreValues-carousel-item-description">Lorem Ipsum is simply dummy text of the
                                    printing
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="CoreValues-carousel-item">
                                <div class="CoreValues-carousel-item-image"><img
                                        src="{{ asset('assets/images/image-value-core-3.png') }}" alt=""></div>
                                <h3 class="CoreValues-carousel-item-title">Lorem Ipsum </h3>
                                <p class="CoreValues-carousel-item-description">Lorem Ipsum is simply dummy text of the
                                    printing
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="CoreValues-carousel-item">
                                <div class="CoreValues-carousel-item-image"><img
                                        src="{{ asset('assets/images/image-value-core-3.png') }}" alt=""></div>
                                <h3 class="CoreValues-carousel-item-title">Lorem Ipsum </h3>
                                <p class="CoreValues-carousel-item-description">Lorem Ipsum is simply dummy text of the
                                    printing
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="CoreValues-carousel-item">
                                <div class="CoreValues-carousel-item-image"><img
                                        src="{{ asset('assets/images/image-value-core-3.png') }}" alt=""></div>
                                <h3 class="CoreValues-carousel-item-title">Lorem Ipsum </h3>
                                <p class="CoreValues-carousel-item-description">Lorem Ipsum is simply dummy text of the
                                    printing
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="CoreValues-carousel-item">
                                <div class="CoreValues-carousel-item-image"><img
                                        src="{{ asset('assets/images/image-value-core-3.png') }}" alt=""></div>
                                <h3 class="CoreValues-carousel-item-title">Lorem Ipsum </h3>
                                <p class="CoreValues-carousel-item-description">Lorem Ipsum is simply dummy text of the
                                    printing
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="Vision">
        @if (isset($introductionVision))
            @php
                $link = url('assets/images/image-banner-about.png');
                if ($image = Storage::get(\App\Models\IntroductionVision::BACKGROUND_PATH . $introductionVision->background)) {
                    $link = 'data:image/png;base64, ' . base64_encode($image);
                }
            @endphp
            <div class="Vision-bg"> <img src="{{ $link }}" alt=""></div>
            <div class="container">
                <div class="Vision-wrapper">
                    <div class="Vision-title flex items-center justify-center">
                        <h2>Tầm nhìn</h2>
                    </div>
                    <p class="Vision-description">
                        {!! $introductionVision->description !!}
                    </p>
                    <div class="Vision-button flex justify-center">
                        <div class="Button small" data-modal-id="">
                            <button class="Button-control flex items-center justify-center" type="button" id="Vision-Showmore">
                                <span class="Button-control-title">Xem thêm</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="Vision-bg"> <img src="{{ asset('assets/images/image-banner-about.png') }}" alt=""></div>
            <div class="container">
                <div class="Vision-wrapper">
                    <div class="Vision-title flex items-center justify-center">
                        <h2>Tầm nhìn</h2>
                    </div>
                    <p class="Vision-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                        centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and
                        more
                        recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                    <div class="Vision-button flex justify-center">
                        <div class="Button small" data-modal-id="">
                            <button class="Button-control flex items-center justify-center" type="button"><span
                                    class="Button-control-title">Xem thêm</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
    <section class="HistoryGrowth">
        <div class="container">
            <div class="HistoryGrowth-wrapper">
                <h2 class="HistoryGrowth-title">Lịch sử hình thành & phát triển</h2>
                @foreach ($history as $his)
                    <p class="HistoryGrowth-description">{{ $his->overview }}</p>
                @endforeach
                <div class="HistoryGrowth-timeline flex flex-wrap">
                    <div class="HistoryGrowth-timeline-col">
                        @foreach ($historyDetails as $historyDetail)
                            <div class="HistoryGrowth-timeline-item wow animate__animated animate__fadeInUp">
                                <h5 class="HistoryGrowth-timeline-item-year">{{ $historyDetail->year }}</h5>
                                <p class="HistoryGrowth-description">{{ $historyDetail->description }}</p>
                            </div>
                        @endforeach
                    </div>
                    @foreach ($history as $his)
                        @php
                            $image = $his->image;
                            $base64Image = base64_encode(Storage::get('admin/history/' . $image) ?? '');
                        @endphp
                        <div class="HistoryGrowth-timeline-col">
                            <div class="HistoryGrowth-timeline-image"> <img style="border-radius:60%;"
                                    src="{{ 'data:image/png;base64,' . $base64Image }}" alt=""></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="Rewards">
        <div class="container">
            <div class="Rewards-wrapper">
                @if (isset($introductionRewards) && !$introductionRewards->isEmpty())
                    <div class="Rewards-title wow animate__animated animate__fadeInUp">
                        <h2>Thành tựu đạt được</h2>
                    </div>
                    <div class="Rewards-list flex flex-wrap">
                        @foreach ($introductionRewards as $introductionReward)
                            @php
                                $link = url('');
                                if ($image = Storage::get(\App\Models\IntroductionReward::ICON_PATH . $introductionReward->icon)) {
                                    $link = 'data:image/png;base64, ' . base64_encode($image);
                                }
                            @endphp
                            <div class="Rewards-list-item">
                                <div class="Rewards-list-item-icon">
                                    <img style="border-radius: 2rem"  src="{{ $link }}" alt="">
                                </div>
                                <h3 class="Rewards-list-item-title">{{ $introductionReward->title }}</h3>
                                <div class="line"></div>
                                <p class="Rewards-list-item-description">
                                    {!! $introductionReward->description !!}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="Rewards-title wow animate__animated animate__fadeInUp">
                        <h2>Thành tựu đạt được</h2>
                    </div>
                    <div class="Rewards-list flex flex-wrap">
                        <div class="Rewards-list-item">
                            <div class="Rewards-list-item-icon"> <img src="./assets/icons/icon-reward-1.svg"
                                    alt="">
                            </div>
                            <h3 class="Rewards-list-item-title">Lorem Ipsum is simply dummy text of the printing and </h3>
                            <div class="line"></div>
                            <p class="Rewards-list-item-description">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen
                                book. It has survived not only five centuries, but also the leap into </p>
                        </div>
                        <div class="Rewards-list-item">
                            <div class="Rewards-list-item-icon"> <img src="./assets/icons/icon-reward-2.svg"
                                    alt="">
                            </div>
                            <h3 class="Rewards-list-item-title">Lorem Ipsum is simply dummy text of the printing and </h3>
                            <div class="line"></div>
                            <p class="Rewards-list-item-description">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen
                                book. It has survived not only five centuries, but also the leap into </p>
                        </div>
                        <div class="Rewards-list-item">
                            <div class="Rewards-list-item-icon"> <img src="./assets/icons/icon-reward-3.svg"
                                    alt="">
                            </div>
                            <h3 class="Rewards-list-item-title">Lorem Ipsum is simply dummy text of the printing and </h3>
                            <div class="line"></div>
                            <p class="Rewards-list-item-description">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen
                                book. It has survived not only five centuries, but also the leap into </p>
                        </div>
                        <div class="Rewards-list-item">
                            <div class="Rewards-list-item-icon"> <img src="./assets/icons/icon-reward-4.svg"
                                    alt="">
                            </div>
                            <h3 class="Rewards-list-item-title">Lorem Ipsum is simply dummy text of the printing and </h3>
                            <div class="line"></div>
                            <p class="Rewards-list-item-description">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen
                                book. It has survived not only five centuries, but also the leap into </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="Customers dark">
        <div class="Customers-wrapper">
            <div class="Customers-title flex items-center justify-center wow animate__animated animate__fadeInUp">
                <h2>Đội ngũ lãnh đạo</h2>
            </div>
            <div class="owl-carousel" id="Customers-carousel">
                @if (isset($leaders) && !$leaders->isEmpty())
                    @foreach ($leaders as $leader)
                        @php
                            $link = asset('assets/images/image-avatar.png');
                            if ($file = Storage::get(\App\Models\User::AVATAR_PATH . $leader->avata)) {
                                $link = 'data:image/png;base64, ' . base64_encode($file);
                            }
                            
                            $faker = \Faker\Factory::create();
                        @endphp
                        <div class="item">
                            <div class="Customers-carousel-item flex items-center">
                                <div class="Customers-carousel-item-image"><img src="{{ $link }}"
                                        alt="">
                                </div>
                                <div class="Customers-carousel-item-info">
                                    <h5 class="Customers-carousel-item-info-title">{{ $leader->name }}</h5>
                                    <h6 class="Customers-carousel-item-info-subtitle">{{ $leader->getTypeName() }}</h6>
                                    <p class="Customers-carousel-item-info-description">
                                        "{{ $faker->catchPhrase() }}"
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="item">
                        <div class="Customers-carousel-item flex items-center">
                            <div class="Customers-carousel-item-image"><img
                                    src="{{ asset('assets/images/image-avatar.png') }}" alt="">
                            </div>
                            <div class="Customers-carousel-item-info">
                                <h5 class="Customers-carousel-item-info-title">Tran Thanh Hung</h5>
                                <h6 class="Customers-carousel-item-info-subtitle">Giám đốc điều hành</h6>
                                <p class="Customers-carousel-item-info-description">“Lorem Ipsum is simply dummy text of
                                    the
                                    printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                    text
                                    ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make
                                    a type specimen book. “</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="Advisory">
        <div class="container">
            <div class="Advisory-wrapper">
                @if (isset($advisors) && !$advisors->isEmpty())
                    <div class="Advisory-title wow animate__animated animate__fadeInUp">
                        <h2>Chuyên gia tư vấn</h2>
                    </div>
                    <div class="Advisory-list flex flex-wrap">
                        @foreach ($advisors as $advisor)
                            @php
                                $link = asset('assets/images/image-avatar.png');
                                if ($file = Storage::get(\App\Models\User::AVATAR_PATH . $advisor->avata)) {
                                    $link = 'data:image/png;base64, ' . base64_encode($file);
                                }
                            @endphp
                            <div class="Advisory-list-col">
                                <div class="Advisory-list-item">
                                    <div class="Advisory-list-item-avatar">
                                        <img src="{{ $link }}" alt="">
                                    </div>
                                    <h4 class="Advisory-list-item-title">{{ $advisor->name }}</h4>
                                    <p class="Advisory-list-item-description">{{ $advisor->getTypeName() }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="Advisory-title wow animate__animated animate__fadeInUp">
                        <h2>Chuyên gia tư vấn</h2>
                    </div>
                    <div class="Advisory-list flex flex-wrap">
                        <div class="Advisory-list-col">
                            <div class="Advisory-list-item">
                                <div class="Advisory-list-item-avatar"> <img
                                        src="{{ asset('assets/images/image-avatar.png') }}" alt=""></div>
                                <h4 class="Advisory-list-item-title">Tran Thanh Hung</h4>
                                <p class="Advisory-list-item-description">Giám đốc điều hành</p>
                            </div>
                        </div>
                        <div class="Advisory-list-col">
                            <div class="Advisory-list-item">
                                <div class="Advisory-list-item-avatar"> <img
                                        src="{{ asset('assets/images/image-avatar.png') }}" alt=""></div>
                                <h4 class="Advisory-list-item-title">Tran Thanh Hung</h4>
                                <p class="Advisory-list-item-description">Giám đốc điều hành</p>
                            </div>
                        </div>
                        <div class="Advisory-list-col">
                            <div class="Advisory-list-item">
                                <div class="Advisory-list-item-avatar"> <img
                                        src="{{ asset('assets/images/image-avatar.png') }}" alt=""></div>
                                <h4 class="Advisory-list-item-title">Tran Thanh Hung</h4>
                                <p class="Advisory-list-item-description">Giám đốc điều hành</p>
                            </div>
                        </div>
                        <div class="Advisory-list-col">
                            <div class="Advisory-list-item">
                                <div class="Advisory-list-item-avatar"> <img
                                        src="{{ asset('assets/images/image-avatar.png') }}" alt=""></div>
                                <h4 class="Advisory-list-item-title">Tran Thanh Hung</h4>
                                <p class="Advisory-list-item-description">Giám đốc điều hành</p>
                            </div>
                        </div>
                        <div class="Advisory-list-col">
                            <div class="Advisory-list-item">
                                <div class="Advisory-list-item-avatar"> <img
                                        src="{{ asset('assets/images/image-avatar.png') }}" alt=""></div>
                                <h4 class="Advisory-list-item-title">Tran Thanh Hung</h4>
                                <p class="Advisory-list-item-description">Giám đốc điều hành</p>
                            </div>
                        </div>
                        <div class="Advisory-list-col">
                            <div class="Advisory-list-item">
                                <div class="Advisory-list-item-avatar"> <img
                                        src="{{ asset('assets/images/image-avatar.png') }}" alt=""></div>
                                <h4 class="Advisory-list-item-title">Tran Thanh Hung</h4>
                                <p class="Advisory-list-item-description">Giám đốc điều hành</p>
                            </div>
                        </div>
                        <div class="Advisory-list-col">
                            <div class="Advisory-list-item">
                                <div class="Advisory-list-item-avatar"> <img
                                        src="{{ asset('assets/images/image-avatar.png') }}" alt=""></div>
                                <h4 class="Advisory-list-item-title">Tran Thanh Hung</h4>
                                <p class="Advisory-list-item-description">Giám đốc điều hành</p>
                            </div>
                        </div>
                        <div class="Advisory-list-col">
                            <div class="Advisory-list-item">
                                <div class="Advisory-list-item-avatar"> <img
                                        src="{{ asset('assets/images/image-avatar.png') }}" alt=""></div>
                                <h4 class="Advisory-list-item-title">Tran Thanh Hung</h4>
                                <p class="Advisory-list-item-description">Giám đốc điều hành</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
