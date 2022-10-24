<header class="Header">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-3">
              <div class="header-logo">
                  <a href="{{ route('home') }}">
                    <img src="{{ url('../image') }}/logo/logokingstudy.png"
                          alt="">
                        </a>
              </div>
          </div>
          <div class="col-md-6">
              <div class="header-sreach">
                  <form class="d-flex">
                      <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-light" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </form>
              </div>

            </div>
            <div class="col-md-3">
                <div class="header-icon">
                    @if (!Auth::check())
                    <div class="icon-login"><i class="fa fa-user-circle-o" aria-hidden="true"></i><br> <a
                            href="{{ route('register') }}">Đăng ký</a>/
                            <a href="{{ route('login') }}">Đăng nhập</a>
                         </div>
                    <div class="icon-compare"><i class="fa fa-compress" aria-hidden="true"></i><br> <a href="{{route('compare')}}">So sánh</a> </div>
                    @else 
                    <!-- -->
                    <li class=" dropdown" style="font-size: 1.4rem;">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="font-size: 1.0rem;" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            <a class="dropdown-item" style="font-size: 1.0rem;" href="{{ route('users.edit', Auth::user()->id) }}">
                                {{ __('Update') }}
                            </a>

                        </div>
                    </li>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<div class="menu">
  <div class="container">
      <div class="header-menu">
          <ul>
              <li><a href="{{ route("introduction")}}" title="Giới thiệu">Giới thiệu</a></li>
              <li><a href="{{route("newspage")}}" title="Tin tức & Sự kiện">Tin tức & Sự kiện</a></li>
              <li id="menuid"><a href="#" title="Du học">Du học</a>
                  <!-- menu con sổ xuống cấp 1 -->
                  <ul class="sub-menu">
                      <li><a href="#" title="">Khảo sát du học</a></li>
                      <li><a href="{{ route('studyabroad' , 'EN') }}" title="">Du học Anh</a></li>
                      <li><a href="{{ route('studyabroad' , 'AU') }}" title="">Du học Úc</a></li>
                      <li><a href="{{ route('studyabroad' , 'US') }}" title="">Du học Mỹ</a></li>
                      <li><a href="{{ route('studyabroad' , 'CA') }}" title="">Du học Cannada</a></li>
                      <li><a href="{{ route('studyabroad' , 'NL') }}" title="">Du học Hà Lan</a></li>
                      </li>
                  </ul>
              </li>
              <li><a href="#" title="Dịch vụ">Học bổng</a>
                <ul class="sub-menu">
                    <li><a href="{{ route('scholarship' , 'EN') }}" title="">Học bổng Anh</a></li>
                    <li><a href="{{ route('scholarship' , 'AU') }}" title="">Học bổng Úc</a></li>
                    <li><a href="{{ route('scholarship' , 'US') }}" title="">Học bổng Mỹ</a></li>
                    <li><a href="{{ route('scholarship' , 'CA') }}" title="">Học bổng Cannada</a></li>
                    <li><a href="{{ route('scholarship' , 'NL') }}" title="">Học bổng Hà Lan</a></li>
                    </li>
                </ul>
            </li>
              <li><a href="/page/service" title="Dịch vụ">Dịch vụ</a></li>
              <li><a href="/contact" title="Liện hệ">Liên hệ</a></li>
          </ul>
      </div>
  </div>
</div>
