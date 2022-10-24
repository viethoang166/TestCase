<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <style>
        body{
           /* background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
            background-image: url('/images/low-angle-photography-of-city-street-with-snow-3396883.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .form{
            min-height: 100vh;
        }
        .bg_img{
            background-image: url('/images/background-with-violet-blue-tropical-leaves_52683-36496.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
        .form-login-content{
            min-height: 400px;
        }
        .form-login{
            padding: 20px;
            width: 90%;
            background-color: white;
            border-radius: 10px;
            margin: 0 auto;
            background-image: url('/images/test-background-Pattern-01.png');
            background-size:cover ;
            background-repeat: no-repeat;
        }
        .form-body-item{
            position: relative;
            margin-bottom: 30px;
        }

        .form-header{
            margin-bottom: 50px;
            text-align: center;
        }
        .form-footer{
            text-align: center;
        }
        .form-footer button{
            width: 120px;
        }
        .form-login-control{
            transition: all .3s ease-in-out;
        }
        .ipt-control::-webkit-input-placeholder {
            color:transparent;
        }

        .ipt-control:-moz-placeholder { /* Firefox 18- */
            color:transparent;
        }

        .ipt-control::-moz-placeholder {  /* Firefox 19+ */
            color:transparent;
        }

        .ipt-control:-ms-input-placeholder {
            color:transparent;
        }
        .form-body-item .lbl-name{
                position: absolute;
                top: 10px;
                transition: all .3s ease-in-out;
        }
        .err-msg{
            display: none;
        }
        #clock{
            font-size: 35px;
        }
        @media only screen and (min-width:992px){
            .form-login-control{
                width: 50%;
            }
        }
        @media only screen and (min-width:768px){
            .form-login-control{
                width: 80%;
            }

        }
        @media only screen and (min-width:600px){

            .form-body-item .lbl-name{
                color: #ccc;
                left: 10px;
                font-size: 10px;
                transform: translateY(3px);
            }
            .ipt-control:focus ~ .lbl-name, .ipt-control:not(:placeholder-shown) ~ .lbl-name{
                transform: translateY(-35px);
                color: black;
                font-size: 15px;
                left: 0px;
            }
        }
        @media only screen and (max-width:576px){
            .form-login-control{
                width: 100%;
            }
            .form-body-item .lbl-name{
                transform: translateY(-35px);
                color: black;
                font-size: 15px;
                left: 0px;
            }
        }
    </style>

    <div class="container form d-flex align-items-center">
        <div class="form-login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                         <div class="form-login-content d-flex justify-content-center align-items-center">
                             <div class="form-login-control">
                                <div class="form-header">
                                    <h2>Admin King Study</h2>
                                </div>
                                <form method="POST" action="{{ route('admin.login') }}">
                                <div class="form-body">
                                    @csrf
                                    <div class="form-body-item">
                                        <input id="email" name="email" class="form-control ipt-control" placeholder="email"/>
                                        <label for="email" class="lbl-name @error('email') is-invalid @enderror">Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-body-item">
                                        <input id="password" name="password" class="form-control ipt-control" placeholder="pass" type="password"/>
                                        <label for="password" class="lbl-name @error('password') is-invalid @enderror">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-body-item">
                                        <div class="@error('active') is-invalid @enderror"></div>
                                        @error('active')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-footer">
                                    <button class="btn btn-primary" type="submit" id="submit" >Sign in</button>
                                </div>
                             </div>
                            </form>
                         </div>
                    </div>
                    <div class="col-sm-4 bg_img"></div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
