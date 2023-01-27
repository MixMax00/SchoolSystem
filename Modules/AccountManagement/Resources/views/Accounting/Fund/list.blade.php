@extends('Backend.admin.master')

@section('title')
    Fund List
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

                <div class="dropdown">
                    <a href="{{route('admin.accountmanagement.fund.add')}}" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Add Fund</a>
                </div>

            </div>
            {{--            <form class="mg-b-20">--}}
            {{--                <div class="row gutters-8">--}}
            {{--                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">--}}
            {{--                        <input type="text" placeholder="Search by Roll ..." class="form-control">--}}
            {{--                    </div>--}}
            {{--                    <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">--}}
            {{--                        <input type="text" placeholder="Search by Name ..." class="form-control">--}}
            {{--                    </div>--}}
            {{--                    <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">--}}
            {{--                        <input type="text" placeholder="Search by Class ..." class="form-control">--}}
            {{--                    </div>--}}
            {{--                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">--}}
            {{--                        <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </form>--}}
            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkAll">
                                <label class="form-check-label">Sl</label>
                            </div>
                        </th>
                        <th>Account Name</th>
                        <th>Description</th>
                        <th>Account Balance</th>
                        <th>Set Default</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @php($total = 0)
                    @foreach($funds as $fund)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input">
                                <label class="form-check-label">{{$i++}}</label>
                            </div>
                        </td>
                        <td>{{$fund->account_name}}</td>
                        <td>{{\Illuminate\Support\Str::limit($fund->description,50,$end="...")}}</td>
                        <td>{{ $tb = $fund->account_balance}}</td>
                        <td>@if( $fund->isDefault == 1 )
                                <a href="#" class="btn-lg btn-success text-white">Default</a>
                            @else
                                <a href="#" class="btn-lg btn-danger">Not Default</a>
                                @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <span class="flaticon-more-button-of-three-dots"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button type="button" class="btn btn-warning pl-2 ml-2" data-toggle="modal" data-target="#transper_{{ $fund->id }}">
                                        <i class="fa fa-rocket pr-2" aria-hidden="true"></i> Transfer
                                    </button>

                                    <a href="{{ route('admin.accountmanagement.fund.details', ["id"=>$fund->id ])  }}" class="btn btn-warning pl-3" >
                                        <i class="fa fa-eye pr-2" aria-hidden="true"></i> View
                                    </a>

                                </div>



                                <div class="modal sign-up-modal fade" id="transper_{{ $fund->id }}" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="close-btn btn-hover-bluedark">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header bg-blue text-white">Fund Transfer</div>
                                                    <div class="card-body">
                                                        <form action="{{route('admin.accountmanagement.fund.transfer')}}" method="post" class="login-form">
                                                            @csrf
                                                            <div class="row gutters-15">
                                                                <div class="form-group col-12">
                                                                    <label for="">Transfer From</label>
                                                                    <input type="text" name="" placeholder="" value="{{$fund->account_name}}" readonly class="form-control">
                                                                    <input type="hidden" name="transfer_from" placeholder="" value="{{$fund->id}}"  class="form-control">
                                                                </div>
                                                                <div class="form-group col-12">
                                                                    <label for="">Transfer To</label>
                                                                    <select name="transfer_to" id="" class="form-control">
                                                                        @foreach($funds as $f)
                                                                            @if($f->id != $fund->id)
                                                                                <option value="{{$f->id}}">{{$f->account_name}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-12">
                                                                    <label for="">Transfer Amount</label>
                                                                    <input type="number" placeholder="" name="transfer_amount" class="form-control">
                                                                </div>

                                                                <div class="form-group col-12">
                                                                    <button type="submit" class="btn-lg btn-success">Transfer</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                        <?php $total =  $total + $tb ?>
                    @endforeach
                    <tr>
                        <td colspan="2"></td>
                        <td>Total Tk</td>
                        <td>{{ $total }}</td>
                        <td></td>
                        <td></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection
