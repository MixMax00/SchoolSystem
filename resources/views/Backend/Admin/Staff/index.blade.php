@extends('Backend.Admin.master')
@section('title')
    Staff
@endsection


@php
    $staffs = \App\Models\StaffManage::all();
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
                    <h3> Staff</h3>
                </div>
                <div class="dropdown">
                    @if(auth()->user()->hasPermission('app.teacher.create'))
                    <a href="" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Add Staff</a>
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($staffs as $staff)
                        <tr>
                            <td>
                                {{ $loop->index +1}}
                            </td>
                            <td>
                                @if($staff->image)
                                    <img src="{{asset($staff->image)}}" alt="" width="100px" height="100px">
                                @else
                                    <img src="{{asset('assets/backend/img/default.jpg')}}" alt="" width="100px" height="100px">
                                @endif
                            </td>
                            <td>{{ $staff->name }}</td>
                            <td>{{ $staff->phone }}</td>
                            <td>{{ $staff->salary }}</td>
                            <td>
                                @if(auth()->user()->hasPermission('app.teacher.create'))
                                <a href="" class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter_{{ $staff->id  }}"><i class="fas fa-edit text-secondery"></i></a>
                                <a class="dropdown-item" href="{{ route('admin.staff.status', ["id"=>$staff->id]) }}" ><i class="fas fa-arrow-{{  $staff->status == 1 ? "circle-up" : "circle-down" }}"></i></a>


                                <button class="dropdown-item delete_btn " value="{{$staff->id}}" id="delete" ><i class="fas fa-trash text-danger "></i></button>
                                @endif
            </div>
        </div>
        <script>
            var loadFile_{{$staff->id}} = function(event) {
                var output = document.getElementById('output_{{$staff->id}}');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output_{{$staff->id}}.src) // free memory
                }
            };
        </script>
        </td>
        </tr>


        <div class="modal fade" id="exampleModalCenter_{{ $staff->id  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="" method="post" action="{{ route('admin.staff.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                <label for="teacherName"> Name</label>
                                <input type="hidden" name="id" id="teacherName" class="form-control" value="{{ $staff->id }}">
                                <input type="text" name="name" id="teacherName" class="form-control" value="{{ $staff->name }}">
                            </div>

                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                <label for="dob">Birthday</label>
                                <input type="date" name="dob" id="dob" class="form-control" value="{{ $staff->dob }}">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                <label for="dob">Gender</label>
                                <select name="gender" id="" class="form-control">
                                    <option selected>--Select Gender--</option>
                                    <option {{ $staff->gender == "male" ? "selected" : " " }} value="male">Male</option>
                                    <option {{ $staff->gender == "female" ? "selected" : " " }} value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                <label for="qualification">Address</label>
                                <input type="text" name="address" id="qualification" class="form-control" value="{{ $staff->address }}">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                <label for="qualification">Qualification</label>
                                <input type="text" name="qualification" id="qualification" class="form-control" value="{{ $staff->qualification }}">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                <label for="qualification">Phone</label>
                                <input type="text" name="phone" id="qualification" class="form-control" value="{{ $staff->phone }}">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                <label for="salary">Salary</label>
                                <input type="text" name="salary" id="qualification" value="{{ $staff->salary }}" class="form-control" placeholder="">
                            </div>
                            {{-- <div class="col-xl-12 col-lg-12 col-12 form-group">
                                <label for="qualification">Password</label>
                                <input type="text" name="password" id="qualification" class="form-control" placeholder="">
                            </div> --}}
                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                <label for="subject">Department</label>
                                <input type="text" name="department" id="subject" class="form-control" value="{{ $staff->department }}">
                            </div>



                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                <label for="teacherImage">Image</label>
                                <input type="file" class="form-control" name="image"  onchange="loadFileTeacher(event)" />
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                <img src="{{asset($staff->image)}}" id="outputTeacher" alt="" width="150px" height="150px" >
                            </div>
                            <div class="col-xl-2 col-lg-3 col-12 form-group">
                                <button type="submit" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark">Update</button>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="contact_form" method="post" action="{{ route('admin.staff.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <label for="teacherName"> Name</label>
                            <input type="text" name="name" id="teacherName" class="form-control" placeholder="">
                        </div>

                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <label for="dob">Birthday</label>
                            <input type="date" name="dob" id="dob" class="form-control" placeholder="">
                        </div>
                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <label for="dob">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">--Select Gender--</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <label for="qualification">Address</label>
                            <input type="text" name="address" id="qualification" class="form-control" placeholder="">
                        </div>
                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <label for="qualification">Qualification</label>
                            <input type="text" name="qualification" id="qualification" class="form-control" placeholder="">
                        </div>
                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <label for="qualification">Phone</label>
                            <input type="text" name="phone" id="qualification" class="form-control" placeholder="">
                        </div>

                        {{-- <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <label for="qualification">Email</label>
                            <input type="text" name="email" id="qualification" class="form-control" placeholder="">
                        </div>
                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <label for="qualification">Password</label>
                            <input type="text" name="password" id="qualification" class="form-control" placeholder="">
                        </div> --}}
                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <label for="subject">Department</label>
                            <input type="text" name="department" id="subject" class="form-control" placeholder="">
                        </div>

                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <label for="subject">Salary</label>
                            <input type="text" name="salary" id="subject" class="form-control" placeholder="">
                        </div>

                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <label for="teacherImage">Image</label>
                            <input type="file" class="form-control" name="image"  onchange="loadFileTeacher(event)" />
                        </div>
                        <div class="col-xl-12 col-lg-12 col-12 form-group">
                            <img src="{{asset('assets/backend/img/default.jpg')}}" id="outputTeacher" alt="" width="150px" height="150px" >
                        </div>
                        <div class="col-xl-2 col-lg-3 col-12 form-group">
                            <button type="submit" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark">Save</button>
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

                },
                messages:{

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
                                url:"delete/staff/"+emp_id,
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
