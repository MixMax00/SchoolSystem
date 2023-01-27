@extends('Backend.Admin.master')

@section('title')
    Accounting Manage
@endsection


@section('content')

    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>@yield('title')</h3>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>@yield('title')</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Dashboard summery Start Here -->



    @role('admin')

    @php

        $sessions = \App\Models\SessionYear::all();
        // $total_fee = DB::table('users')->sum('votes');
    @endphp


    <form class="mg-b-20">
        <div class="row gutters-8">
            <div class="col-3-xxxl col-xl-2 col-lg-2 col-12 form-group pt-3">
                <label for="">Current Session :</label>
            </div>
            <div class="col-3-xxxl col-xl-8 col-lg-6 col-12 form-group">
                <select name="session_year" id="" class="form-control">
                    @foreach ($sessions as $session)
                        <option {{ $loop->last ? "selected" : " " }} value="{{ $session->session }}">{{ $session->session }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-1-xxxl col-xl-2 col-lg-4 col-12 form-group">
                <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
            </div>
        </div>
    </form>


    <div class="row gutters-20">
        <div class="col-xl-6 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-green ">
                            <i class="flaticon-money text-red"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Total Profit</div>
                            <div class="item-number"><span>Tk. </span><span class="counter" data-num="{{ $total_fee - ($total_salery + $total_expanse)}}">{{ $total_fee - ($total_salery + $total_expanse)}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-green ">
                            <i class="flaticon-money text-red"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Total Fee</div>
                            <div class="item-number"><span>Tk. </span><span class="counter" data-num="{{ $total_fee }}">{{ $total_fee }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-blue">
                            <i class="flaticon-money text-red"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Total Expanse</div>
                            <div class="item-number"><span>Tk.</span><span class="counter" data-num="{{ $total_expanse }}">{{ $total_expanse }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-yellow">
                            <i class="flaticon-money text-red"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Total Pay Salery</div>
                            <div class="item-number"><span>Tk. </span><span class="counter" data-num="{{ $total_salery }}">{{ $total_salery }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12">
            <div class="dashboard-summery-one mg-b-20">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="item-icon bg-light-red">
                            <i class="flaticon-money text-red"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="item-content">
                            <div class="item-title">Advance Pay Salery</div>
                            <div class="item-number"><span>TK. </span><span class="counter" data-num="0">0</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endrole


@endsection
