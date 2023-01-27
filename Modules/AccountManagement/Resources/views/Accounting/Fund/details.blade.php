@extends('Backend.admin.master')

@section('title')
    Current Balance {{$current_balance}}
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


            <div class="row">
                <div class="col-xl-12 col-lg-12 col-12">
                    <table class="table table-bordered">
                        <tr>
                            <td>#</td>
                            <td>Date and Time</td>
                            <td>From</td>
                            <td>To</td>
                            <td>(Debit)</td>
                            <td>(Credit)</td>
                            <td>Balance</td>
                        </tr>
                        @foreach($funds as $fund)
                        <tr>
                            <td>{{$fund->id}}</td>
                            <td>{{$fund->created_at}}</td>
                            <td>{{$fund->fundFrom->account_name}}</td>
                            <td>{{$fund->fundTo->account_name}}</td>
                            <td>{{$fund->cr}}</td>
                            <td>{{$fund->dr}}</td>
                            <td>{{$fund->balance}}</td>
                        </tr>
                        @endforeach

                    </table>
                </div>

            </div>

        </div>
    </div>





@endsection
