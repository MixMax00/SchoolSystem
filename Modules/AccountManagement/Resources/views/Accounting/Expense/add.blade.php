@extends('Backend.admin.master')

@section('title')
    Expense
@endsection



@php($main_heads = \App\Models\MainHead::where('code', 'expense')->get())
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

            <form action="{{ route('admin.accountmanagement.expense.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Date of Expense<span class="text-danger">*</span></label>
                        <input type="date" name="date_of_expense" placeholder="" class="form-control" required>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label> Head <span class="text-danger"> *</span></label>
                        <select name="sub_head_id" id="headId" class="form-control" id="mainId">
                                <option>Please select</option>
                                @foreach($main_heads as $main_head)
                                    @php( $table_name = strtolower(str_replace(' ', '', $main_head->main_head)))
                                    @php( $sub_heads = DB::table($table_name)->where('main_head_id',$main_head->id)->get())
                                    @foreach($sub_heads as $head)
                                        <option value="{{ $head->code ?? '' }}">{{ $head->head_name ?? '' }}</option>
                                    @endforeach
                                @endforeach
                        </select>
                    </div>



                    <div class="col-xl-4 col-lg-4 col-12 form-group rowHide">
                        <label> Receiver <span class="text-danger">*</span></label>
                        <input type="text" name="receiver" id="reciverId" placeholder="" class="form-control">
{{--                        <select name="receiver" id="" class="form-control">--}}
{{--                            @foreach((\App\Models\Member::where('status',1)->get()) as $member)--}}
{{--                            <option value="{{$member->id}}">{{$member->name}}</option>--}}
{{--                                @endforeach--}}
{{--                        </select>--}}


                    </div>

                    <div class="col-xl-4 col-lg-4 col-12 form-group teaherRowHide">
                        <label> Receiver <span class="text-danger">*</span></label>
                       <select name="receiver" id="teacherInfo" class="form-control">

                      </select>
                    </div>


{{--                    @php($voucher_no = \Illuminate\Support\Carbon::now())--}}
{{--                    @php($voucher_format = "ACC-EX".str_replace(':','',$voucher_no->format('H:i:s')))--}}
                    <div class="col-xl-4 col-lg-4 col-12 form-group mt-4">
                        <label>Voucher No</label>
                        <input type="text" name="voucher_no" value="" placeholder="" class="form-control">
                    </div>

                    <div class="col-xl-8 col-lg-8 col-12 form-group">

                        <table  class="table table-bordered text-center" >
                           <div class="thead">
                               <th width="400px;">Particular</th>
                               <th>Amount</th>

                           </div>
                            <tr>
                               <td colspan="3">
                                   <table class="addTr p-0 m-0" style="margin-bottom: 0px !important; padding-bottom: 0px !important;">
                                       <tr>
                                           <td width="390px;">
                                               <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                   <input type="text" name="particuler_name[]" id="particuler" placeholder="" class="form-control" required>
                                                   <p id="partError" style="color: orangered"></p>
                                               </div>
                                           </td>
                                           <td colspan="">
                                               <div class="row">
                                                   <div class="col-xl-8 col-lg-8 col-12 form-group">
                                                       <input type="number" name="ammout[]"  placeholder="" class="form-control amount" required>
                                                       <p id="amountError" style="color: orangered"></p>
                                                   </div>
                                                   <div class="col-xl-4 col-lg-4 col-12 form-group mt-3">
                                                       <input type="button" class="btn btn-danger" id="remove" value="Delete"/>
                                                   </div>
                                               </div>
                                           </td>
                                       </tr>

                                   </table>
                               </td>
                            </tr>
                            <tr>
                                <td></td>
                               <td colspan="2">
                                   <div class="row">
                                       <div class="col-xl-4 col-lg-4 col-12">
                                           <label class="mt-3">Total <span class="text-danger"> *</span></label>
                                       </div>
                                       <div class="col-xl-5 col-lg-5 col-12">
                                           <input type="text" name="total_amount" id="totalAmount" placeholder="0" class="form-control text-right mb-sm-2" required readonly>
                                       </div>

                                       <div class="col-xl-3 col-lg-3 col-12 mt-3">
                                           <button type="button" id="add" class="btn btn-warning p-2  mt-sm-2">Add</button>
                                       </div>
                                   </div>
                               </td>
                            </tr>

                        </table>

                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-5">
                        <label>Funds <span class="text-danger">*</span></label>
                        <select name="fund_id" class="form-control">
                            @foreach($fund_lists as $fund)
                                <option {{ $fund->isDefault == 1 ? "selected" : "" }} value="{{ $fund->id  }}">{{ $fund->account_name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-5">
                        <label>Attach the file<span class="text-danger"></span></label>
                        <input type="file" name="attach" class="form-control" placeholder="if there, Like:Photo, Receipts," aria-label="Username" aria-describedby="basic-addon1">
                    </div>



                    <div class="col-xl-4 col-lg-6 col-12 form-group" style="margin-top: 5px;">
                        <label>Payment Note:<span>(Please include all bank check / card / transfer details etc)</span></label>
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

    <script src="sweetalert2.min.js"></script>
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


        const origTotal = Number($('#totalAmount').val());

        var rowIdx = 1;
        $(document).on('click','#add', function(){
            let particuler = $("#particuler").val();

            let amount = $(".amount").val();

            if(particuler && amount){

                $('.addTr').append(`<tr>
                                <td  width="390px;">
                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                        <input type="text" name="particuler_name[]" placeholder="" class="form-control" required>
                                    </div>
                                </td>
                                <td>
                                   <div class="row">
                                         <div class="col-xl-8 col-lg-8 col-812orm-group">
                                            <input type="number" name="ammout[]"  placeholder="" class="form-control amount" required>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-12 form-group mt-3">
                                               <input type="button" class="btn btn-danger" id="remove" value="Delete"/>
                                         </div>
                                    </div>
                                </td>

                                </tr>`);

            }else{


                $("#partError").text('Details Select');
                $("#amountError").text('Fill the amount');

            }

        });



        $('.addTr').on('input', '.amount', function() {
            const amountSum = [...$('.amount')]
                .map(input => Number(input.value))
                .reduce((a, b) => a + b, 0);
            $('#totalAmount').val(origTotal + amountSum)
        })

        $(document).on('click','#remove', function(){

            // $('.addTr tr:last').remove();
            $(this).closest('tr').remove();
            const amountSum = [...$('.amount')]
                .map(input => Number(input.value))
                .reduce((a, b) => a + b, 0);
            $('#totalAmount').val(origTotal + amountSum);


            rowIdx--;
        });


    </script>



<script>
    $(document).ready(function(){
        $(".teaherRowHide").hide();
        $("#headId").change(function(){
           var teacherCode = $(this).val();

           if(teacherCode == "5.1"){
                $(".rowHide").hide();
                $(".teaherRowHide").show();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.accountmanagement.teacher.getallteacher') }}",
                    data: 'data',
                    success: function (data) {
                            // alert(data);
                       $("#teacherInfo").html(data);

                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
           }else{
                $(".rowHide").show();
                $(".teaherRowHide").hide();
           }
        });
    });

</script>



@endsection
