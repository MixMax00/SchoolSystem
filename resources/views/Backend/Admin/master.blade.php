<!doctype html>
<html class="no-js" lang="">
@php($settings = \App\Models\GeneralSettings::find(1))
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DrutoSchool | @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset($settings->favicon)?? ''}}">
   @include('Backend.Admin.Includes.Css.css')
   @include('Backend.Admin.Includes.Css.datatable_css')

   @yield('css')

</head>

<body>
<!-- Preloader Start Here -->
<div id="preloader"></div>
<!-- Preloader End Here -->
<div id="wrapper" class="wrapper bg-ash">
    <!-- Header Menu Area Start Here -->
   @include('Backend.Admin.Includes.Partials.Navbar.navbar')
    <!-- Header Menu Area End Here -->
    <!-- Page Area Start Here -->
    <div class="dashboard-page-one">
        <!-- Sidebar Area Start Here -->
        @include('Backend.Admin.Includes.Partials.Sidebar.sidebar')
        <!-- Sidebar Area End Here -->
        <div class="dashboard-content-one">
            @yield('content')
            <!-- Footer Area Start Here -->
           @include('Backend.Admin.Includes.Partials.Footer.footer')
            <!-- Footer Area End Here -->
        </div>
    </div>
    <!-- Page Area End Here -->
</div>

@include('Backend.Admin.Includes.Js.js')
@include('Backend.Admin.Includes.Js.datatable_js')
</body>

</html>
