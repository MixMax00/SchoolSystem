@extends('Backend.Admin.master')

@section('title')
    Manage Books Category
@endsection

@php

    $book_categories = \App\Models\BookCategory::all();
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
            Book Category
            {{-- @if(auth()->user()->hasPermission('app.roles.create')) --}}
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus mr-2"></i><span>Add Book Category</span></a>
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
                        @foreach ($book_categories as $book_category)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $book_category->category_name }}</td>
                                <td>{{ $book_category->description }}</td>
                                <td>
                                    <a href="{{ route('admin.librarian.status',["id"=>$book_category->id]) }}" class="btn btn-{{ $book_category->status == "1" ? "primary" : "warning" }}"><i class="fas fa-arrow-{{ $book_category->status == "1" ? "up" : "down" }}"></i></a>
                                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter_{{ $book_category->id }}"><i class="fas fa-edit text-white"></i></a>
                                    <button class="btn btn-danger delete_btn" value="{{ $book_category->id }}" id="delete" ><i class="fas fa-trash text-white"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="exampleModalCenter_{{ $book_category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Book Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="librarian_form" method="post" action="{{ route('admin.librarian.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                  <label for="tradeTitle">Category Name</label>
                                                  <input type="text" name="category_name" class="form-control" placeholder="">
                                                </div>
                                                <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                    <label for="tradeTitle">Description</label>
                                                   <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                                <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                                    <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Update Category">
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
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Book Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="librarian_form" method="post" action="{{ route('admin.bookCategory.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                          <label for="tradeTitle">Category Name</label>
                          <input type="text" name="category_name" class="form-control" placeholder="">
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Description</label>
                           <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                            <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Add Category">
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
