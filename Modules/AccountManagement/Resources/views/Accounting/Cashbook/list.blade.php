@extends('Backend.admin.master')
@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.date.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.time.css" />


@endsection
@section('title')
    Cashbook
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
            <div class="row mb-3">
                <div class="col-xl-12 col-lg-12 col-12">

                    <div class="card bg-blue-dark" style="border: 1px solid black">
                        <form action="{{ route('admin.accountmanagement.cashbook.list') }}" method="GET">
                            <div class="d-flex align-items-center justify-content-around mt-5">
                                <button class="btn" id="previous_day" data-diff="-1"><i class="fa fa-arrow-left"></i></button>
                                @php($dt = new DateTime())
                                <input type="text" id="test" class="form-control w-25" name="date" data-value="{{  $toDay ? $toDay :  $prev_date }}">
                                <button class="btn" id="next_day" data-diff="1"><i class="fa fa-arrow-right"></i></button>
{{--                                <button class="btn" type="submit">Submit</button>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12">
                    <h3 class="">Deposit (Cr.)</h3>
                    <table class="table table-bordered">
                        <tr class="font-bold">
                            <td>#</td>
                            <td>Vc No</td>
                            <td>Particular</td>
                            <td>Head</td>
                            <td>Fund</td>
                            <td>Amount<span>(৳)</span></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td></td>
                            <td>Previous Balance <span style="font-size: 10px;">({{$prev_date}})<span></td>
                            <td></td>
                            <td></td>
                            <td>{{ $prev_total_amount }}</td>
                        </tr>

                        @php($total_balance = 0)
                        @foreach($deposit_lists as $deposit_list)
                            <tr style="font-size: 12px;">
                                <td>{{ $loop->index + 2 }}</td>
                                <td>{{ $deposit_list->voucher_no }}</td>
                                <td>{{ $deposit_list->particular }}</td>
                                <td>
{{--                                    @php($main_head = \App\Models\MainHead::where('code', 'deposit')->first())--}}
{{--                                    @php( $table_name = str_replace(' ', '', $main_head->main_head))--}}
{{--                                    {{ DB::table($table_name)->where('code',$deposit_list->sub_head_id)->first()->head_name }}--}}
                                    {{ $deposit_list->sub_head_id }}
                                </td>
                                <td>{{ \App\Models\Fund::find($deposit_list->fund_id)->account_name }}</td>
                                <td>{{ $total = $deposit_list->amount }}</td>
                            </tr>

                            <?php $total_balance = $total_balance + $total; ?>
                        @endforeach


                        <tr>
                            <td colspan="4"></td>
                            <td>Total (Tk.)</td>
                            <td>{{ $total_balance  }}</td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td>Total Expense</td>
                            <td>{{ $total_amount  }}</td>

                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td>Cash (Tk.)</td>
                            <td>{{ $total_balance - $total_amount  }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-xl-6 col-lg-6 col-12">
                    <h3 class="">Expense (Dr.)</h3>
                    <table class="table table-bordered">
                        <tr class="font-bold">
                            <td>#</td>
                            <td>Vc No</td>
                            <td>Particular</td>
                            <td>Head</td>
                            <td>Fund</td>
                            <td>Amount<span>(৳)</span></td>
                        </tr>

                        @php($total_expense =0)
                        @foreach($expense_lists as $expense_list)
                        <tr style="font-size: 12px;">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $expense_list->voucher_no  }}</td>
                            <td>
                                @php($expense_part_lists = \App\Models\ExpensePartculer::where('expense_id', $expense_list->id)->get())
                                @foreach($expense_part_lists as $parti)
                                    <ul>
                                        <li>{{ $parti->particuler_name }}</li>
                                    </ul>
                                @endforeach
                            </td>
                            <td>
{{--                                @php($main_heads = \App\Models\MainHead::where('code', 'expense')->first())--}}
{{--                                @php( $table_name = str_replace(' ', '', $main_heads->main_head))--}}
{{--                                {{ DB::table($table_name)->where('code', $expense_list->sub_head_id)->first()->head_name }}--}}
                                {{ $expense_list->sub_head_id }}
                            </td>
                            <td>{{ \App\Models\Fund::find($expense_list->fund_id)->account_name }}</td>
                            <td>{{ $total_ex = $expense_list->total_amount }}</td>
                        </tr>

                            <?php $total_expense = $total_expense + $total_ex ?>
                        @endforeach

                        <tr>
                            <td colspan="4"></td>
                            <td>Total (Tk.)</td>
                            <td>{{ $total_expense }}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>





@endsection


@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.date.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.time.js"></script>



    <script>

        var picker = $('#test').pickadate({
            format: 'yyyy/mm/dd',

        }).pickadate('picker');


        $('#previous_day').click(function(e) {
            e.preventDefault();
            setDate($(this).data('diff'));


            var url = "{{ route('admin.accountmanagement.cashbook.list') }}";
            window.location.href = url + "?date="+ $("#test").val();

        })

        $('#next_day').click(function(e) {
            e.preventDefault();

            setDate($(this).data('diff'));

            var url = "{{ route('admin.accountmanagement.cashbook.list') }}";
            window.location.href = url + "?date="+ $("#test").val();

        })

        function setDate(diff) {
            var date = new Date(picker.get('select').pick);
            var newDate = date.setDate(date.getDate() + diff);
            picker.set('select', newDate)


        }




    </script>

@endsection
