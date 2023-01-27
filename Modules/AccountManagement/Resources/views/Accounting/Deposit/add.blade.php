@extends('Backend.admin.master')

@section('title')
    Deposit
@endsection
@php($main_heads = \App\Models\MainHead::where('code', 'deposit')->get())
@php($fund_lists = \App\Models\Fund::all())
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

            <form class="new-added-form" action="{{ route('admin.accountmanagement.deposit.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Date of Deposit<span class="text-danger">*</span></label>
                        <input type="date" name="date_of_deposit" placeholder=""  class="form-control" required>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Head <span class="text-danger"> *</span></label>
                        <select name="sub_head_id" class="form-control" id="mainId">
                            <option>Please select</option>

                            @foreach($main_heads as $main_head)
                                @php( $table_name = strtolower(str_replace(' ', '', $main_head->main_head)))
                                @php( $sub_heads = DB::table($table_name)->where('main_head_id',$main_head->id)->get())
                                @foreach($sub_heads as $head)
                                <option value="{{ $head->code }}">{{ $head->head_name }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Giver <span class="text-danger"> *</span></label>
                        <input type="text" name="giver_name" placeholder="" class="form-control" required>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Voucher No</label>
                        <input type="text" name="voucher_no" value="" placeholder="" class="form-control">
                    </div>

                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Particular <span class="text-danger"> *</span></label>
                        <input type="text" name="particular" placeholder="" class="form-control" required>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Amount <span class="text-danger"> *</span></label>
                        <input type="number" name="amount" placeholder="" class="form-control" required>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-12 form-group ">
                        <label>Funds <span class="text-danger">*</span></label>
                        <select name="fund_id" class="form-control">
                            @foreach($fund_lists as $fund)
                                <option {{ $fund->isDefault == 1 ? "selected" : "" }} value="{{ $fund->id  }}">{{ $fund->account_name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-xl-6 col-lg-6 col-12 form-group" style="margin-top: 29px;">
                        <label>Attach the file<span class="text-danger"></span></label>
                        <input type="file" name="attach_file" class="form-control" placeholder="if there, Like:Photo, Receipts," aria-label="Username" aria-describedby="basic-addon1">
                    </div>



                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Payment Note:<span>(Please include all bank check / card / transfer details )</span></label>
                        <textarea name="payment_note" class="form-control"></textarea>

                    </div>

                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>





@endsection


@section('js')


    <script>
        $(document).ready(function(){
            $("#mainId").change(function(){
                let mainHeadId = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.accountmanagement.deposit.getSubHead') }}",
                    data: {
                        main_head_id : mainHeadId,
                    },
                    success: function (data) {
                        $("#subId").html(data);

                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endsection



