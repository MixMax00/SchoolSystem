@extends('Backend.Admin.master')

@section('title')
    Exam List
@endsection

@php
    $exam_lists = \App\Models\ExamList::all();
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
            Exam List
            @if(auth()->user()->hasPermission('app.exam.create'))
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus mr-2"></i><span>Add Exam</span></a>
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
                      <th>Exam Name</th>
                      <th>Date</th>
                      <th>Description</th>
                      @if(auth()->user()->hasPermission('app.exam.update'))
                      <th>Action</th>
                      @endif
                    </tr>
                    </thead>
                    <tbody>
                   @foreach ($exam_lists as $ex_list)

                    <tr>
                        <td>
                          {{ $loop->index +1 }}
                        </td>
                        <td>{{ $ex_list->exam_name }}</td>
                        <td>{{ $ex_list->date }}</td>
                        <td>{{ $ex_list->description }}</td>
                        <td>

                            @if(auth()->user()->hasPermission('app.roles.update'))
                            <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter_{{ $ex_list->id }}"><i class="fas fa-edit text-white"></i></a>
                            <a href="" class="btn btn-"><i class="fas fa-arrow-"></i></a>
                              <button class="btn btn-danger delete_btn" value="{{ $ex_list->id }}" id="delete" ><i class="fas fa-trash text-white"></i></button>
                            @endif

                        <div class="modal fade" id="exampleModalCenter_{{ $ex_list->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Course</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="contact_form" method="post" action="{{ route('admin.examList.update') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                              <label for="tradeTitle">Exam Name</label>
                                              <input type="hidden" name="id" class="form-control" value="{{ $ex_list->id }}" >
                                              <input type="text" name="exam_name" class="form-control" value="{{ $ex_list->exam_name }}" id="courseTitle">
                                            </div>
                                            <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                              <label for="tradeTitle">Date</label>
                                              <input type="date" name="date" class="form-control"  value="{{ $ex_list->date }}" id="tradeTitle">
                                            </div>
                                            <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                <label for="tradeTitle">Description</label>
                                                <textarea name="description" class="form-control">{{ $ex_list->description }}</textarea>
                                              </div>
                                            <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                              <label for="tradeCode">Status</label>
                                              <select class="form-control" name="status">
                                                  <option {{ $ex_list->status == '1' ? 'selected' : ' ' }} value="1">Active</option>
                                                  <option {{ $ex_list->status == '0' ? 'selected' : ' ' }} value="0">Inactive</option>
                                              </select>
                                            </div>

                                            <div class="col-1-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                                <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Update Exam">
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
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Exam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="exam_form" method="post" action="{{ route('admin.examList.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                          <label for="tradeTitle">Exam Name</label>
                          <input type="text" name="exam_name" class="form-control" placeholder="" id="courseTitle">
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                          <label for="tradeTitle">Date</label>
                          <input type="date" name="date" class="form-control" placeholder="" id="tradeTitle">
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                          </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                          <label for="tradeCode">Status</label>
                          <select class="form-control" name="status">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                          </select>
                        </div>

                        <div class="col-1-xxxl col-xl-3 col-lg-3 col-12 form-group">
                            <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Add Exam">
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
        if($('#exam_form'). length > 0){
            $('#exam_form').validate({
                rules: {
                    exam_name: {
                        required:true,
                    },
                    date:{
                        required:true,
                    }
                },
                messages:{
                    exam_name: {
                        required:"Please enter exam name",
                    },date:{
                        required:"Please enter exam date",
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
                                url:"delete/examdelete/"+emp_id,
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
