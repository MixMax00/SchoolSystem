@extends('Backend.Admin.master')

@section('title')
    Book Issue
@endsection

@php
    $book_issue = \App\Models\IssuBook::all();
    $book_lists = \App\Models\LibraryBook::all();
@endphp

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            Book Issue
            {{-- @if(auth()->user()->hasPermission('app.roles.create')) --}}
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus mr-2"></i><span>Issue Book</span></a>
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
                      <th>Phone</th>
                      <th>Book Name</th>
                      <th>Book's copy</th>
                      <th>Issue Date</th>
                      <th>Return Date</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach ($book_issue as $issue)

                    <tr>
                        <td>
                          {{ $loop->index +1 }}
                        </td>
                        <td>{{ $issue->name }}</td>
                        <td>{{ $issue->phone }}</td>
                        <td>{{ $issue->book_name }}</td>
                        <td>{{ $issue->num_of_copy }}</td>
                        <td>{{ $issue->created_at->format('d-M-y') }}</td>
                        <td>{{ $issue->updated_at->format('d-M-y') }}</td>
                        <td>

                            {{-- @if(auth()->user()->hasPermission('app.roles.create')) --}}
                            <a href="{{ route('admin.issueBook.show', ["id" => $issue->id]) }}" class="btn btn-info"><i class="fas fa-eye text-white"></i></a>
                            <a href="" class="btn btn-"><i class="fas fa-arrow-"></i></a>
                              <button class="btn btn-danger delete_btn" value="{{ $issue->id }}" id="delete" ><i class="fas fa-trash text-white"></i></button>
                            {{-- @endif   --}}

                        </td>
                    </tr>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Issue Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="book_issue_form" method="post" action="{{ route('admin.issueBook.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Book Name</label>
                            <select class="select2" name="book_name">
                                  @foreach ($book_lists as $book_list)
                                      <option value="{{ $book_list->id }}">{{ $book_list->book_name }}</option>
                                  @endforeach
                            </select>
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Number Of Copy</label>
                            <input type="text" name="num_of_copy" class="form-control" value="" id="courseTitle">
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Name</label>
                            <input type="text" name="name" class="form-control" value="" id="courseTitle">
                          </div>
                          <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                              <label for="tradeTitle">phone</label>
                              <input type="text" name="phone" class="form-control" value="" id="courseTitle">
                          </div>

                          <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                              <label for="tradeTitle">Address</label>
                              <textarea name="address" class="form-control" ></textarea>
                          </div>
                          <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                              <label for="tradeTitle">Issue Date</label>
                              <input type="date" name="issue_date" class="form-control air-datepicker" value="" id="courseTitle" data-position='bottom right'>

                          </div>
                          <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                            <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Book Issue">
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
        if($('#book_issue_form'). length > 0){
            $('#book_issue_form').validate({
                rules: {
                    book_name: {
                        required:true,
                    },
                    num_of_copy:{
                        required:true,
                    },
                    phone: {
                        required:true,
                    },
                    issue_date:{
                        required:true,
                    },
                    address: {
                        required:true,
                    },
                    name:{
                        required:true,
                    }
                },
                messages:{
                    book_name: {
                        required:"Please enter book name",
                    },
                    num_of_copy:{
                        required:"Please enter book copy",
                    },
                    phone: {
                        required:"Please enter phone number",
                    },
                    issue_date:{
                        required:"Please select date",
                    },
                    address: {
                        required:"Please enter address",
                    },
                    name:{
                        required:"Please enter name",
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
                                url:"delete/gradedelete/"+emp_id,
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
