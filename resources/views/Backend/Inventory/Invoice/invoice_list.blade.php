@extends('Backend.Admin.master')

@section('title')
   All Invoice
@endsection



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
            Inovice List

        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-5">
                    <form action="" method="GET" role="search">
                        <div class="input-group mb-3">
                            <input type="search" class="form-control p-3" name="search" value="{{Request::old('search')}}" placeholder="Search">
                            <button class="btn btn-success" type="submit">Go</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-1">
                    <div class="input-group mb-3">
                        <a href="{{ route('admin.inventory.allidentity') }}" class="btn btn-success">Refresh</a>
                    </div>
                </div>
            </div>



            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkAll">
                                <label class="form-check-label">ID</label>
                            </div>
                        </th>
                      <th>Supplier Name</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $invoice->supplier_name }}</td>
                                <td>{{ $invoice->name }}</td>
                                <td>{{ $invoice->price }}</td>
                                <td>{{ $invoice->total_quantity }}</td>
                                <td>{{ $invoice->created_at }}</td>
                                <td>

                                    @php
                                        $due_payment = \App\Models\SupplierInvoice::where('product_id', $invoice->id)->first()
                                    @endphp
                                    @if ($due_payment)

                                        @if ($due_payment->payment == $due_payment->total_price)
                                        @else
                                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#due_payment_{{ $invoice->id }}">Due Payment</a>
                                        <div class="modal fade" id="due_payment_{{ $invoice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Due Payment</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="" method="post" action="{{ route('admin.inventory.duePayment') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h4>Product Info</h4>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <p><strong>Supplier Name:</strong> {{ $invoice->supplier_name }}</p>
                                                                            <p><strong>Product Name:</strong> {{ $invoice->name }}</p>
                                                                            <p><strong>Item:</strong> {{ $invoice->total_quantity }}</p>
                                                                            <p><strong>Price:</strong> {{ $invoice->price }}</p>
                                                                            <p><strong>Total Price:</strong> {{ $invoice->total_price }}</p>
                                                                            <p><strong>Paid:</strong> {{ $due_payment->payment }}</p>
                                                                            <p><strong>Privious Due:</strong> {{ $due_payment->due }}</p>
                                                                            <p class="mb-0"><strong>Payment Date:</strong> {{ $due_payment->created_at }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h4>Payment Info</h4>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="">Total</label>
                                                                                <input type="hidden" name="invoice_id" value="{{ $due_payment->id }}">
                                                                                <input type="text" name="total" value="{{ $invoice->total_price }}" class="form-control" readonly>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Paid</label>
                                                                                <input type="text" name="privious_payment" value="{{ $due_payment->payment }}" class="form-control" readonly>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Inter Payment</label>
                                                                                <input type="text" name="due_payment" class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Payment Type</label>
                                                                                <select name="payment_type" id="" class="form-control">
                                                                                    <option value="cash">Cash</option>
                                                                                    <option value="online">Online</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="submit" value="Add Invoice" class="btn btn-warning">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <a href="{{ route('admin.inventory.invoice.print', ['id'=>$invoice->id]) }}" class="btn btn-info">Print</a>

                                    @else
                                     <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter_{{ $invoice->id }}">Payment</a>
                                    @endif



                                    {{-- <a href="{{ route('admin.inventory.editidentity', ["id" => $identity->id]) }}" class="btn btn-info"><i class="fas fa-edit text-white"></i></a> --}}
                                    {{-- <button class="btn btn-danger delete_btn" value="{{ $identity->id }}" id="delete" ><i class="fas fa-trash text-white"></i></button> --}}
                                </td>
                            </tr>


                            <div class="modal fade" id="exampleModalCenter_{{ $invoice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Payment</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="" method="post" action="{{ route('admin.inventory.payment') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4>Product Info</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <p><strong>Supplier Name:</strong> {{ $invoice->supplier_name }}</p>
                                                                <p><strong>Product Name:</strong> {{ $invoice->name }}</p>
                                                                <p><strong>Item:</strong> {{ $invoice->total_quantity }}</p>
                                                                <p><strong>Price:</strong> {{ $invoice->price }}</p>
                                                                <p><strong>Total Price:</strong> {{ $invoice->total_price }}</p>
                                                                <p class="mb-0"><strong>Date:</strong> {{ $invoice->created_at }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4>Payment Info</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="">Total</label>
                                                                    <input type="hidden" name="product_id" value="{{ $invoice->id }}">
                                                                    <input type="text" name="total" value="{{ $invoice->total_price }}" class="form-control" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Enter Payment</label>
                                                                    <input type="text" name="payment" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Payment Type</label>
                                                                    <select name="payment_type" id="" class="form-control">
                                                                        <option value="cash">Cash</option>
                                                                        <option value="online">Online</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="submit" value="Add Invoice" class="btn btn-warning">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        @endforeach
                    </tbody>
                </table>
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
