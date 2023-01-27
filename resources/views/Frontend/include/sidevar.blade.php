@php($generals = \App\Models\GeneralSettings::find(1))

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->

        <div class="div d-flex" style="width: 300px">
            <a class="navbar-brand" href="{{ route('frontend') }}">
            <img
                style="width: 60px; height: 35px; margin-top: 5px"
                class="img-fluid"
                src="{{ isset($generals->logo) ? asset($generals->logo) : ' ' }}"
                alt="Logo"
            />
            </a>
            <h6 class="mt-2 nav-title" style="color: orange; font-size: 16px;">
                {{ isset($generals->website_name) ? $generals->website_name : ' ' }}
            </h6>

        </div>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
              <span class="navbar-toggler-icon">
                <i class="fas fa-align-justify"></i>
              </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul
                class="navbar-nav mx-auto mb-2 mb-lg-0 d-flex justify-content-center"
            >
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        aria-current="page"
                        href="{{ route('frontend') }}"
                    >Home</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        aria-current="page"
                        href="{{ route('frontend.about') }}"
                    >About</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        aria-current="page"
                        href="{{ route('frontend.teacher') }}"
                    >Teacher</a>
                </li>




                <li class="nav-item" aria-current="page">
                    <a class="nav-link" href="{{ route('frontend.notice') }}"> Noticeboard </a>
                </li>

                <li class="nav-item dropdown position-static">
                    <a
                        class="nav-link"
                        href="{{ route('frontend.gallery') }}"
                        id="navbarDropdown"
                        role="button"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Gallery</i>
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link active"
                        aria-current="page"
                        href="{{ route('frontend.event') }}"
                    >Events</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        aria-current="page"
                        href="{{ route('frontend.contact') }}"
                    >Contact</a
                    >
                </li>
                <li class="nav-item">
                    <a
                      class="nav-link {{($route == 'online-admission.form') ? 'active': ''}}"
                      aria-current="page"
                      href="{{ route('online-admission.form') }}"
                      >Online admission</a
                    >
                </li>
            </ul>
            <div class="button-primary nav-button">
                <a href="{{ route('login') }}" class="btn text-uppercase"> Sign In </a>
            </div>
        </div>
    </div>
</nav>
