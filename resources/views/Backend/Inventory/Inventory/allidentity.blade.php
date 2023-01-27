@extends('Backend.Admin.master')

@section('title')
   All Identity
@endsection


@section('css')

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
            Identity List
            {{-- @if(auth()->user()->hasPermission('app.roles.create')) --}}
            <a href="{{ route('admin.inventory.identity') }}" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i><span>Add Identity</span></a>
            {{-- @endif --}}
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
                <table id="example" class="table display  text-nowrap">
                    <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkAll">
                                <label class="form-check-label">ID</label>
                            </div>
                        </th>
                      <th>Product Name</th>
                      <th>Identity Name</th>
                      <th>Quantity</th>
                      <th>Date</th>
                      <th>Updated</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($identities as $identity)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $identity->products->name }}</td>
                                <td>{{ $identity->identity_name }}</td>
                                <td>{{ $identity->quantity }}</td>
                                <td>{{ $identity->starting_date }}</td>
                                <td>{{ $identity->updated_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter_{{ $identity->id }}">Damage by</a>

                                    <a href="{{ route('admin.inventory.editidentity', ["id" => $identity->id]) }}" class="btn btn-info"><i class="fas fa-edit text-white"></i></a>
                                    {{-- <button class="btn btn-danger delete_btn" value="{{ $identity->id }}" id="delete" ><i class="fas fa-trash text-white"></i></button> --}}
                                </td>
                            </tr>

                            <div class="modal fade" id="exampleModalCenter_{{ $identity->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Lost Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="" method="post" action="{{ route('admin.inventory.lostProduct') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                  <label for="category_name">Product Name</label>
                                                  <input type="hidden" name="id" class="form-control" value="{{ $identity->id }}">
                                                  <input type="hidden" name="product_id" class="form-control" value="{{ $identity->product_id }}">
                                                  <input type="text" name="product_name" class="form-control" value="{{ $identity->products->name }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Identity</label>
                                                    <input type="text" name="identity_name" value="{{ $identity->identity_name }}" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Price</label>
                                                    <input type="text" name="price" value="{{ $identity->price }}" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="qty">Quantity</label>
                                                    <input type="text" name="qty" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-warning w-100" value="Lost Product">
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



        });


        $(document).ready(function () {
            $('#example').DataTable(
                {
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
        });


    </script>



@endsection
