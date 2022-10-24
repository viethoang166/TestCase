@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ empty($contactInfos) ? 0 : $contactInfos->count() }}</h3>
                        <p>{{ __('dashboard.contact-information') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('contact-info.index') }}" class="small-box-footer">
                        {{ __('dashboard.showmore') }}
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ empty($news) ? 0 : $news->count() }}</h3>
                        <p>{{ __('dashboard.new') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fa-regular fa-newspaper"></i>
                    </div>
                    <a href="{{ route('news.index') }}" class="small-box-footer">
                        {{ __('dashboard.showmore') }}
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ empty($schools) ? 0 : $schools->count() }}</h3>
                        <p>{{ __('dashboard.school') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-university" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('schools.index') }}" class="small-box-footer">
                        {{ __('dashboard.showmore') }}
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ empty($customers) ? 0 : $customers->count() }}</h3>
                        <p>{{ __('dashboard.customer') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('customer.index') }}" class="small-box-footer">
                        {{ __('dashboard.showmore') }}
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>



    </div>
@endsection
