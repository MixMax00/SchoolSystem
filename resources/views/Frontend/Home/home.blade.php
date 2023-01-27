@extends('Frontend.master')
@section('title')
    Home
@endsection

@php($banners = \App\Models\Banner::where('status','=',1)->get())

@section('content')

    <main>
        <!-- Banner section Start -->
        <section class="banner">
            <div
                id="carouselExampleFade"
                class="carousel slide carousel-fade"
                data-bs-ride="carousel"
            >
                <div class="carousel-inner">
                    @foreach($banners as $banner)
                    <div class="carousel-item @if($loop->first) active @endif bg_img1" data-bs-interval="3000">
                        <img
                            src="{{$banner->image}}"
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
                                            <h1 class="text-uppercase">
                                                 <span>{{$banner->headings}}</span>
                                            </h1>
                                            <p>
                                                {!! $banner->short_description !!}
                                            </p>

                                            <div class="button-primary mt-4">
                                                <a href="{{ route('online-admission.form') }}" class="btn text-uppercase">
                                                    admission on
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev"
                >
              <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
              ></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#carouselExampleFade"
                    data-bs-slide="next"
                >
              <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
              ></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        @php($messages = \App\Models\Quote::where('status','=',1)->take(2)->get())

        <section class="notice section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="warp">
                            <div
                                class="row d-flex align-items-center justify-content-center"
                            >
                                <div class="col-lg-8 col-sm-12">
                                    <div class="section_title">
                                        <div
                                            class="d-flex align-items-center justify-content-center pb-3"
                                        >
                                            <h2 class="me-2">Mess <span style="color:orange">age</span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($messages as $message)
                            <div class="div mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 tex">
                                        <img
                                            class="img img-fluid"
                                            src="{{$message->image}}"
                                            alt="..."
                                        />
                                        {{-- <h4 class="text-center">{{$message->designation}}</h4> --}}
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-justify">
                                            {!! \Illuminate\Support\Str::limit($message->quotes, 320, '...')!!}
                                            <span class="fs-6" data-bs-toggle="modal" data-bs-target="#messageModal-{{ $message->id }}">Read more</span>.

                                        </p>
                                        <div class="d-flex align-items-end justify-content-end">
                                            <div class="text-center">

                                                <h5 class="fs-5">{{$message->name}} </h5>
                                                <h6 class="fs-6">{{$message->designation}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                                <div class="modal fade" id="messageModal-{{ $message->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {!! $message->quotes  !!}
                                    </div>
                                    </div>
                                </div>
                                </div>


                            @endforeach

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div
                            class="row d-flex align-items-center justify-content-center"
                        >
                            <div class="col-lg-8 col-sm-12">
                                <div class="section_title">
                                    <div
                                        class="d-flex align-items-center justify-content-center pb-3"
                                    >
                                        <h2 class="me-2">Notice</h2>
                                        <h3>Board</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php($notices = \App\Models\Notice::where('status','=',1)->orderBy('id','DESC')->paginate(5))
                        @php($count_notice = \App\Models\Notice::count())

                        <div class="div-2">
                            @foreach($notices as $notice)
                            <div class="notice shadow p-2">
                                <p style="size: 15px;">
                                   {{$notice->title}}
                                </p>
                                <div
                                    class="date d-flex justify-content-between align-items-center"
                                >
                                    <a href="#"
                                    ><i class="fas fa-calendar-alt me-2"></i>{{date('d-m-Y', strtotime($notice->created_at))}}</a
                                    >
                                    <a  class="btn download_btn" href="{{route('frontend.notice.download',['id'=>$notice->id])}}">Download</a>
                                </div>
                            </div>

                            @endforeach

                            <div class="button-primary mt-3 text-left">

                                @if ($count_notice >= 5)
                                <a href="" class="btn"> More </a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @php($school_section = \App\Models\SchoolSection::find(1))

        <section class="about section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 shadow">
                        <div class="title">
                            <h3><span>Our </span> School</h3>
                        </div>
                        <div class="para">
                            <p>
                               {!! Str::limit($school_section->short_description, '500','')  !!}
                            </p>
                        </div>

                        <div class="button-primary mt-5 mb-3">
                            <a href="{{ route('frontend.about') }}" class="btn"> More Details </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <img class="img-fluid" src="{{ isset($school_section->title_image) ? asset($school_section->title_image) : '' }}" alt="{{ $school_section->website_name }}" style="width: 100%; height: 400px" />
                    </div>
                </div>
            </div>
        </section>


        @php($events = \App\Models\Event::where('status', 1)->orderBy('id', 'desc')->take(2)->get())
        <section class="event section_padding">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-lg-8 col-sm-12">
                        <div class="section_title">
                            <div
                                class="d-flex align-items-center justify-content-center pb-5">
                                <h2 class="me-2">Upcoming</h2>
                                <h3>Events</h3>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($events as $event)
                <a href="{{ route('frontend.event.details',["id"=>$event->id]) }}">
                    <div class="row shadow mb-4">
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
                </a>
                @endforeach

              {{--   <div class="row mt-3 shadow">
                    <div class="col-lg-6 border_event1" style="padding: unset">
                        <img class="img-fluid" src="{{asset('assets/frontend')}}/image/event/2.png" alt="event" />
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
                <div class="button-primary d-flex justify-content-center mt-5">
                    <a href="{{ route('frontend.event') }}" class="btn text-uppercase"> More events </a>
                </div>
            </div>
        </section>

        @php($teachers = \App\Models\Teacher::where('status', 1)->orderBy('id', 'desc')->take(4)->get())
        <section id="teacher" class="teacher section_padding">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-lg-8 col-sm-12">
                        <div class="section_title">
                            <div class="d-flex lign-items-center justify-content-center">
                                <h2 class="me-2">Our</h2>
                                <h3>Teachers</h3>
                            </div>

                            <p>
                                There are many variations of passages of Lorem Ipsum
                                available, but the majority have suffered alteration in some
                                form, by injected humour, or randomised words which don't
                                look even slightly believable.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    @foreach($teachers as $teacher)

                    <div class="col-lg-3 col-sm-6">
                       <a href="{{ route('frontend.teacher-details',['id'=>$teacher,'name'=>$teacher->name]) }}">
                            <div class="card shadow">
                                <div
                                    class="image d-flex justify-content-center align-items-center"
                                >
                                    <img
                                        class="img-fluid pt-2"
                                        src="{{asset($teacher->image)}}"
                                        alt=""
                                        width="100%"
                                        height="100%"
                                    />
                                </div>
                                <div class="details text-center">
                                    <span>{{ $teacher->name }}</span>
                                    <p>{{ $teacher->subject }}</p>
                                </div>
                            </div>
                       </a>
                    </div>

                    @endforeach
                    {{-- <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div
                                class="image d-flex justify-content-center align-items-center"
                            >
                                <img
                                    class="img-fluid pt-2"
                                    src="{{asset('assets/frontend')}}/image/teacher/1.png"
                                    alt=""
                                />
                            </div>
                            <div class="details text-center">
                                <span>Aliean Perkinson</span>
                                <p>English Teacher</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div
                                class="image d-flex justify-content-center align-items-center"
                            >
                                <img
                                    class="img-fluid pt-2"
                                    src="{{asset('assets/frontend')}}/image/teacher/1.png"
                                    alt=""
                                />
                            </div>
                            <div class="details text-center">
                                <span>Aliean Perkinson</span>
                                <p>English Teacher</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div
                                class="image d-flex justify-content-center align-items-center"
                            >
                                <img
                                    class="img-fluid pt-2"
                                    src="{{asset('assets/frontend')}}/image/teacher/1.png"
                                    alt=""
                                />
                            </div>
                            <div class="details text-center">
                                <span>Aliean Perkinson</span>
                                <p>English Teacher</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="button-primary d-flex justify-content-center mt-5">
                    <a href="{{ route('frontend.teacher') }}" class="btn text-uppercase"> More </a>
                </div>
            </div>
        </section>


       @php($gallereis = \App\Models\Gallery::where('status', 1)->orderBy('id', 'desc')->take(4)->get())
        <section class="galleries card_show card2 section_padding">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-lg-8 col-sm-12">
                        <div class="section_title">
                            <div class="d-flex align-items-center justify-content-center">
                                <h2 class="me-2">Our</h2>
                                <h3>Galleries</h3>
                            </div>

                            <p class="mb-5">
                                There are many variations of passages of Lorem Ipsum
                                available, but the majority have suffered alteration in some
                                form, by injected humour, or randomised words which don't
                                look even slightly believable.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <!-- Single Team -->

                    @foreach($gallereis as $gallery)
                    <div class="col-md-4 col-xl-4 col-sm-6">
                        <div class="card shadow">
                            <div class="member-img">
                                <img src="{{ isset($gallery->title_image) ? asset($gallery->title_image) : '' }}" alt="Team Member Image"  style="height: 350px" />
                            </div>
                            <div class="member-content">
                                <!-- Member Name and text -->
                                <div class="member-text">
                                      <span class="card_detail">{{ $gallery->title }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    <!-- Single Team -->
                   {{--  <div class="col-md-4 col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="member-img">
                                <img src="{{asset('assets/frontend')}}/image/banner/g2.png" alt="Team Member Image" />
                            </div>
                            <div class="member-content">
                                <!-- Member Name and text -->
                                <div class="member-text">
                      <span class="card_detail"
                      >Pohela boishak dance Daps school program</span
                      >
                                </div>
                            </div>
                        </div>
                    </div>
                    Single Team
                    <div class="col-md-4 col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="member-img">
                                <img src="{{asset('assets/frontend')}}/image/banner/g3.png" alt="Team Member Image" />
                            </div>
                            <div class="member-content">
                                <!-- Member Name and text -->
                                <div class="member-text">
                      <span class="card_detail"
                      >Pohela boishak dance Daps school program</span
                      >
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="button-primary d-flex justify-content-center mt-5">
                    <a href="{{ route('frontend.gallery') }}" class="btn text-uppercase"> More </a>
                </div>
            </div>
        </section>

        <!-- Banner section End -->
    </main>
@endsection
