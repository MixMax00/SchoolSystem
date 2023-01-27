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


        </div>
        <div class="card-body">
            <div class="">
                <form id="contact_form" method="post" action="{{ route('teacher.create.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="teacherName">Teacher Name <span style="color: red;">*</span></label>
                                <input type="text" name="name" id="teacherName" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="designation">Designation <span style="color: red;">*</span></label>
                                <input type="text" name="designation" id="designation" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="dob">Birthday <span style="color: red;">*</span></label>
                                <input type="date" name="dob" id="dob" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="dob">Gender <span style="color: red;">*</span></label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">--Select Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                   <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="qualification">Address <span style="color: red;">*</span></label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="">
                        </div>
                    </div>
                   </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="qualification">Qualification <span style="color: red;">*</span></label>
                                <input type="text" name="qualification" id="qualification" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="qualification">Phone <span style="color: red;">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="salary">Salary <span style="color: red;">*</span></label>
                                <input type="text" name="salary" id="phone" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="qualification">Email <span style="color: red;">*</span></label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="qualification">Password <span style="color: red;">*</span></label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="subject">Department <span style="color: red;">*</span></label>
                                <input type="text" name="department" id="department" class="form-control" placeholder="">
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
                                        <input type="text" class="form-control" name="fb" >
                                    </div>
                                    <div class="col-lg-4 col-sm-12 ">
                                        <label>Twitter</label>
                                        <input type="text" class="form-control" name="twitter" >
                                    </div>
                                    <div class="col-lg-4 col-sm-12 ">
                                        <label>Linkden</label>
                                        <input type="text" class="form-control" name="linkden" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="teacherImage">Image <span style="color: red;">*</span></label>
                                <input type="file" class="form-control" name="image"  onchange="loadFileTeacher(event)" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <img src="{{asset('assets/backend/img/default.jpg')}}" id="outputTeacher" alt="" width="150px" height="150px" >
                            </div>
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                        </div>
                   </div>

                </form>
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
                    name: {
                        required:true,
                    },designation:{
                        required:true,
                    },dob:{
                        required:true,
                    },gender:{
                        required:true,
                    },address:{
                        required:true,

                    },qualification:{
                        required:true,
                    },password:{
                        required:true,
                    },department:{
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
                    name: {
                        required:"Please Enter Teacher Name",
                    },designation:{
                        required:"Please Enter Designation",
                    },dob:{
                        required:"Please Enter Date of Birth",
                    },gender:{
                        required:"Please Enter Gender",
                    },address:{
                        required:"Please Enter Address",

                    },qualification:{
                        required:"Please Enter Qualification",
                    },password:{
                        required:"Please Enter Password",
                    },department:{
                        required:"Please Enter Department",

                    },phone:{
                        required:"Please Enter Phone",
                    },image:{
                        required:"Please Enter Image",
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
