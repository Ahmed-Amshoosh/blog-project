<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@lang('home.register')</title>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/icons/flags/flags.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @if (App::getLocale() == 'ar')
        <style>
            body{
                direction: rtl;
            }
            .login-wrapper .loginbox .login-right h1 {
                text-align: right !important;
            }
            .account-subtitle {
                text-align: right;

            }
            .profile-views {
                right: auto;
                left: 17px !important;
            }
            .login-wrapper .loginbox .login-right .forgotpass a {
                margin-right: auto;
                margin-left: 0;
            }
            .login-wrapper .loginbox .login-right .login-right-wrap .form-group label {
                right: 10px;
                left: auto;
            }
        </style>
    @endif

</head>
<body>
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox" style="width: fit-content">
{{--                <div class="login-left">--}}
{{--                    <img class="img-fluid" src="{{asset('img/login.png')}}" alt="Logo">--}}
{{--                </div>--}}
                <div class="login-right">
                    <div class="login-right-wrap">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{session()->get('success')}}
                            </div>
                        @endif
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{session()->get('error')}}
                                </div>
                            @endif
{{--                            @if($errors->any())--}}
{{--                                @foreach($errors->all() as $error)--}}
{{--                                    <div class="alert alert-danger">--}}
{{--                                        {{$error}}--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
                        <h1>@lang('home.register')</h1>
                        <p class="account-subtitle">@lang('home.enter_details_to_create_your_account')</p>




                        <form action="{{route('register.post')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>@lang('home.username') <span class="login-danger">*</span></label>
                                <input class="form-control" type="text" name="name">
                                <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                <div class="text-danger">
                                    {{$errors->first('name')}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('home.email') <span class="login-danger">*</span></label>
                                <input class="form-control" type="email" name="email">
                                <span class="profile-views"><i class="fas fa-envelope"></i></span>
                                <div class="text-danger">
                                    {{$errors->first('email')}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('home.password') <span class="login-danger">*</span></label>
                                <input class="form-control pass-input" type="password" name="password">
                                <span class="profile-views feather-eye toggle-password"></span>
                                <div class="text-danger">
                                    {{$errors->first('password')}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('home.confirm_password') <span class="login-danger">*</span></label>
                                <input class="form-control pass-confirm" type="password" name="confirm_password">
                                <span class="profile-views feather-eye reg-toggle-password"></span>
                                <div class="text-danger">
                                    {{$errors->first('confirm_password')}}
                                </div>
                            </div>
                            <div class=" dont-have">@lang('home.already_registered')@if (App::getLocale() == 'ar') ؟ @else ?  @endif <a href="{{url('login')}}">@lang('home.login')</a></div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block" type="submit">@lang('home.register')</button>
                            </div>
                        </form>

{{--                        <div class="login-or">--}}
{{--                            <span class="or-line"></span>--}}
{{--                            <span class="span-or">@lang('home.or')</span>--}}
{{--                        </div>--}}

{{--                        <div class="social-login">--}}
{{--                            <a href="#"><i class="fab fa-google-plus-g"></i></a>--}}
{{--                            <a href="#"><i class="fab fa-facebook-f"></i></a>--}}
{{--                            <a href="#"><i class="fab fa-twitter"></i></a>--}}
{{--                            <a href="#"><i class="fab fa-linkedin-in"></i></a>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('plugins/apexchart/apexcharts.min.js')}}"></script>
<script src="{{asset('plugins/apexchart/chart-data.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>

</html>
