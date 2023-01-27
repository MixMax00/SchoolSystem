
@php
  $settings = \App\Models\GeneralSettings::find(1);
@endphp
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> {{ $settings->website_name }} | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ $settings->favicon }}">
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
            <form action="{{ route('librarian.login') }}" method="post" class="login-form text-white">
                @csrf
                <div class="form-group">
                    <label class="text-white">Email</label>
                    <input type="text" placeholder="Enter Email" name="email" value="librarian@gmail.com" class="text-white form-control @error('email') is-invalid @enderror">
                    <i class="far fa-envelope"></i>
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label class="text-white">Password</label>
                    <input type="password" placeholder="Enter password" value="12345678" name="password" class="form-control text-white @error('password') is-invalid @enderror">
                    <i class="fas fa-lock"></i>
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input text-white" id="remember-me">
                        <label for="remember-me" class="form-check-label text-white">Remember Me</label>
                    </div>
                    <a href="#" class="forgot-btn text-white">Forgot Password?</a>
                </div>
                <div class="form-group">
                    <button type="submit" class="login-btn text-white">Login</button>
                </div>
            </form>
{{--            <div class="login-social">--}}
{{--                <p>or sign in with</p>--}}
{{--                <ul>--}}
{{--                    <li><a href="#" class="bg-fb"><i class="fab fa-facebook-f"></i></a></li>--}}
{{--                    <li><a href="#" class="bg-twitter"><i class="fab fa-twitter"></i></a></li>--}}
{{--                    <li><a href="#" class="bg-gplus"><i class="fab fa-google-plus-g"></i></a></li>--}}
{{--                    <li><a href="#" class="bg-git"><i class="fab fa-github"></i></a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
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
