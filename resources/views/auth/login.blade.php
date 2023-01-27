{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}


@php
  $settings = \App\Models\GeneralSettings::find(1);
@endphp
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> {{ $settings->website_name ?? '' }} | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ $settings->favicon ?? '' }}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{asset('assets/backend')}}/css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/backend')}}/css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/backend')}}/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/backend')}}/css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('assets/backend')}}/fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('assets/backend')}}/css/animate.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/backend')}}/style.css">
    <!-- Modernize js -->
    <script src="{{asset('assets/backend')}}/js/modernizr-3.6.0.min.js"></script>
</head>

<body>
<!-- Preloader Start Here -->
<div id="preloader"></div>
<!-- Preloader End Here -->
<!-- Login Page Start Here -->
<div class="login-page-wrap">
    <div class="login-page-content bg-white">
        <div class="login-box" style="background-color: #030C3D">
            <div class="item-logo">
                <img src="{{ isset($settings->logo) ?  asset($settings->logo) :  '' }}" alt="logo" height="100" width="150px">
            </div>
            <form action="{{ route('login') }}" method="post" class="login-form text-white">
                @csrf
                <div class="form-group">
                    <label class="text-white">Email</label>
                    <input type="text" placeholder="Enter Email" name="email" value="admin@gmail.com" class="text-white form-control @error('email') is-invalid @enderror">
                    <i class="far fa-envelope"></i>
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message ?? ''}}</div>
                @enderror
                <div class="form-group">
                    <label class="text-white">Password</label>
                    <input type="password" placeholder="Enter password" name="password" value="12345678" class="form-control text-white @error('password') is-invalid @enderror">
                    <i class="fas fa-lock"></i>
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message ?? ''}}</div>
                @enderror
                <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input text-white" id="remember-me">
                        <label for="remember-me" class="form-check-label text-white">Remember Me</label>
                    </div>
                    <a href="{{ route('admin.forget') }}" class="forgot-btn text-white">Forgot Password?</a>
                </div>
                <div class="form-group">
                    <button type="submit" class="login-btn text-white">Login</button>
                </div>


            </form>
           <div class="form-group">
               <p>or sign in with</p>
               <ul class="d-flex">
                    <li class="ml-2"><a href="{{ url('/teacher/login')  }}" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Teacher</a></li>
                    <li class="ml-2"><a href="{{ route('sms.login')  }}" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Student</a></li>
                    <li class="ml-2"><a href="{{ route('librarian.login')  }}" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Librarian</a></li>

             </ul>
            </div>
        </div>
{{--        <div class="sign-up">Don't have an account ? <a href="#">Signup now!</a></div>--}}
    </div>
</div>
<!-- Login Page End Here -->
<!-- jquery-->
<script src="{{asset('assets/backend')}}/js/jquery-3.3.1.min.js"></script>
<!-- Plugins js -->
<script src="{{asset('assets/backend')}}/js/plugins.js"></script>
<!-- Popper js -->
<script src="{{asset('assets/backend')}}/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="{{asset('assets/backend')}}/js/bootstrap.min.js"></script>
<!-- Scroll Up Js -->
<script src="{{asset('assets/backend')}}/js/jquery.scrollUp.min.js"></script>
<!-- Custom Js -->
<script src="{{asset('assets/backend')}}/js/main.js"></script>

</body>

</html>
