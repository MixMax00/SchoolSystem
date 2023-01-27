@extends('Frontend.master')
@php($galleries = \App\Models\Gallery::where('status', 1)->orderBy('id', 'DESC')->get())

@section('title')
    Gallery
@endsection
@section('content')

    <main>

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
                                Some Images of our institutions
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <!-- Single Team -->
                    @foreach ($galleries as $gallery)
                        <div class="col-md-4 col-xl-4 col-sm-6">
                            <div class="card">
                                <a href="{{ route('frontend.gallery.details',["id"=>$gallery->id]) }}">
                                <div class="member-img">
                                    <img src="{{ isset($gallery->title_image) ? asset($gallery->title_image) : ' ' }}" height="350px" alt="Team Member Image" />
                                </div>
                                <div class="member-content">
                                    <!-- Member Name and text -->

                                    <div class="member-text">
                                        <span class="card_detail" style="font-size:20px;"
                                        >{{ $gallery->title }}</span
                                        >
                                    </div>

                                </div>
                                    </a>
                            </div>
                        </div>
                    @endforeach
                    <!-- Single Team -->
                </div>
                <!--<div class="button-primary d-flex justify-content-center mt-5">-->
                <!--    <a href="#" class="btn text-uppercase"> More </a>-->
                <!--</div>-->
            </div>
        </section>

    <!-- Banner section End -->
  </main>

@endsection
