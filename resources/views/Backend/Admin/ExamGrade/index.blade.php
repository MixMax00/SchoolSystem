@extends('Backend.Admin.master')

@section('title')
    Exam Grade
@endsection

@php
    $exam_grades = \App\Models\ExamGrade::all();
    $exams = \App\Models\ExamList::all();
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
            Exam Grade
            {{-- @if(auth()->user()->hasPermission('app.roles.create')) --}}
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus mr-2"></i><span>Add Exam Grade</span></a>
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
                      <th>Grade Name</th>
                      <th>Grade Point</th>
                      <th>Mark From</th>
                      <th>Mark Upto</th>
                      <th>Grade Point From</th>
                      <th>Grade Point Upto</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach ($exam_grades as $ex_grade)

                    <tr>
                        <td>
                          {{ $loop->index +1 }}
                        </td>
                        <td>{{ $ex_grade->grade_name }}</td>
                        <td>{{ $ex_grade->grade_point }}</td>
                        <td>{{ $ex_grade->mark_from }}</td>
                        <td>{{ $ex_grade->mark_upto }}</td>
                        <td>{{ $ex_grade->grade_point_from }}</td>
                        <td>{{ $ex_grade->grade_point_upto }}</td>
                        <td>{{ $ex_grade->description }}</td>
                        <td>

                            {{-- @if(auth()->user()->hasPermission('app.roles.create')) --}}
                            <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter_{{ $ex_grade->id }}"><i class="fas fa-edit text-white"></i></a>
                            <a href="" class="btn btn-"><i class="fas fa-arrow-"></i></a>
                              <button class="btn btn-danger delete_btn" value="{{ $ex_grade->id }}" id="delete" ><i class="fas fa-trash text-white"></i></button>
                            {{-- @endif   --}}

                             <div class="modal fade" id="exampleModalCenter_{{ $ex_grade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Exam Grade</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="contact_form" method="post" action="{{ route('admin.examGrade.update') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">

                                            <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                <label for="tradeTitle">Grade Name</label>

                                              </div>
                                              <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                <input type="hidden" name="id" class="form-control" value="{{ $ex_grade->id }}" >
                                                <select name="grade_name" class="select2">
                                                    <option selected>--- select exam name ---</option>
                                                    <option {{ $ex_grade->grade_name == "A+" ? "selected" : ' ' }} value="A+">A+</option>
                                                    <option {{ $ex_grade->grade_name == "A" ? "selected" : ' ' }} value="A">A</option>
                                                    <option {{ $ex_grade->grade_name == "A-" ? "selected" : ' ' }} value="A-">A-</option>
                                                    <option {{ $ex_grade->grade_name == "B" ? "selected" : ' ' }} value="B">B</option>
                                                    <option {{ $ex_grade->grade_name == "C" ? "selected" : ' ' }} value="C">C</option>
                                                    <option {{ $ex_grade->grade_name == "D" ? "selected" : ' ' }} value="D">D</option>
                                                    <option {{ $ex_grade->grade_name == "F" ? "selected" : ' ' }} value="F">F</option>
                                                </select>
                                              </div>
                                              <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                  <label for="tradeTitle">Grade Point</label>

                                              </div>
                                              <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                <select name="grade_point" class="select2">
                                                    <option selected>--- select grade point ---</option>
                                                    @for ($i = 1; $i <=5; $i++)
                                                    <option {{ $ex_grade->grade_point == '1' ? 'selecetd' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>

                                              </div>
                                              <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                  <label for="tradeTitle">Mark From</label>
                                                  <input type="text" name="mark_from" class="form-control" value="{{ $ex_grade->mark_from }}" id="courseTitle">
                                              </div>
                                              <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                  <label for="tradeTitle">Mark Upto</label>
                                                  <input type="text" name="mark_upto" class="form-control" value="{{ $ex_grade->mark_upto }}" id="courseTitle">
                                              </div>
                                              <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                  <label for="tradeTitle">Grade Point From</label>

                                                  {{-- <input type="text" name="grade_point_from" class="form-control" value="{{ $ex_grade->grade_point_from }}" id="courseTitle"> --}}
                                              </div>
                                              <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                <select name="grade_point_from" class="select2">
                                                    <option selected>--- select grade point ---</option>
                                                    @for ($i = 1; $i <=5; $i++)
                                                    <option {{ $ex_grade->grade_point_from ==  $i ? 'selecetd' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                              </div>
                                              <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                  <label for="tradeTitle">Grade Point Upto</label>

                                                  {{-- <input type="text" name="grade_point_upto" class="form-control" value="{{ $ex_grade->grade_point_upto }}" id="courseTitle"> --}}
                                              </div>
                                                <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                    <select name="grade_point_upto" class="select2">
                                                        <option selected>--- select grade point ---</option>
                                                        @for ($i = 1; $i <=5; $i++)
                                                        <option {{ $ex_grade->grade_point_upto == $i ? 'selecetd' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                              <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                  <label for="tradeTitle">Description</label>
                                                  <textarea name="description" class="form-control">{{ $ex_grade->description }}</textarea>
                                                </div>
                                              <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                <label for="tradeCode">Status</label>

                                              </div>

                                            <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                <select class="select2" name="status">
                                                    <option {{ $ex_grade->status == '1' ? 'selected' : ' ' }} value="1">Active</option>
                                                    <option {{ $ex_grade->status == '0' ? 'selected' : ' ' }} value="0">Inactive</option>
                                                </select>
                                            </div>

                                              <div class="col-1-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                                  <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Update Grade">
                                              </div>
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
                    <form id="exam_form" method="post" action="{{ route('admin.examGrade.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="grade_name">Grade Name</label>
                            <select name="grade_name" class="select2">
                                <option selected>--- select grade name ---</option>
                                <option value="A+">A+</option>
                                <option value="A">A</option>
                                <option value="A-">A-</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="F">F</option>
                            </select>
                            {{-- <input type="text" name="grade_name" class="form-control" value="" id="courseTitle"> --}}
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                              <label for="tradeTitle">Grade Point</label>
                              <select name="grade_point" class="select2">
                                <option selected>--- select grade point ---</option>
                                @for ($i = 1; $i <=5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                          <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                              <label for="tradeTitle">Mark From</label>
                              <input type="text" name="mark_from" class="form-control" value="" id="courseTitle">
                          </div>
                          <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                              <label for="tradeTitle">Mark Upto</label>
                              <input type="text" name="mark_upto" class="form-control" value="" id="courseTitle">
                          </div>
                          <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                              <label for="tradeTitle">Grade Point From</label>
                              <select name="grade_point_from" class="select2">
                                <option selected>--- select grade point ---</option>
                                @for ($i = 1; $i <=5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                              {{-- <input type="text" name="grade_point_from" class="form-control" value="" id="courseTitle"> --}}
                          </div>
                          <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                              <label for="tradeTitle">Grade Point Upto</label>
                              <select name="grade_point_upto" class="select2">
                                <option selected>--- select grade point ---</option>
                                @for ($i = 1; $i <=5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                              {{-- <input type="text" name="grade_point_upto" class="form-control" value="" id="courseTitle"> --}}
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
                          <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                              <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Add Grade">
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
                    grade_name: {
                        required:true,
                    },
                    grade_point:{
                        required:true,
                    },
                    mark_from: {
                        required:true,
                    },
                    mark_upto:{
                        required:true,
                    },
                    grade_point_from: {
                        required:true,
                    },
                    grade_point_upto:{
                        required:true,
                    }
                },
                messages:{
                    grade_name: {
                        required:"Please enter grade name",
                    },grade_point:{
                        required:"Please enter grade point",
                    },
                    mark_from: {
                        required:"Please enter mark from",
                    },mark_upto:{
                        required:"Please enter mark upto",
                    },
                    grade_point_from: {
                        required:"Please enter grade point from",
                    },grade_point_upto:{
                        required:"Please enter grade ponint upto",
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
