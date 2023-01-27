@extends('Frontend.master')

@section('title')
    Gallery Details
@endsection
@section('content')

<main>
    <section class="photo_album section_padding">
      <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
          <div class="col-lg-8 col-sm-12">
            <div class="section_title">
              <div
                class="d-flex align-items-center justify-content-center pb-3"
              >
                <h2 class="me-2">Gallery Details</h2>
                <!--<h3>campus</h3>-->
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <p class="para">

            </p>
          </div>
        </div>

        <div class="row justify-content-center align-items-center g-3 mt-3">
            @foreach ($details_imgs as $details_img)
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="test" data-bs-toggle="modal" data-bs-target="#galleryModal-{{ $details_img->id }}">
                        <img
                            height="250px"
                            width="300px"
                            class="image"
                            src="{{ isset($details_img->gallery_image) ? asset($details_img->gallery_image) : '' }}"
                            alt=""
                            style="cursor: pointer;"
                        />
                    </div>
                </div>

                <!-- Modal -->
                    <div
                    class="modal fade shadow"
                    id="galleryModal-{{ $details_img->id }}"
                    tabindex="-1"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                    >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                            </div>

                            <img
                                class="img-fluid"
                                src="{{ isset($details_img->gallery_image) ? asset($details_img->gallery_image) : '' }}"
                                alt=""
                                width="100%"
                                height="100%"
                            />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </section>
    <!-- Button trigger modal -->


    <!-- Banner section End -->
  </main>

@endsection
