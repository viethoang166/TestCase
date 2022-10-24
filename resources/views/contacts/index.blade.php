@extends('layout.master')

@once
    @push('head')
        <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
    @endpush
@endonce
@section('main')
    @if ($contact)
        <section class="ContactInformation">
            <div class="ContactInformation-info">
                <div class="container">
                    <div class="ContactInformation-wrapper flex flex-wrap items-center">
                        <div class="ContactInformation-wrapper-item">
                            <div class="ContactInformation-image"><img src="{{ $contact->image }}" style="width: 800xp ; height: 400px;" alt=""></div>
                        </div>
                        <div class="ContactInformation-wrapper-item">
                            <h2 class="ContactInformation-title">Thông tin liên hệ</h2>
                            <ul class="ContactInformation-list">
                                <li class="ContactInformation-list-item flex items-start"><span
                                        class="ContactInformation-list-item-icon"> <img src="fonts/icon-phone.svg"
                                            alt=""></span><span class="ContactInformation-list-item-label">Hotline:
                                        <a href="tel: 0569999595">{{ $contact->hotline }}</a></span></li>
                                <li class="ContactInformation-list-item flex items-start"><span
                                        class="ContactInformation-list-item-icon"> <img src="fonts/icon-email.svg"
                                            alt=""></span><span class="ContactInformation-list-item-label">Email: <a
                                            href="mailto: info@kingstudy.vn">{{ $contact->email }}</a></span></li>
                                <li class="ContactInformation-list-item flex items-start"><span
                                        class="ContactInformation-list-item-icon"> <img src="fonts/icon-map.svg"
                                            alt=""></span><span
                                        class="ContactInformation-list-item-label">{{ $contact->address }}</span></li>
                                <li class="ContactInformation-list-item flex items-start"><span
                                        class="ContactInformation-list-item-icon"> <img src="fonts/icon-facebook.svg"
                                            alt=""></span><span class="ContactInformation-list-item-label">Facebook:
                                        <a href="facebook.com">{{ $contact->facebook }}</a></span></li>
                                <li class="ContactInformation-list-item flex items-start"><span
                                        class="ContactInformation-list-item-icon"> <img src="fonts/icon-zalo.svg"
                                            alt=""></span><span class="ContactInformation-list-item-label">Zalo: <a
                                            href=": chat.zalo.me">{{ $contact->zalo }}</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ContactInformation-map">
                <iframe src="{{ $contact->map }}" width="600" height="450" style="border:0;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </section>
    @endif
@endsection
