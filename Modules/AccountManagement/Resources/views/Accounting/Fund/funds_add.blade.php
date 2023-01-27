@extends('Backend.admin.master')

@section('title')
    Add Funds
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

            <form action="{{route('admin.accountmanagement.fund.store')}}" method="post" class="new-added-form">
                @csrf
                    <div class="row">
                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                        <label>Account Name <span class="text-danger">*</span></label>
                        <input type="text" name="account_name" required placeholder="Account Name" class="form-control">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                        <label>Description <span class="text-danger"></span></label>
                        <textarea type="text" name="description" required placeholder="Description" class="form-control"></textarea>
                    </div>
{{--                    <div class="col-xl-12 col-lg-12 col-12 form-group">--}}
{{--                        <label>Account Balance <span class="text-danger">*</span></label>--}}
{{--                        <input type="text" name="account_balance" required placeholder="Account Balance" class="form-control">--}}
{{--                    </div>--}}

{{--                    <div class="form-group col-12">--}}
{{--                        <div class="form-check">--}}
{{--                            <input type="checkbox" value="1" name="isDefault" class="form-check-input"--}}
{{--                                   id="remember-me">--}}
{{--                            <label for="remember-me" class="form-check-label">Set Default</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>

                    </div>
                </div>
            </form>
        </div>
    </div>





@endsection
