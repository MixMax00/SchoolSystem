@extends('Backend.Admin.master')
@section('title')
    Course
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
            Course
            @if(auth()->user()->hasPermission('app.roles.create'))
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i></a>
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
                      <th>Course Name</th>
                      <th>Course Id</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>
                           {{ $loop->index +1 }}
                        </td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->course_code }}</td>
                        <td>

                            @if(auth()->user()->hasPermission('app.roles.create'))
                            <a href="{{ route('course.edit', ["id"=>$course->id]) }}" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter_{{$course->id}}"><i class="fas fa-edit text-white"></i></a>
                            <a href="{{ route('course.status', ["id"=>$course->id]) }}" class="btn btn-{{ $course->status == 1 ? "success" : "warning" }}"><i class="fas fa-arrow-{{  $course->status == 1 ? "circle-up" : "circle-down" }}"></i></a>
                              <button class="btn btn-danger delete_btn" value="{{$course->id}}" id="delete" ><i class="fas fa-trash text-white"></i></button>
                            @endif

                            <div class="modal fade" id="exampleModalCenter_{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Course</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="contact_form" method="post" action="{{ route('course.update') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                              <label for="tradeTitle">Course Title</label>
                                              <input type="hidden" name="id" class="form-control" value="{{ $course->id }}" >
                                              <input type="text" name="course_name" class="form-control" value="{{ $course->course_name }}" id="courseTitle">
                                            </div>
                                            <div class="form-group">
                                              <label for="tradeTitle">Course code</label>
                                              <input type="text" name="course_code" class="form-control"  value="{{ $course->course_code }}" id="tradeTitle">
                                            </div>
                                            <div class="form-group">
                                              <label for="tradeCode">Status</label>
                                              <select class="form-control" name="status">
                                                  <option {{ $course->status == 1 ? 'selected' : ' ' }} value="1">Active</option>
                                                  <option {{ $course->status == 0 ? 'selected' : ' ' }} value="0">Inactive</option>
                                              </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-warning w-100" value="Update Course">
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="contact_form" method="post" action="{{route('course.create.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="tradeTitle">Course Title</label>
                          <input type="text" name="course_name" class="form-control" placeholder="" id="courseTitle">
                        </div>
                        <div class="form-group">
                          <label for="tradeTitle">Course code</label>
                          <input type="text" name="course_code" class="form-control" placeholder="" id="tradeTitle">
                        </div>
                        <div class="form-group">
                          <label for="tradeCode">Status</label>
                          <select class="form-control" name="status">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-warning w-100" value="Add Course">
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
        if($('#contact_form'). length > 0){
            $('#contact_form').validate({
                rules: {
                    course_name: {
                        required:true,
                    },course_code:{
                        required:true,
                    }
                },
                messages:{
                    course_name: {
                        required:"Please enter course name",
                    },course_code:{
                        required:"Please enter course code",
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
                                url:"delete/course/"+emp_id,
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
