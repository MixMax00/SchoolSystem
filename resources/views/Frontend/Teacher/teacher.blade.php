@extends('Frontend.master')
@section('title')
    Teacher
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
              src="http://localhost/School_Management_System/public/assets/frontend/image/banner/teacher.jpg"
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
    <section class="teacher section_padding">
      <div class="container">
        <div class="row mt-5">
        @forelse (\App\Models\Teacher::where('status',1)->get() as $teacher)
        <div class="col-lg-3 col-sm-6">
            <a href="{{ route('frontend.teacher-details',['id'=>$teacher,'name'=>$teacher->name]) }}">
                <div class="card">
                <div
                    class="image d-flex justify-content-center align-items-center"
                >
                    <img
                    class="img-fluid pt-2"
                    src="{{ asset($teacher->image) }}"
                    alt=""
                    />
                </div>
                <div class="details text-center">
                    <span>{{ $teacher->name }}</span>
                    <p>{{  $teacher->subject }}</p>
                </div>
                </div>
            </a>
          </div>
        @empty
          <h5 class="text-center">Amader Kono Teacher Nai Akhn.</h5>
        @endforelse


          {{-- <div class="col-lg-3 col-sm-6">
            <div class="card">
              <div
                class="image d-flex justify-content-center align-items-center"
              >
                <img
                  class="img-fluid pt-2"
                  src="http://localhost/School_Management_System/public/assets/frontend/image/teacher/1.png"
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
                  src="http://localhost/School_Management_System/public/assets/frontend/image/teacher/1.png"
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
                  src="http://localhost/School_Management_System/public/assets/frontend/image/teacher/1.png"
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
