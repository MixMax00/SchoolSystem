@extends('Backend.Admin.master')

@section('title')
    Librarian
@endsection

@php
    $roles = \App\Models\Role::all();
    $role = \App\Models\Role::where('slug','librarian')->first();
    $librarians = \App\Models\Librarian::all();
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
            Librarian
            {{-- @if(auth()->user()->hasPermission('app.roles.create')) --}}
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus mr-2"></i><span>Add Librarian</span></a>
            {{-- @endif --}}
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Salary</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($librarians as $librarian)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $librarian->name }}</td>
                                <td>{{ $librarian->email }}</td>
                                <td>{{ $librarian->salery }}</td>
                                <td>

                                    <a href="{{ route('admin.librarian.status',["id"=>$librarian->id]) }}" class="btn btn-{{ $librarian->status == "1" ? "primary" : "warning" }}"><i class="fas fa-arrow-{{ $librarian->status == "1" ? "up" : "down" }}"></i></a>
                                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter_{{ $librarian->id }}"><i class="fas fa-edit text-white"></i></a>
                                    <button class="btn btn-danger delete_btn" value="{{ $librarian->id }}" id="delete" ><i class="fas fa-trash text-white"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="exampleModalCenter_{{ $librarian->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Librarian</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="librarian_form" method="post" action="{{ route('admin.librarian.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="tradeTitle">Name</label>
                                                    <input type="hidden" name="id" value="{{ $librarian->id }}">
                                                    <input type="text" name="name" value="{{ $librarian->name }}"  class="form-control" placeholder="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="tradeTitle">Salary</label>
                                                    <input type="text" name="salary" value="{{ $librarian->salery }}" class="form-control" placeholder="">
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label for="tradeTitle">Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tradeTitle">Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="tradeTitle">Confiram Password</label>
                                                    <input type="password" name="password_confirmation" class="form-control" placeholder="" >
                                                </div> --}}
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-warning w-100" value="Add Librarian">
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
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Librarian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="librarian_form" method="post" action="{{ route('admin.librarian.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="tradeTitle">Name</label>
                          <input type="text" name="name" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="tradeTitle">Salary</label>
                            <input type="text" name="salary" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="tradeTitle">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="tradeTitle">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="tradeTitle">Confiram Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="" >
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning w-100" value="Add Librarian">
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
        if($('#librarian_form'). length > 0){
            $('#librarian_form').validate({
                rules: {
                    name: {
                        required:true,
                    },
                    email:{
                        required:true,
                    },

                    password:{
                        required:true,
                    }
                },
                messages:{
                    name: {
                        required:"Please enter librarian name",
                    },
                    email:{
                        required:"Please enter librarian email",
                    },

                    password:{
                        required:"Please enter password",
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
                                url:"delete/librarian/"+emp_id,
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
