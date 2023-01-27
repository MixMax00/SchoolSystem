
@extends('Backend.Admin.master')
@section('title')
    School Details
@endsection

@php($school = \App\Models\SchoolSection::find(1))
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>@yield('title')</h3>
        <ul>
            <li>
                <a href="{{route('admin.dashboard')}}">Home</a>
            </li>
            <li>@yield('title')</li>
        </ul>
    </div>

    <!-- Breadcubs Area End Here -->
    <div class="card">
        <form action="{{route('admin.frontend.school.save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                    <label class="control-label" for="app_name">School Name</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Enter school name"
                        id="app_name"
                        name="school_name"
                        value="{{$school->school_name}}"
                    />
                </div>

                <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                    <label>Short Description</label>
                    <textarea
                        class="form-control"
                        type="text"
                        placeholder="Enter short description"
                        id="editor"
                        name="short_description"
                        value=""
                    >{!! $school->short_description !!}</textarea>
                </div>
                <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                    <label>Top Description</label>
                    <textarea
                        class="form-control"
                        type="text"
                        placeholder="Enter top description"
                        id="editor1"
                        name="top_description"
                        value=""
                    >{!! $school->top_description !!}</textarea>
                </div>
                <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                    <label>Bottom Description</label>
                    <textarea
                        class="form-control"
                        type="text"
                        placeholder="Enter bottom description"
                        id="editor2"
                        name="bottom_description"
                        value=""
                    >{!! $school->bottom_description !!}</textarea>
                </div>

                <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                    <div class="row">
                        <div class="col-4-xxxl col-xl-6 col-lg-6 col-12 form-group">
                            <div class="image-upload">
                                <div class="thumb">
                                    <div class="avatar-preview">
                                        <div class="row">
                                            <div class="col-4-xxxl col-xl-6 col-lg-6 col-12 form-group">

                                                @if (!empty($school->title_image))
                                                    <img class="img-thumbnail"
                                                         src="{{asset($school->title_image)}}"
                                                         id="logo" style="width: 200px; height: 200px;">
                                                @else
                                                    <img src="{{ asset('assets/backend/img/default.jpg')}}" id="logo" style="width: 200px; height: 200px;">
                                                @endif
                                                <div class="avatar-edit">
                                                    <input type="file" class="profilePicUpload" id="profilePicUpload1"  name="title_image" onchange="loadFile(event,'logo')">
                                                    <label for="profilePicUpload1" class="bg-success text-light">@lang('Title Image') </label>
    {{--                                                <span class="font-weight-bold text-danger small">Size should be 512 X 512 </span>--}}
                                                </div>
                                            </div>
                                            <div class="col-4-xxxl col-xl-6 col-lg-6 col-12 form-group">
                                                @if (!empty($school->middle_image))
                                                    <img class="img-thumbnail"
                                                         src="{{asset($school->middle_image)}}"
                                                         id="favicon" style="width: 200px; height: 200px;">
                                                @else
                                                    <img src="{{ asset('assets/backend/img/default.jpg')}}" id="favicon" style="width: 200px; height: 200px;">
                                                @endif
                                                <div class="avatar-edit">
                                                    <input type="file" class="profilePicUpload" id="profilePicUpload2"  name="middle_image" onchange="loadFile(event,'favicon')">
                                                    <label for="profilePicUpload2" class="bg-success text-light">@lang('Middle Image') </label>
    {{--                                                <span class="font-weight-bold text-danger small ">Size should be 80 X 80 </span>--}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-4-xxxl col-xl-2 col-lg-3 col-12 form-group">
                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">Save Changes</button>
                </div>
            </div>
        </form>
    </div>

@endsection



@section('js')
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'editor' );
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
    </script>
    <script>
        loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
