@php($general_settings = \App\Models\GeneralSettings::find(1))

<div class="top-header">
    <div
        class="container d-flex align-items-center justify-content-between"
    >
        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="me-3"
            ><i class="fas fa-envelope me-2"></i> {{$general_settings->email}} </a
            ><br />
            <a href="#"
            ><i class="fas fa-mobile-alt me-2"></i>{{$general_settings->phone}}</a
            >
        </div>
        <div class="dov">
            <a class="me-2" href="#">Sign in </a>
            <span class="me-2">|</span>
            <a href="#">Sign up</a>
        </div>
    </div>
</div>
