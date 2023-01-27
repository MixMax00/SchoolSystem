@extends('Backend.Admin.master')

@section('title')
   Inventory Report
@endsection

@php
    $total_payment = \Illuminate\Support\Facades\DB::table('supplier_invoices')->sum('payment');
    $lost_product = \Illuminate\Support\Facades\DB::table('lost_inventories')->sum('qty');
    $total_price = \Illuminate\Support\Facades\DB::table('inventories')->sum('total_price');
    $total_quantity = \Illuminate\Support\Facades\DB::table('inventories')->sum('total_quantity');
    $store_quantity = \Illuminate\Support\Facades\DB::table('inventories')->sum('quantity');

@endphp
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>@yield('title')</h3>
        <ul>
            <li>
                <a href="{{route('admin.dashboard')}}">Home</a>
            </li>
            <li>@yield('title')</li>
        </ul>
    </div>

    <!-- Breadcubs Area End Here -->
    <div class="card">
        <div class="card-header">
           Inventory Report

        </div>
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="card bg-warning shadow border p-1">
                        <div class="card-body">
                            <h3>Total Price</h3>
                            <p>{{ number_format($total_price) }} Tk.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning shadow border p-1">
                        <div class="card-body">
                            <h3>Payment Price</h3>
                            <p>{{ number_format($total_payment) }} TK.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning shadow border p-1">
                        <div class="card-body">
                            <h3>Due Price</h3>
                            <p>{{ number_format($total_price - $total_payment) }} TK.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="card bg-warning shadow border p-1">
                        <div class="card-body">
                            <h3>Total Product</h3>
                            <p>Item: {{ number_format($total_quantity) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning shadow border p-1">
                        <div class="card-body">
                            <h3>Store Product</h3>
                            <p>Item: {{ number_format($store_quantity) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning shadow border p-1">
                        <div class="card-body">
                            <h3>Other Product</h3>
                            <p>Item: {{ number_format($total_quantity - $store_quantity) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning shadow border p-1">
                        <div class="card-body">
                            <h3>Lost Product</h3>
                            <p>Item:  {{ $lost_product }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection



@section('js')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function (){

            $(document).on('click', '.delete_btn', function (e){
                e.preventDefault();
                let emp_id = $(this).val();



                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if(result){
                        if (result.isConfirmed) {
                            $.ajax({
                                type:"GET",
                                url:"delete/inventory-supplier/"+emp_id,
                                success:function (response){
                                    if(response.status == 200) {
                                        window.location.reload()
                                    }
                                }
                            })
                        }
                    }
                })


            });



        })
    </script>



@endsection
