<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>King Study</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/main.js"></script>
</head>

<body>

    <div class="ModalAuth Modal active" id="ModalAuth">
        <div class="Modal-overlay"> </div>
        <div class="Modal-main" style="max-width: 107.4rem;">
            <div class="Modal-body">
                <div class="ModalAuth-wrapper flex">
                    <div class="ModalAuth-wrapper-item">
                        <form class="ModalAuth-form flex flex-col" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="ModalAuth-form-logo"> <img src="https://daonghia2404.github.io/king-study/dist/assets/images/logo.svg" alt=""></div>
                            <h3 class="ModalAuth-form-title">Đăng nhập</h3>
                            @if (Session::has('message'))
                            <h2 style="color: red">{{ session('message') }}</h2>
                            @endif
                            <div class="Input  small bordered">
                                <input class="Input-control" type="text" name="email" placeholder="Nhập email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback d-block" style="font-size: 1.8rem" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="Input  small bordered">
                                <input class="Input-control" type="password" name="password" placeholder="Mật khẩu" value="{{ old('password') }}">
                                @error('password')
                                <span class="invalid-feedback d-block" style="font-size: 1.8rem" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="Input  small bordered">
                                @error('active')
                                <span class="invalid-feedback d-block" style="font-size: 1.8rem" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div><a class="ModalAuth-form-forgot-password" href="#">Quên mật khẩu</a>
                            <div class="Button secondary  middle bordered" data-modal-id="">
                                <button class="Button-control flex items-center justify-center" type="submit">
                                    <span class="Button-control-title">Đăng nhập</span>
                                </button>
                            </div><a class="ModalAuth-form-no-account" href="{{ route('register') }}">Chưa có tài khoản?<strong>Đăng ký</strong></a>
                        </form>
                    </div>
                    <div class="ModalAuth-wrapper-item">
                        <div class="owl-carousel ModalAuth-carousel" id="ModalAuth-carousel">

                            <div class="item">
                                <div class="ModalAuth-carousel-item flex flex-col items-center justify-center">
                                    <div class="ModalAuth-carousel-item-bg"> <img src="/images/image-modal-auth.png" alt=""></div>
                                    <div class="ModalAuth-carousel-item-title flex items-center justify-center">
                                        <h2>Chào mừng tới</h2>
                                        <h1>KingStudy</h1>
                                    </div>
                                    <div class="ModalAuth-carousel-item-info">
                                        <div class="ModalAuth-content style-content text-center">
                                            <p>KingStudy là đơn vị tư vấn, kết nối du học với 10 năm kinh nghiệm. Khi đến với King Study, bạn sẽ được hỗ trợ về thông tin về du học, học bổng và hướng dẫn hồ sơ, thủ tục.</p>
                                            <ul>
                                                <li>10 năm kinh nghiệm tư vấn và kết nối</li>
                                                <li>Tư vấn tận tình, chi tiết</li>
                                                <li>Làm việc chuyên nghiệp, uy tín, có lộ trình rõ ràng</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>
</footer>

</html>
