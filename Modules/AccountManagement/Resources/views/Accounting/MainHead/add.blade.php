@extends('Backend.admin.master')

@section('title')
    Add Main Head
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

            <form class="new-added-form" action="{{ route('admin.accountmanagement.mainhead.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                        <label>Main Head<span class="text-danger">*</span></label>
                        <input type="text" name="main_head" placeholder="Main Head" class="form-control" required>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                        <label>Head Type<span class="text-danger">*</span></label>
                        <select class="form-control" name="head_type" required>
                            <option value="deposit">Deposit</option>
                            <option value="expense">Expense</option>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <div class="form-check">
                            <input type="checkbox" name="status" value="{{true}}"  class="form-check-input"
                                   id="remember-me" required>
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
