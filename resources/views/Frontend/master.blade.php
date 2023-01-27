@php

$route = Route::current()->getname();

$title_name = \App\Models\GeneralSettings::find(1);

@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="SK-School" />
    <meta name="author" content="School" />
    <link
        rel="shortcut icon"
        type="image/png"
        href="{{asset('assets/frontend')}}/image/favicon/favicon.png"
    />
    <title>@yield('title') | {{ $title_name->website_name }}</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />
    <!-- Fontawesome Icon Fonts -->
    <link
        rel="stylesheet"
        type="text/css"
        href="{{asset('assets/frontend')}}/icon/fontawesome/css/all.min.css"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/custom.css" />
</head>

<body>
<div class="{{($route == 'frontend') ?'langing-page1': ''}}
            {{($route == 'online-admission.form') ?'addmition': ''}}
            {{($route == 'frontend.event') ?'event-page': ''}}
            {{($route == 'frontend.contact') ?'contact-page': ''}}
            {{($route == 'frontend.teacher-details') ?'teacher-page': ''}}
            {{($route == 'frontend.notice') ?'notice-board': ''}}
            {{($route == 'frontend.about') ?'about-page': ''}}
            {{($route == 'frontend.teacher') ? 'teacher-page' : ''}}
            {{($route == 'frontend.gallery') ? 'gallery' : ''}}">
    <header>
        <!-- Nav section Start -->
        {{-- @include('Frontend.include.topbar') --}}
        @include('Frontend.include.sidevar')

        <!-- Nav section End -->
    </header>

  @yield('content')

    <!-- Scroll Button Start-->
    <div class="scroll-btn">
        <i class="fas fa-arrow-circle-up"></i>
    </div>
    <!-- Scroll Button End-->

    <!-- Footer Start -->
     @include('Frontend.include.footer')
    <!-- Footer End -->
</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" integrity="sha512-qzrZqY/kMVCEYeu/gCm8U2800Wz++LTGK4pitW/iswpCbjwxhsmUwleL1YXaHImptCHG0vJwU7Ly7ROw3ZQoww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/frontend')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/frontend')}}/js/scrollTop.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

  @yield('js')
</body>
</html>

