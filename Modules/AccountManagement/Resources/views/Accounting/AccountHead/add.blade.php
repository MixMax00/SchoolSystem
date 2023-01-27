@extends('Backend.admin.master')

@section('title')
    Add Sub Head
@endsection

@section('content')

    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>@yield('title')</h3>
        <ul>
            <li>
                <a href="{{ route('admin.dashboard')  }}">Home</a>
            </li>
            <li>@yield('title')</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Dashboard summery Start Here -->

    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>@yield('title')</h3>
                </div>
            </div>

            <form action="{{route('admin.accountmanagement.head.store')}}" method="post" class="new-added-form">
                @csrf
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Head <span class="text-danger">*</span></label>
                        <input type="text" name="head" placeholder="Head" class="form-control">
                        <input type="hidden" name="head_id" placeholder="Head" value="{{$head->id}}" class="form-control">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Main Head <span class="text-danger">*</span></label>
                        <input type="text" name="main_head" readonly value="{{$head->main_head}}" placeholder="" class="form-control">
                    </div>
{{--                    <div class="col-xl-4 col-lg-6 col-12 form-group">--}}
{{--                        <label>Applicable <span class="text-danger">*</span></label>--}}
{{--                        <input type="text" name="applicable" placeholder="" class="form-control">--}}
{{--                    </div>--}}
                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                        <label>Details </label>
                       <textarea name="details" class="form-control"></textarea>
                    </div>
{{--                    <div class="col-xl-3 col-lg-6 col-12 form-group">--}}
{{--                        <label>Class *</label>--}}
{{--                        <select class="select2">--}}
{{--                            <option value="">Please Select Class *</option>--}}
{{--                            <option value="1">Play</option>--}}
{{--                            <option value="2">Nursery</option>--}}
{{--                            <option value="3">One</option>--}}
{{--                            <option value="3">Two</option>--}}
{{--                            <option value="3">Three</option>--}}
{{--                            <option value="3">Four</option>--}}
{{--                            <option value="3">Five</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="form-group col-12">
                        <div class="form-check">
                            <input type="checkbox" name="isActive" value="1" class="form-check-input"
                                   id="remember-me">
                            <label for="remember-me" class="form-check-label">Active</label>
                        </div>
                    </div>

                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
