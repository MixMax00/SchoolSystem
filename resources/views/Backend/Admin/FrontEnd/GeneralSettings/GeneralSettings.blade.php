@extends('Backend.Admin.master')
@section('title')
    General Settings
@endsection

@php($settings = \App\Models\GeneralSettings::where('school_id', auth()->user()->school_id)->first())

@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>@yield('title')</h3>
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li>@yield('title')</li>
        </ul>
    </div>

    <!-- Breadcubs Area End Here -->
    <div class="row">
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">

                    <form action="{{ route('admin.general_settings.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                            <label class="control-label" for="app_name">Website Name</label>
                            <input class="form-control" type="text" placeholder="Enter Website name" id="app_name"
                                name="website_name" value="{{ $settings->website_name ?? '' }}" />
                        </div>

                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                            <label>School Email</label>
                            <input class="form-control" type="email" placeholder="Enter email" id="footer_text"
                                name="email" value="{{ $settings->email ?? '' }}" />
                        </div>
                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                            <label>School Fax Number</label>
                            <input class="form-control" type="text" placeholder="Enter fax number" id="footer_text"
                                name="fax" value="{{ $settings->fax ?? '' }}" />
                        </div>
                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                            <label>School Phone Number</label>
                            <input class="form-control" type="text" placeholder="Enter phone number" id="footer_text"
                                name="phone" value="{{ $settings->phone ?? '' }}" />
                        </div>
                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                            <label>School Address</label>
                            <input class="form-control" type="text" placeholder="Enter Address " id="footer_text"
                                name="address" value="{{ $settings->address ?? '' }}" />
                        </div>
                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Geo Latitude</label>
                                    <input class="form-control" type="text" placeholder="Enter geo latitude "
                                        id="footer_text" name="latitude" value="{{ $settings->latitude ?? '' }}" />
                                </div>
                                <div class="form-group col-6">
                                    <label>Geo Longitude</label>
                                    <input class="form-control" type="text" placeholder="Enter geo longitude"
                                        id="footer_text" name="longitude" value="{{ $settings->longitude ?? '' }}" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                            <label>Footer Text</label>
                            <input class="form-control" type="text" placeholder="Enter footer text" id="footer_text"
                                name="footer" value="{{ $settings->footer ?? '' }}" />
                        </div>

                        <div class="col-12-xxxl col-lg-12 col-12 form-group">

                            <div class="row">
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="row">
                                                    <div class="col-12-xxxl col-lg-6 col-12 form-group">

                                                        @if (!empty($settings->logo))
                                                            <img class="img-thumbnail" src="{{ asset($settings->logo) }}"
                                                                id="logo" style="width: 200px; height: 200px;">
                                                        @else
                                                            <img src="{{ asset('assets/backend/img/default.jpg') }}"
                                                                id="logo" style="width: 200px; height: 200px;">
                                                        @endif
                                                        <div class="avatar-edit">
                                                            <input type="file" class="profilePicUpload"
                                                                id="profilePicUpload1" name="logo"
                                                                onchange="loadFile(event,'logo')">
                                                            <label for="profilePicUpload1"
                                                                class="bg-success text-light">@lang('Logo') </label>
                                                            <span class="font-weight-bold text-danger small">Size should be 512
                                                                X 512 </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                                        @if (!empty($settings->favicon))
                                                            <img class="img-thumbnail" src="{{ asset($settings->favicon) }}"
                                                                id="favicon" style="width: 200px; height: 200px;">
                                                        @else
                                                            <img src="{{ asset('assets/backend/img/default.jpg') }}"
                                                                id="favicon" style="width: 200px; height: 200px;">
                                                        @endif
                                                        <div class="avatar-edit">
                                                            <input type="file" class="profilePicUpload"
                                                                id="profilePicUpload2" name="favicon"
                                                                onchange="loadFile(event,'favicon')">
                                                            <label for="profilePicUpload2"
                                                                class="bg-success text-light">@lang('Favicon') </label>
                                                            <span class="font-weight-bold text-danger small ">Size should be 80
                                                                X 80 </span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 form-group mg-t-8">
                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('js')
    <script>
        loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
