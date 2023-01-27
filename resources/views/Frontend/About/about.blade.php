@extends('Frontend.master')
@section('title')
    About
@endsection

@section('content')

 <main>
        <!-- Banner section Start -->
        <section class="">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14606.067929546913!2d90.35101526422628!3d23.76459799169127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c09f9ba3d447%3A0x1babce9f1c6c95a3!2sMohammadpur%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1662130657228!5m2!1sen!2sbd"
            width="100%"
            height="400px"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </section>
        @php($about = \App\Models\SchoolSection::find(1))
        <section class="about section_padding">
          <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
              <div class="col-lg-8 col-sm-12">
                <div class="section_title">
                  <div
                    class="d-flex align-items-center justify-content-center pb-5"
                  >
                    <h3>{{ $about->school_name }}</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="para">
                <p>
                 {!! $about->top_description !!}
                </p>
              </div>
            </div>
            <div
              class="row d-flex justify-content-center align-items-center pt-3 pb-3"
            >
              <div class="col-lg-7 col-md-7 col-sm-12">
                <img class="img-fluid" src="{{  isset($about->middle_image) ? asset($about->middle_image) : '' }}" alt="" style="height: 400px" />
              </div>
            </div>
            <div class="row">
              <div class="para">
                <p>
                 {!! $about->bottom_description !!}
                </p>
              </div>
            </div>
          </div>
        </section>

        <!-- Banner section End -->
      </main>

@endsection