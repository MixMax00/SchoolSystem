@extends('Backend.Admin.master')

@section('title')
    Manage Library Books
@endsection

@php

    $classes = \App\Models\Classes::all();
    $library_books = \App\Models\LibraryBook::all();
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
            Library Books
            {{-- @if(auth()->user()->hasPermission('app.roles.create')) --}}
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus mr-2"></i><span>Add Book</span></a>
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
                      <th>Book Name</th>
                      <th>Category</th>
                      <th>Self No</th>
                      <th>Author</th>
                      <th>Price</th>
                     <th>Quantity</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($library_books as $library_book)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $library_book->book_name }}</td>
                                <td>{{ $library_book->bookCategory->category_name }}</td>
                                <td>{{ $library_book->self_no }}</td>
                                <td>{{ $library_book->author }}</td>
                                <td>{{ $library_book->price }}</td>
                                <td>{{ $library_book->quantity }}</td>

                                <td>

                                    <a href="{{ route('admin.library.status',["id"=>$library_book->id]) }}" class="btn btn-{{ $library_book->status == "1" ? "primary" : "warning" }}"><i class="fas fa-arrow-{{ $library_book->status == "1" ? "up" : "down" }}"></i></a>
                                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter_{{ $library_book->id }}"><i class="fas fa-edit text-white"></i></a>
                                    <button class="btn btn-danger delete_btn" value="{{ $library_book->id }}" id="delete" ><i class="fas fa-trash text-white"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="exampleModalCenter_{{ $library_book->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Library Book</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="librarian_form" method="post" action="{{ route('admin.library.update') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                    <label for="tradeTitle">Book Name</label>
                                                    <input type="text" name="book_name" class="form-control" value="{{ $library_book->book_name  }}">
                                                  </div>

                                                  <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                    <label for="tradeTitle">Category</label>

                                                        <div class="input-group mb-3">
                                                            <select name="book_category" id="" class="form-control">
                                                                <option value="">--- select category ---</option>
                                                                @foreach ($book_categories as $category)
                                                                    <option {{ $category->id == $library_book->book_category ? "selected" : ' ' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                                @endforeach

                                                            </select>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="basic-addon2" data-toggle="modal" data-target="#bookCategoryModal"><i class="fas fa-plus"></i></span>
                                                            </div>
                                                        </div>

                                                </div>
                                                <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                    <input type="hidden" name="id" value="{{ $library_book->id }}">
                                                    <label for="tradeTitle">Self</label>
                                                    <input type="text" name="self_no" class="form-control" value="{{ $library_book->self_no  }}">

                                                </div>

                                                <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                    <label for="tradeTitle">Author</label>
                                                    <input type="text" name="author" class="form-control" value="{{ $library_book->author  }}">
                                                </div>
                                                <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                    <label for="tradeTitle">Description</label>
                                                   <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $library_book->description  }}</textarea>
                                                </div>
                                                <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                    <label for="tradeTitle">Price</label>
                                                    <input type="text" name="price" class="form-control" value="{{ $library_book->price  }}">
                                                </div>
                                                <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                    <label for="tradeTitle">Qunatity</label>
                                                    <input type="text" name="quantity" class="form-control" value="{{ $library_book->quantity  }}"  >
                                                </div>
                                                <div class="col-1-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                                    <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Update BooK">
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Library Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="library_form" method="post" action="{{ route('admin.library.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Book Name</label>
                            <input type="text" name="book_name" class="form-control" placeholder="">
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Category</label>
                            <div class="input-group mb-3">
                                <select name="book_category" id="" class="form-control">
                                    <option value="">--- select category ---</option>
                                    @foreach ($book_categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2" data-toggle="modal" data-target="#bookCategoryModal"><i class="fas fa-plus"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Self No</label>
                            <input type="text" name="self_no" id="" class="form-control">
                        </div>

                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Author</label>
                            <input type="text" name="author" class="form-control" placeholder="">
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Description</label>
                           <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="" >
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Qunatity</label>
                            <input type="text" name="quantity" class="form-control" placeholder="" >
                        </div>
                        <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                            <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Add  Book">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bookCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Book Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #ddd">
                    <form id="book_category_form" method="post" action="{{ route('admin.bookCategory.store') }}" enctype="multipart/form-data">
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
                            <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Add  Category">
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
        if($('#library_form'). length > 0){
            $('#library_form').validate({
                rules: {
                    book_category:{
                        required:true,
                    },
                    book_name:{
                        required:true,
                    },
                    author:{
                        required:true,
                    },
                    price:{
                        required:true,
                    },
                    quantity:{
                        required:true,
                    }
                },
                messages:{
                    book_category:{
                        required:"Please select book category",
                    },
                    book_name:{
                        required:"Please enter book name",
                    },
                    author:{
                        required:"Please enter author name",
                    },
                    price:{
                        required:"Please enter price",
                    },
                    quantity:{
                        required:"Please enter quantity",
                    }
                }
            })
        }

        if($('#book_category_form'). length > 0){
            $('#book_category_form').validate({
                rules: {
                    category_name: {
                        required:true,
                    },
                },
                messages:{
                    category_name: {
                        required:"Please enter category Name",
                    }
                }
            });
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
                                url:"delete/library/"+emp_id,
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
