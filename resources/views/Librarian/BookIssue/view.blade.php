@extends('Backend.Admin.master')

@section('title')
    Issue view
@endsection

@php
    $book_detail = \App\Models\LibraryBook::find($detail->id);
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
            Book Issue
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <h3>Book Details</h3>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-12">
                    <table class="table bordered">
                        <tr>
                            <th>Book Name:</th>
                            <td>{{ $book_detail->book_name }}</td>
                        </tr>
                        <tr>
                            <th>Category Name:</th>
                            <td>{{ $book_detail->book_name }}</td>
                        </tr>
                        <tr>
                            <th>Rack No:</th>
                            <td>{{  $book_detail->self_no  }}</td>
                        </tr>
                        <tr>
                            <th>Number of copy:</th>
                            <td>{{ $detail->num_of_copy }}</td>
                        </tr>
                        <tr>
                            <th>Issue Date:</th>
                            <td>{{ $detail->issue_date }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-lg-12">
                    <h3>Person Details</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table bordered">
                        <tr>
                            <th>Name:</th>
                            <td>{{ $detail->name }}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $detail->phone }}</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{ $detail->address }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.issueBook.return') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $detail->id }}">
                            <input type="hidden" name="book_id" value="{{ $detail->book_name }}">
                            <input type="hidden" name="num_of_copy" value="{{ $detail->num_of_copy }}">
                            <input type="submit" value="Return" class="btn btn-warning btn-lg">
                        </div>
                    </form>
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
