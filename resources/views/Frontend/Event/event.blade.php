@extends('Frontend.master')
@section('title')
    Event
@endsection

@section('content')

<main>


       @php($events = \App\Models\Event::where('status', 1)->orderBy('id', 'desc')->paginate(5))
        <!-- Banner section Start -->
        <section class="banner">
          <div
            id="carouselExampleFade"
            class="carousel slide carousel-fade"
            data-bs-ride="carousel"
          >
            <div class="carousel-inner">
              <div class="carousel-item active bg_img1">
                <img
                  src="{{ asset('assets/frontend') }}/image/banner/teacher.jpg"
                  class="d-block w-100"
                  alt="..."
                />
                <div class="container">
                  <div class="row">
                    <div
                      class="d-flex justify-content-center align-items-center"
                    >
                      <div class="col-lg-6 col-sm-12 text-center">
                        <div class="carousel-caption d-md-block">
                          <h3 class="text-uppercase">Event</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="event section_padding">
          <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
              <div class="col-lg-8 col-sm-12">
                <div class="section_title">
                  <div
                    class="d-flex align-items-center justify-content-center pb-5"
                  >
                    <h3>Events</h3>
                  </div>
                </div>
              </div>
            </div>

            @foreach($events as $event)
            <div class="row shadow mt-4">
              <div class="col-lg-6 border_event1" style="padding: unset">
                <img class="img-fluid" src="{{ isset($event->image) ? asset($event->image) : '' }}" alt="event" />
              </div>
              <div class="col-lg-6 d-flex align-items-center border_event2">
                <div class="div ps-3">
                  <div class="head">
                    <h2>{{ \Carbon\Carbon::parse($event->event_date)->format('d-M-Y') }} {{ \Carbon\Carbon::parse($event->event_date)->format('l')}}</h2>
                  </div>
                  <div class="title">
                    <h3>{{ $event->title }}</h3>
                  </div>
                  <div class="para">
                    {!! Str::limit($event->details, '250', '') !!}
                  </div>
                </div>
              </div>
            </div>
            @endforeach
         {{--    <div class="row mt-4 shadow">
              <div class="col-lg-6 border_event1" style="padding: unset">
                <img class="img-fluid" src="./image/event/2.png" alt="event" />
              </div>
              <div class="col-lg-6 d-flex align-items-center border_event2">
                <div class="div ps-3">
                  <div class="head">
                    <h2>30 November 2022 Munday</h2>
                  </div>
                  <div class="title">
                    <h3>High School Volible Program</h3>
                  </div>
                  <div class="para">
                    There are many variations of passages of Lorem Ipsum
                    available, but the majority have suffered alteration in some
                    form, by injected humour, or randomised words which don't
                    look even slightly believable.
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4 shadow">
              <div class="col-lg-6 border_event1" style="padding: unset">
                <img class="img-fluid" src="./image/event/2.png" alt="event" />
              </div>
              <div class="col-lg-6 d-flex align-items-center border_event2">
                <div class="div ps-3">
                  <div class="head">
                    <h2>30 November 2022 Munday</h2>
                  </div>
                  <div class="title">
                    <h3>High School Volible Program</h3>
                  </div>
                  <div class="para">
                    There are many variations of passages of Lorem Ipsum
                    available, but the majority have suffered alteration in some
                    form, by injected humour, or randomised words which don't
                    look even slightly believable.
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </section>

        <!-- Banner section End -->
      </main>

@endsection
