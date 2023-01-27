@extends('Frontend.master')


@section('title')
    Teacher | {{ $teacher_detail->name  }}
@endsection

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
                          <h3 class="text-uppercase">teachers details</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- <section class="banner home-banner section_padding">
          <div class="container">
            <div class="row">
              <div class="d-flex justify-content-center align-items-center">
                <div class="col-lg-7 col-sm-12 text-center">
                  <h3 class="text-uppercase">teachers details</h3>
                </div>
              </div>
            </div>
          </div>
        </section> -->

        <section class="about section_padding">
          <div class="container">
            <div class="row">
              <div
                class="col-lg-6 col-sm-12 d-flex justify-content-center align-items-center mb-3"
              >
                <div class="shadow p-1" style="background-color: orange">
                  <img class="" src="{{ asset($teacher_detail->image) }}" alt="" width="100%" height="320px"/>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                <div class="title shadow p-3">
                  <h3>
                    <span class="text-uppercase">{{ $teacher_detail->name }}</span>
                  </h3>
                  <span class="blue">{{ $teacher_detail->subject }}</span>
                  <div class="div mt-3 mb-3">
                    <span class="mb-4">Date of Birth: 19 04 1987</span><br />
                    <span class="mb-4">Education:{{ $teacher_detail->qualification }}</span><br />
                    <span class="mb-4">Designation: {{  $teacher_detail->designation }}</span><br />
                    <span class="mb-4">Qualification: {{ $teacher_detail->qualification }}</span><br />

                  </div>
                {{--   <span>Phone : +880 123 456 789</span><br />
                  <span>Email : jereen123@gmail.com</span><br />
                </div> --}}

                <div class="social_icon">
                  <ul class="d-flex">
                    <h6 class="sicon me-3 mt-2">Follow Us on</h6>
                    <li>
                      <a href="#">
                        <i
                          style="
                            background: #3c599b;
                            padding: 0.3rem 0.5rem;
                            border-radius: 50%;
                            font-size: 10px;
                            color: #fff;
                          "
                          class="fab fa-facebook-f"
                        ></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i
                          style="
                            background: #5eaade;
                            padding: 0.4rem 0.5rem;
                            border-radius: 50%;
                            font-size: 10px;
                            color: #fff;
                          "
                          class="fab fa-twitter"
                        ></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i
                          style="
                            background: #107ab6;
                            padding: 0.4rem 0.5rem;
                            border-radius: 50%;
                            font-size: 10px;
                            color: #fff;
                          "
                          class="fab fa-linkedin-in"
                        ></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i
                          style="
                            background: #e80909;
                            padding: 0.3rem 0.5rem;
                            border-radius: 50%;
                            font-size: 10px;
                            color: #fff;
                          "
                          class="fab fa-instagram"
                        ></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="teacher section_padding">
          <div class="container">
            <div class="row mt-5 jutify-items-center">
                @foreach (\App\Models\Teacher::where('status',1)->get() as $other_teacher)
                    @if ($other_teacher->id == $teacher_detail->id)

                    @else
                    <div class="col-lg-3 col-sm-6">
                        <a href="{{ route('frontend.teacher-details',['id'=>$other_teacher->id,'name'=>$other_teacher->name]) }}">
                            <div class="card shadow">
                            <div
                                class="image d-flex justify-content-center align-items-center"
                            >
                                <img
                                class="img-fluid pt-2"
                                src="{{ asset($other_teacher->image) }}"
                                alt=""
                                />
                            </div>
                            <div class="details text-center">
                                <span>{{$other_teacher->name }}</span>
                                <p>{{$other_teacher->subject }}</p>
                            </div>
                            </div>
                        </a>
                    </div>
                    @endif
                @endforeach


              {{-- <div class="col-lg-3 col-sm-6">
                <div class="card">
                  <div
                    class="image d-flex justify-content-center align-items-center"
                  >
                    <img
                      class="img-fluid pt-2"
                      src="{{ asset('assets/frontend') }}/image/teacher/1.png"
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
                      src="{{ asset('assets/frontend') }}/image/teacher/1.png"
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
                      src="{{ asset('assets/frontend') }}/image/teacher/1.png"
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
          </div>
        </section>

        <!-- Banner section End -->
    </main>
@endsection
