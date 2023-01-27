@extends('backend.master')

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

            <form action="{{route('admin.accountmanagement.update')}}" method="post" class="new-added-form">
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Head<span class="text-danger">*</span></label>
                        <input type="text" name="sub_head" value="{{ $edit->head_name }}" placeholder="Head" class="form-control">
                        <input type="hidden" name="sub_head_id" placeholder="Head" value="{{$edit->id}}" class="form-control">
                        <input type="hidden" name="table_name" placeholder="Head" value="{{$table_name}}" class="form-control">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Main Head <span class="text-danger">*</span></label>
                        <input type="text" name="main_head" readonly value="{{$edit->main_head}}" placeholder="" class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Applicable <span class="text-danger">*</span></label>
                        <input type="text" name="applicable" value="{{ $edit->applicable }}" placeholder="" readonly class="form-control">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                        <label>Details </label>
                        <textarea name="details" class="form-control">{{ $edit->details }}</textarea>
                    </div>

                    <div class="form-group col-12">
                        <div class="form-check">
                            <input type="checkbox" name="isActive"  value="1" class="form-check-input"
                                   id="remember-me" {{ $edit->status == 1 ? "checked" : "" }}>
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
