@extends('accountmanagement::Accounting.master')

@section('title')
   Accounting Dashborad
@endsection




@section('content')

    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>{{ auth()->user()->name  }} Dashboard</h3>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>{{ auth()->user()->name  }}</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Dashboard summery Start Here -->





@endsection
