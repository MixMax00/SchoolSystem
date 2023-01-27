@php($settings = \App\Models\GeneralSettings::find(1))
@php($role_name = \App\Models\Role::where('id',auth()->user()->role_id)->first())
<div class="navbar navbar-expand-md header-menu-one bg-light">
    <div class="nav-bar-header-one">
        <div class="header-logo">
            <a href="{{route('admin.dashboard')}}">
                <img src="{{isset($settings->logo) ? asset($settings->logo) :''}}" style="width: 161px; height: 48px" alt="logo">
            </a>
        </div>
        <div class="toggle-button sidebar-toggle">
            <button type="button" class="item-link">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
            </button>
        </div>
    </div>
    <div class="d-md-none mobile-nav-bar">
        <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
            <i class="far fa-arrow-alt-circle-down"></i>
        </button>
        <button type="button" class="navbar-toggler sidebar-toggle-mobile">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
        <ul class="navbar-nav">
            <li class="navbar-item header-search-bar">
                <div class="input-group stylish-input-group">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="flaticon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                    <input type="text" class="form-control" placeholder="Find Something . . .">
                </div>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="navbar-item dropdown header-admin">
                <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                   aria-expanded="false">
                    <div class="admin-title">
                        <h5 class="item-title">{{ auth()->user()->name }}</h5>
                        <span>{{ \App\Models\Role::where('id',auth()->user()->role_id)->first()->name }}</span>
                    </div>
                    <div class="admin-img">
                        <img src="{{asset('assets/backend')}}/img/figure/admin.jpg" alt="Admin">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="item-header">
                        <h6 class="item-title">{{ auth()->user()->name }}</h6>
                    </div>
                    <div class="item-content">
                        <ul class="settings-list">
                            <li><a href="{{ route('profile.index') }}"><i class="flaticon-user"></i>My Profile</a></li>
                            <li><a href="{{ route('change.password') }}"><i class="flaticon-user"></i>Change Password</a></li>
                             <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                ><i class="flaticon-turn-off"></i>Log Out</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </li>
           </ul>
    </div>
</div>
