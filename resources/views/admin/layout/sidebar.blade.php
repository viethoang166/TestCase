<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar-header" style="height: auto; padding-left: 30px">
        <div class="sidebar-header-image" >
            <a href="#" class="brand-link d-flex justify-content-start">
                <img src="{{ asset('assets/images/logo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3 mx-0 bg-white" style="float: none;opacity: .8">
                <span class="brand-text font-weight-light ms-2">{{ config('app.name') }}</span>
            </a>
        </div>
    </div>
    <div class="sidebar">
        <div class="user-panel py-3 d-flex" style="overflow: initial; padding-left: 30px">
            @if (Auth::check())
                @php
                    $link = 'https://via.placeholder.com/150';
                    if ($avatar = Storage::get('admin/avatar/'. Auth::user()->avata)) {
                        $link = 'data:image/png;base64,' . base64_encode($avatar);
                    }
                @endphp
                <div class="image d-flex align-items-center" style="max-width: 2.1rem; padding-left: initial">
                    <img src="{{ $link }}" alt="User Avatar" class="img-circle elevation-2" style="width:unset; max-width: 100%">
                </div>
                <div class="info" style="overflow: initial;">
                    <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-info" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <input class="" style="background: none; color: inherit; padding: 0; border:none;" type="submit" value="{{ __('app.logout') }}">
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <nav class="mt-2 sidebar-menu ">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="menu-side"><a href="{{ route('dashboard') }}"><span><i class="fa fa-home" aria-hidden="true"></i>Dashboard</span></a></li>

                <li class="menu-side"><a href="{{route('user.index')}}"><span><i class="fa fa-user" aria-hidden="true"></i> Nhân Viên</span></a></li>

                <li class="menu-side"><a href="{{route('customer.index')}}"><span><i class="fa fa-user" aria-hidden="true"></i> Khách hàng</span></a></li>

                <li class="menu-side"><a><span><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Giới thiệu</span></a>
                    <ul class="sub-menu">
                        <li class="sub-menu-side"><a href="{{ route('introduction-slide.index') }}" class="d-flex justify-content-start" style="line-height: 1rem">
                            <i class="fa-regular fa-image"></i> <span> Banner </span>
                        </a></li>
                        <li class="sub-menu-side"><a href="{{ route('introduction-about.index') }}" class="d-flex justify-content-start" style="line-height: 1rem">
                            <i class="fa-regular fa-image"></i> <span> About </span>
                        </a></li>
                        <li class="sub-menu-side"><a href="{{ route('core-value.index') }}" class="d-flex justify-content-start" style="line-height: 1rem">
                            <i class="fa-regular fa-image"></i> <span> Core Value </span>
                        </a></li>
                        <li class="sub-menu-side"><a href="{{ route('introduction-vision.index') }}" class="d-flex justify-content-start" style="line-height: 1rem">
                            <i class="fa-regular fa-image"></i> <span> Vision </span>
                        </a></li>
                        <li class="sub-menu-side"><a href="{{ route('history.index') }}" class="d-flex justify-content-start" style="line-height: 1rem">
                            <i class="fa-regular fa-image"></i> <span> History</span>
                        </a></li>
                        <li class="sub-menu-side"><a href="{{ route('history-detail.index') }}" class="d-flex justify-content-start" style="line-height: 1rem">
                            <i class="fa-regular fa-image"></i> <span> History Detail</span>
                        </a></li>
                        <li class="sub-menu-side"><a href="{{ route('introduction-reward.index') }}" class="d-flex justify-content-start" style="line-height: 1rem">
                            <i class="fa-regular fa-image"></i> <span> Reward </span>
                        </a></li>
                    </ul>
                </li>
                <li class="menu-side"><a href="{{ route('news.index') }}"> <span><i class="fa-regular fa-newspaper"></i> Tin tức & sự kiện</span></a></li>

                <li class="menu-side"><a href=""> <span><i class="fa fa-plane" aria-hidden="true"></i> Du học</span></a>
                    <ul class="sub-menu">
                        <li class="sub-menu-side"><a href="{{ route('schools.index') }}" class="d-flex justify-content-start" style="line-height: 1rem">
                            <i class="fa fa-university" aria-hidden="true"></i> <span> Trường Đại Học</span>
                        </a></li>
                        <li class="sub-menu-side"><a href="{{ route('level.index') }}" class="d-flex justify-content-start" style="line-height: 1rem">
                            <i class="fa fa-university" aria-hidden="true"></i> <span> Bậc học</span>
                        </a></li>
                        <li class="sub-menu-side"><a href="{{ route('majors.index') }}" class="d-flex justify-content-start" style="line-height: 1rem">
                            <i class="fa fa-book" aria-hidden="true"></i> <span>Ngành Học</span>
                        </a></li>
                        <li class="sub-menu-side"><a href="{{ route('courses.index') }}" class="d-flex justify-content-start" style="line-height: 1rem">
                            <i class="fa fa-book" aria-hidden="true"></i> <span>Khoá học</span>
                        </a></li>
                    </ul>
                </li>

                <li class="menu-side"><a href="{{route('scholarships.index')}}"><span><i class="fa fa-graduation-cap" aria-hidden="true"></i> Học bổng</span> </a></li>

                <li class="menu-side"><a href="{{route('contact.show', 1)}}"><span> <i class="fa fa-phone" aria-hidden="true"></i> Liên hệ</span></a></li>

                <li class="menu-side"><a href="{{route('contact-info.index')}}"><span> <i class="fa fa-phone" aria-hidden="true"></i>Tư vấn</span></a></li>

                <li class="menu-side"><a href="{{ route('country.index') }}"><span> <i class="fa fa-solid fa-globe" aria-hidden="true"></i> Quốc Gia</span></a></li>

                <li class="menu-side"><a href="{{ route('cities.index') }}"><span><i class="fa fa-building" aria-hidden="true"></i> Thành Phố</span></a></li>

                <li class="menu-side"><a href="{{ route('feedback.index') }}"><span><i class="fa fa-newspaper" aria-hidden="true"></i> Feedback</span></a></li>

                <li class="menu-side"><a href="{{ route('service.index') }}"><span><i class="fa fa-globe" aria-hidden="true"></i> Dịch vụ</span></a></li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
