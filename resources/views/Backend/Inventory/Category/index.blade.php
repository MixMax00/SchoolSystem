@extends('Backend.Admin.master')

@section('title')
   Category
@endsection

@php

    $categories = \App\Models\InventoryCategory::all();
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
             Category
            {{-- @if(auth()->user()->hasPermission('app.roles.create')) --}}
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus mr-2"></i><span>Add Category</span></a>
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
                      <th>Category Name</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <a href="{{ route('admin.inventoryCategory.status',["id"=>$category->id]) }}" class="btn btn-{{ $category->status == "1" ? "primary" : "warning" }}"><i class="fas fa-arrow-{{ $category->status == "1" ? "up" : "down" }}"></i></a>
                                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter_{{ $category->id }}"><i class="fas fa-edit text-white"></i></a>
                                    <button class="btn btn-danger delete_btn" value="{{ $category->id }}" id="delete" ><i class="fas fa-trash text-white"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="exampleModalCenter_{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="" method="post" action="{{ route('admin.inventoryCategory.update') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                  <label for="category_name">Category Name</label>
                                                  <input type="hidden" name="id" class="form-control" value="{{ $category->id }}">
                                                  <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                   <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $category->description }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-warning w-100" value="Update Category">
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm" method="post" action="{{ route('admin.inventoryCategory.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="category_name">Category Name</label>
                          <input type="text" name="category_name" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                           <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning w-100" value="Add Category">
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
        if($('#categoryForm'). length > 0){
            $('#categoryForm').validate({
                rules: {
                    category_name: {
                        required:true,
                    }
                },
                messages:{
                    category_name: {
                        required:"Please enter category name",
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
                                url:"delete/inventory-category/"+emp_id,
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
