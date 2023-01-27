@extends('Backend.Admin.master')

@section('title')
  Manage {{ $class->class_name  }} Subject
@endsection

@php
    $classes= \App\Models\Classes::all();
    $teachers= \App\Models\Teacher::all();
    $subjects= \App\Models\Subject::where('class_id',$class->id)->get();
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
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Subject</h3>
                </div>
                <div class="dropdown">
                    @if(auth()->user()->hasPermission('app.subject.create'))
                    <a href="" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus mr-2"></i><span>Add subject</span></a>
                    @endif
                </div>
            </div>
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
                        <th>Subject Name</th>
                        <th>Teacher Name</th>
                        @if(auth()->user()->hasPermission('app.subject.update'))
                        <th>Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td>
                                    {{ $loop->index +1 }}
                                </td>
                                <td>{{ $subject->sub_name }}</td>
                                <td>{{ $subject->teacher->name }}</td>
                                <td>
                                    @if(auth()->user()->hasPermission('app.roles.create'))
                                    <a class="btn btn-info" data-toggle="modal" data-target="#subject_{{ $subject->id  }}"><i class="fas fa-edit text-white"></i></a>
                                    <button class="btn btn-danger delete_btn" value="{{ $subject->id }}" id="delete" ><i class="fas fa-trash text-white"></i></button>
                                    @endif
                                </td>
                            </tr>

                            <div class="modal fade" id="subject_{{ $subject->id  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Subject</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form  class="new-added-form" id="class_form" method="post" action="{{ route('admin.subject.update') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                                    <label for="tradeTitle">Subject Name</label>
                                                    <input type="hidden" name="id" value="{{ $subject->id }}"/>
                                                    <input type="text" name="sub_name" class="form-control" value="{{ $subject->sub_name }}" placeholder="Class Name" id="courseTitle">
                                                </div>
                                                <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                                    <label for="tradeTitle">Class</label>
                                                    <select name="class_id" class="select2">
                                                        <option selected>Please select class</option>
                                                        @foreach ($classes as $all_class)
                                                            <option {{ $all_class->id == $subject->class_id ? "selected" : '' }} value="{{ $all_class->id }}">{{ $all_class->class_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                                    <label for="tradeCode">Teacher</label>
                                                    <select class="select2" name="teacher_id">
                                                        <option selected>Please select Teacher</option>
                                                        @foreach ($teachers as $teacher)
                                                            <option {{ $teacher->id == $subject->teacher_id ? "selected" : '' }} value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-12 form-group mg-t-8">
                                                    <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Update Subject">
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="class_form" method="post" action="{{route('admin.subject.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Subject Name</label>
                            <input type="text" name="sub_name" class="form-control" placeholder="Class Name" id="courseTitle">
                        </div>
                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Class</label>
                            <select name="class_id" class="select2">
                                <option selected>Please select class</option>
                                @foreach ($classes as $all_class)
                                    <option {{ $all_class->id == $class->id ? "selected" : '' }} value="{{ $all_class->id }}">{{ $all_class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                            <label for="tradeCode">Teacher</label>
                            <select class="select2" name="teacher_id">
                                <option selected>Please select Teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 form-group mg-t-8">
                            <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Add Subject">
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
        if($('#class_form'). length > 0){
            $('#class_form').validate({
                rules: {
                    sub_name: {
                        required:true,
                    },class_id:{
                        required:true,
                    },
                    teacher_id:{
                        required:true,
                    },
                },
                messages:{
                    sub_name: {
                        required:"Please enter subject name",
                    },class_id:{
                        required:"Please select class name",
                    },teacher_id:{
                        required:"Please select teacher",
                    },
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

                // alert(emp_id)



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
                                url:"delete/subject/"+emp_id,
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

