<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Reset Password</title>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/icons/flags/flags.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox" style="width: fit-content;height: fit-content!important;">

                <div class="login-right" style="height: fit-content;">
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

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif

                        <h1>Reset Password</h1>
                            <br>

                        <form action="{{route('password.email')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Email Addres <span class="login-danger">*</span></label>
                                <input class="form-control" type="email" name="email">

                                <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                @if($errors->has('email'))
                                    <span class="text-danger">
                                        {{$errors->first('email')}}
                                    </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
                            </div>
                        </form>



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