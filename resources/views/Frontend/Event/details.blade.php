@extends('Frontend.master')

@section('title')
    Event Details
@endsection
@section('content')
<main>
    <section class="Event-details section_padding">
      <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
          <div class="col-lg-8 col-sm-12">
            <div class="section_title">
              <div
                class="d-flex align-items-center justify-content-center pb-5"
              >
                <h3>Event</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
        <div>
            <h4 class="text-center">{{ $event_details->title }}</h4>
            <h6 class="text-center fs-6">{{ \Carbon\Carbon::parse($event_details->event_date)->format('d-M-Y') }} {{ \Carbon\Carbon::parse($event_details->event_date)->format('l')}}</h6>
        </div>
        <div class="para">
            <p>{!! $event_details->details !!}</p>
        </div>
        </div>
        <div
          class="row d-flex justify-content-center align-items-center pt-3 pb-3"
        >
          <div class="col-lg-7 col-md-7 col-sm-12">
            <img class="img-fluid" src="{{ asset($event_details->image) }}" alt="" />
          </div>
        </div>

      </div>
    </section>
  </main>
@endsection
