@extends('Backend.Admin.master')
@section('title')
    Add New Student Fee
@endsection


@php
    $sessions = \App\Models\SessionYear::all();
    $classes  = \App\Models\Classes::all();
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
        <!-- Add Expense Area Start Here -->
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Add New Student Fee</h3>
                    </div>
                   <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-expanded="false">...</a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </div>
                <form class="new-added-form" action="{{ route('admin.accountingStudent.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Session *</label>
                            <select name="session" class="form-control" id="sessionId">
                                <option value="">Please Select</option>
                                @foreach ($sessions as $session)
                                    <option {{ $session->session == $session->last ? 'selected' : ''  }} value="{{ $session->session }}">{{ $session->session }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Class *</label>
                            <select name="class" class="form-control" id="classId">
                                <option value="">Please Select</option>
                                @foreach ($classes as $class)
                                    <option {{ $class->id == $class->last ? 'selected' : ''  }} value="{{ $class->id }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Name *</label>
                            <select name="stu_roll" class="form-control" id="studentId">
                                <option value="">Please Select</option>

                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Amount *</label>
                            <input name="amount" type="text" placeholder="" class="form-control">
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Fee Type</label>
                            <select name="fee_type" class="form-control">
                                <option selected>Please Select</option>
                                <option value="1">Exam Fee</option>
                                <option value="2">Tution Fee</option>
                                <option value="3">Semister Fee</option>
                                <option value="4">Course Fee</option>
                                <option value="5">Class Test Fee</option>
                                <option value="6">Monthly Fee</option>
                                <option value="7">Yearly Fee</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="0">Please Select</option>
                                <option value="1">Paid</option>
                                <option value="2">Due</option>
                                <option value="3">Others</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Date</label>
                            <input name="date" type="date" placeholder="dd/mm/yy" class="form-control air-datepicker" data-position="bottom right">
                        </div>
                        <div class="col-12 form-group mg-t-8">
                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create Invoice</button>
                        </div>
                    </div>
                </form>
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


    <script>
        $(document).ready(function(){
            $("#classId").change(function(){
                let className = $(this).val();
                let session = $("#sessionId").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.StudentFeeController.getStudent') }}",
                    data:{
                        session_year : session,
                        class_id : className,
                    },
                    success:function(data) {
                        $("#studentId").html(data);
                    }
                });
            });
        });
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



