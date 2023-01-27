@php($general = \App\Models\GeneralSettings::find(1))


@php($social_icons = \App\Models\SocialSettings::where('status',1)->get())



 <footer class="footer overflow-hidden">
        <div class="container">
          <div class="row justify-content-center section_padding">
            <div class="col-lg-4 form">
              <div class="input-group mb-3" style="width: 100%">
               <h5 style="color: orange">{{ $general->website_name }}</h5>
              </div>
              <a href="{{ route('frontend') }}">
                <img
                  style="width: 160px"
                  class="img-fluid"
                  src="{{ isset($general->logo) ? asset($general->logo) : '' }}"
                  alt="footer-logo"
              /></a>
              <div class="social_icon">
                <ul class="d-flex">
                  <h6 class="sicon me-3 mt-2">Follow Us on</h6>
                  @foreach ($social_icons as $social_icon)
                    <li class="mt-1">
                        <a href="{{ $social_icon->url }}" target="_blank">
                        <i
                            style="
                            font-size: 20px;
                            color: orange;
                            "
                            class="fab fa-{{ $social_icon->icon }}"

                        ></i>

                        </a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-6 col-sm-3 col-lg-3">
              <div class="footer_list">
                <h6 class="footer_header">Contact</h6>
                <ul>
                  <li style="font-size: 12px;color:#cddaf0; margin-bottom:10px; font-wight:700;">

                    <a href="tel:{{ $general->phone }}">{{ $general->phone }}</a>
                  </li>
                  <li style="font-size: 12px;color:#cddaf0; margin-bottom:10px; font-wight:700;">
                    <a class="email" title="Email a friend" href="#" onclick="javascript:window.location='mailto:?subject=Application to session&body=: ' + window.location;">{{ $general->email }}</a>

                  </li>
                  <li style="font-size: 12px;color:#cddaf0; margin-bottom:10px; font-wight:700;">
                    <a href="http://maps.google.com/?q={{ $general->address }}">{{ $general->address }}</a>
                  {{--   498 Street Area, <br />Dhaka, Bangladesh. --}}
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-6 col-sm-3 col-lg-2">
              <div class="footer_list">
                <h6 class="footer_header">About</h6>
                <ul>
                  <li>
                    <a href="{{ route('frontend.about') }}">About</a>
                  </li>
                  {{-- <li>
                    <a href="{{ route('frontend.teacher') }}">Teachers </a>
                  </li> --}}
                  <li>
                    <a href="{{ route('frontend.gallery') }}">Gallery</a>
                  </li>
                  <li>
                    <a href="{{ route('frontend.event') }}">Events</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
              <div class="footer_list">
                <h6 class="footer_header">Resources</h6>
                <ul>
                  <li>
                    <a href="#">Terms & Conditions</a>
                  </li>
                  <li>
                    <a href="#">Privacy Policy </a>
                  </li>
                  {{-- <li>
                    <a href="#">Blog</a>
                  </li> --}}
                  <li>
                    <a href="{{ route('login') }}">Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <hr />
          <div
            class="row d-flex justify-content-center align-items-center text-center"
          >
            <p class="copyright mb-3">
             {{$general->footer }}
            </p>
          </div>
        </div>
      </footer>
