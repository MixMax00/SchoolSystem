@extends('Backend.Admin.master')

@section('title')
    Transport
@endsection

@php
    $transports = \App\Models\Transport::all();
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
            Transport
            @if(auth()->user()->hasPermission('app.exam.create'))
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus mr-2"></i><span>Add Transport</span></a>
            @endif
        </div>
        <div class="card-body">
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
                      <th>Route Name</th>
                      <th>Number of Vehicle</th>
                      <th>Description</th>
                      <th>Route Fare</th>
                      @if(auth()->user()->hasPermission('app.exam.update'))
                      <th>Action</th>
                      @endif
                    </tr>
                    </thead>
                    <tbody>
                   @foreach ($transports as $transport)

                    <tr>
                        <td>
                          {{ $loop->index +1 }}
                        </td>
                        <td>{{ $transport->route_name }}</td>
                        <td>{{ $transport->vehicle_num }}</td>
                        <td>{{ $transport->description }}</td>
                        <td>{{ $transport->route_fare }}</td>
                        <td>

                            @if(auth()->user()->hasPermission('app.roles.update'))
                            <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter_{{ $transport->id }}"><i class="fas fa-edit text-white"></i></a>
                            <a href="" class="btn btn-"><i class="fas fa-arrow-"></i></a>
                              <button class="btn btn-danger delete_btn" value="{{ $transport->id }}" id="delete" ><i class="fas fa-trash text-white"></i></button>
                            @endif

                        <div class="modal fade" id="exampleModalCenter_{{ $transport->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Transport</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="" method="post" action="{{ route('admin.transport.update') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="tradeTitle">Route Name</label>
                                              <input type="hidden" name="id" class="form-control" value="{{ $transport->id }}" >
                                              <input type="text" name="route_name" class="form-control" value="{{ $transport->route_name }}" id="courseTitle">
                                            </div>
                                            <div class="form-group">
                                              <label for="tradeTitle">Number of Vehicle</label>
                                              <input type="text" name="vehicle_num" class="form-control"  value="{{ $transport->vehicle_num }}" id="tradeTitle">
                                            </div>
                                            <div class="form-group">
                                                <label for="tradeTitle">Description</label>
                                                <textarea name="description" class="form-control">{{ $transport->description }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="" >Route Fare</label>
                                                <input type="text" name="route_fare" value="{{ $transport->route_fare }}" class="form-control">
                                            </div>
                                            <div class="col-1-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                                <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Edit Transport">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </td>
                    </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Transport</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="transport_form" method="post" action="{{ route('admin.transport.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                          <label for="tradeTitle">Route Name</label>
                          <input type="text" name="route_name" class="form-control" placeholder="" id="courseTitle">
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                          <label for="tradeTitle">Number of Vehicle</label>
                          <input type="text" name="vehicle_num" class="form-control" placeholder="" id="tradeTitle">
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>

                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Route Fare</label>
                            <input type="text" name="route_fare" class="form-control" placeholder="" id="tradeTitle">
                        </div>
                        <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">
                            <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Add Transport">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        if($('#transport_form'). length > 0){
            $('#transport_form').validate({
                rules: {
                    route_name: {
                        required:true,
                    },
                    vehicle_num:{
                        required:true,
                    },
                    route_fare:{
                        required:true,
                    }
                },
                messages:{
                    route_name: {
                        required:"Please enter route name.",
                    },
                    vehicle_num:{
                        required:"Please enter vehicle number.",
                    },
                    route_fare:{
                        required:"Please enter route fare.",
                    }
                }
            })
        }


    </script>

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
                                url:"delete/transport/"+emp_id,
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
