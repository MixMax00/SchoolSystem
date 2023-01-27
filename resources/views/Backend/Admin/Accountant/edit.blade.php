@extends('Backend.Admin.master')
@section('title')
    Edit Accountant
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
           Edit Accountant
            <a href="{{ route('admin.accountant.index') }}" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus "></i></a>

        </div>
        <div class="card-body">
            <div class="">
                <form id="contact_form" method="post" action="{{ route('admin.accountant.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="teacherName">Accountant Name</label>
                                <input type="hidden" name="id"  value="{{ $edit->id }}">
                                <input type="text" name="name" id="teacherName" value="{{ $edit->name }}"  class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text" name="designation" value="{{ $edit->designation }}"  id="designation" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="dob">Birthday</label>
                                <input type="date" name="dob" id="dob" value="{{ $edit->dob }}" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="dob">Gender</label>
                                <select name="gender" id="" class="form-control">
                                    <option value="">--Select Gender--</option>
                                    <option {{ $edit->gender == "male" ? "selected" : "" }} value="male">Male</option>
                                    <option {{ $edit->gender == "female" ? "selected" : "" }} value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                   <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label for="qualification">Address</label>
                            <input type="text" name="address" value="{{ $edit->address }}" id="qualification" class="form-control" placeholder="">
                        </div>
                    </div>
                   </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="qualification">Qualification</label>
                                <input type="text" name="qualification" value="{{ $edit->qualification }}" id="qualification" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="qualification">Phone</label>
                                <input type="text" name="phone" value="{{ $edit->phone }}" id="qualification" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label for="salary">Salary</label>
                            <input type="text" name="salary" id="qualification" value="{{ $edit->salary }}" class="form-control" placeholder="">
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="qualification">Email</label>
                                <input type="text" name="email" value="{{ $edit->email }}" id="qualification" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="qualification">Password</label>
                                <input type="text" name="password" id="qualification" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="subject">Department</label>
                                <input type="text" name="department" value="{{ $edit->department }}" id="subject" class="form-control" placeholder="">
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
                                        <input type="text" class="form-control" name="fb" value="{{ $edit->fb }}">
                                    </div>
                                    <div class="col-lg-4 col-sm-12 ">
                                        <label>Twitter</label>
                                        <input type="text" class="form-control" name="twitter" value="{{ $edit->twitter }}">
                                    </div>
                                    <div class="col-lg-4 col-sm-12 ">
                                        <label>Linkden</label>
                                        <input type="text" class="form-control" name="linkden" value="{{ $edit->linkden }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="teacherImage">Image</label>
                                <input type="file" class="form-control" name="image"  onchange="loadFileTeacher(event)" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <img src="{{  isset($edit->image) ? asset($edit->image)  : asset('assets/backend/img/default.jpg')}}" id="outputTeacher" alt="" width="150px" height="150px" >
                            </div>
                        </div>
                    </div>
                   <div class="row">
                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                        <button type="submit" class="fw-btn-fill btn-gradient-yellow">Update</button>
                    </div>
                   </div>

                </form>
            </div>
        </div>
    </div>

@endsection



@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script>
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


    </script> --}}
    <script>
        var loadFileTeacher = function(event) {
            var output = document.getElementById('outputTeacher');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>




@endsection
