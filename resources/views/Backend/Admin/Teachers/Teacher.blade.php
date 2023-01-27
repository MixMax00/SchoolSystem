@extends('Backend.Admin.master')
@section('title')
    Teacher
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
            Teacher
            @if(auth()->user()->hasPermission('app.teacher.create'))
            <a href="{{ route('teacher.add') }}" class="btn btn-primary float-right"><i class="fa fa-plus "></i></a>
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
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>
                                {{ $loop->index +1}}
                            </td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->designation }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>
                                @if($teacher->image)
                                    <img src="{{asset($teacher->image)}}" alt="" width="100px" height="100px">
                                @else
                                    <img src="{{asset('assets/backend/img/default.jpg')}}" alt="" width="100px" height="100px">
                                @endif
                            </td>
                            <td>{{ $teacher->salary }}</td>

                            <td>
                                @if(auth()->user()->hasPermission('app.teacher.create'))
                                <a href="{{ route('teacher.edit',["id" =>$teacher->id ]) }}" class="dropdown-item"><i class="fas fa-edit text-secondery"></i></a>
                                <a class="dropdown-item" href="{{ route('teacher.status', ["id"=>$teacher->id]) }}" ><i class="fas fa-arrow-{{  $teacher->status == 1 ? "circle-up" : "circle-down" }}"></i></a>
                                <a class="dropdown-item"  data-toggle="modal" data-target="#teacherView_{{ $teacher->id }}"><i class="fas fa-eye"></i></a>

                                <button class="dropdown-item delete_btn " value="{{$teacher->id}}" id="delete" ><i class="fas fa-trash text-danger "></i></button>
                                @endif
            </div>
        </div>
        <script>
            var loadFile_{{$teacher->id}} = function(event) {
                var output = document.getElementById('output_{{$teacher->id}}');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output_{{$teacher->id}}.src) // free memory
                }
            };
        </script>
        </td>
        </tr>


        <div class="modal fade" id="teacherView_{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Teacher Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="contact_form" method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 col-sm-12">
                                    <div class="form-group">
                                        <label for="teacherName">Teacher Name</label>
                                        <input type="text" name="name" id="teacherName" disabled value="{{ $teacher->name  }}" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input type="text" name="designation" id="designation" disabled value="{{ $teacher->designation  }}" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group m-4 float-right">
                                        <img src="{{ isset($teacher->image) ? asset($teacher->image) : asset('assets/backend/img/default.jpg')}}" id="outputTeacher" alt="" width="120px" height="120px">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input type="text" name="designation" id="designation" disabled value="{{ $teacher->designation  }}" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="dob">Birthday</label>
                                        <input type="date" name="dob" id="dob" disabled value="{{ $teacher->dob  }}" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="dob">Gender</label>
                                        <input type="text" name="Gender" id="designation" disabled value="{{ $teacher->gender  }}" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="qualification">Address</label>
                                        <input type="text" name="Address" id="designation" disabled value="{{ $teacher->address  }}" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="qualification">Qualification</label>
                                        <input type="text" name="designation" id="designation" disabled value="{{ $teacher->qualification  }}" class="form-control" placeholder="">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="qualification">Phone</label>
                                        <input type="text" name="designation" id="designation" disabled value="{{ $teacher->phone  }}" class="form-control" placeholder="">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="qualification">Email</label>
                                        <input type="text" name="designation" id="designation" disabled value="{{ $teacher->email  }}" class="form-control" placeholder="">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="subject">Department</label>
                                        <input type="text" name="designation" id="designation" disabled value="{{ $teacher->department  }}" class="form-control" placeholder="">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Social links</label>
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-12 ">
                                                <label>Facebook</label>
                                                <input type="text" name="designation" id="designation" disabled value="{{ $teacher->fb  }}" class="form-control" placeholder="">

                                            </div>
                                            <div class="col-lg-4 col-sm-12 ">
                                                <label>Twitter</label>
                                                <input type="text" name="designation" id="designation" disabled value="{{ $teacher->twitter  }}" class="form-control" placeholder="">

                                            </div>
                                            <div class="col-lg-4 col-sm-12 ">
                                                <label>Linkden</label>
                                                <input type="text" name="designation" id="designation" disabled value="{{ $teacher->linkden  }}" class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="contact_form" method="post" action="{{ route('teacher.create.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="teacherName">Teacher Name</label>
                            <input type="text" name="name" id="teacherName" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="dob">Birthday</label>
                            <input type="date" name="dob" id="dob" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="dob">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">--Select Gender--</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qualification">Address</label>
                            <input type="text" name="Address" id="qualification" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="qualification">Qualification</label>
                            <input type="text" name="qualification" id="qualification" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="qualification">Phone</label>
                            <input type="text" name="phone" id="qualification" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="qualification">Email</label>
                            <input type="text" name="email" id="qualification" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="qualification">Password</label>
                            <input type="text" name="password" id="qualification" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="subject">Department</label>
                            <input type="text" name="department" id="subject" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Social Icons</label>
                            <div class="col-4 col-sm-12 form-group">
                                <label>Facebook</label>
                                <input type="text" class="form-control" name="fb" >
                            </div>
                            <div class="col-4 col-sm-12 form-group">
                                <label>Twitter</label>
                                <input type="text" class="form-control" name="twitter" >
                            </div>
                            <div class="col-4 col-sm-12 form-group">
                                <label>Linkden</label>
                                <input type="text" class="form-control" name="linkden" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="teacherImage">Image</label>
                            <input type="file" class="form-control" name="image"  onchange="loadFileTeacher(event)" />
                        </div>
                        <div class="form-group">
                            <img src="{{asset('assets/backend/img/default.jpg')}}" id="outputTeacher" alt="" width="150px" height="150px" >
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>

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
                    headings: {
                        required:true,
                    },short_description:{
                        required:true,
                    },phone:{
                        required:true,
                    },image:{
                        required:true,
                    },email:{
                        required:true,
                        email:true,
                    }
                },
                messages:{
                    headings: {
                        required:"Please enter Your headings",
                    },short_description:{
                        required:"Please enter short description",
                    },phone:{
                        required:"please enter mobile number",
                    },image:{
                        required:"Please select image",
                    },email:{
                        required:"Please enter email",
                        email:"Please enter a valid email",
                    }
                }
            })
        }


    </script>
    <script>
        var loadFileTeacher = function(event) {
            var output = document.getElementById('outputTeacher');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
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
                                url:"trash/"+emp_id,
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
