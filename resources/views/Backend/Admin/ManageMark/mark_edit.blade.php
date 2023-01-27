@extends('Backend.Admin.master')

@section('title')
    Daily Attendance
@endsection


@php
    $classes = \App\Models\Classes::all();
    $sessions = \App\Models\SessionYear::all();
    $exam_lists = \App\Models\ExamList::all();
    $sections = \App\Models\Section::find($section);
    $subject_lists = \App\Models\Subject::where('class_id',$rqclass_name)->get();
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
            Mark Edit
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.manageMark.getMark') }}" method="GET">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="form-group-lable">Session</label>
                                    <select name="session" id="sessionId" class="form-control">
                                        <option selected>--- select session ---</option>
                                           @foreach ($sessions as $session)
                                                <option  value="{{ $session->session }}">{{ $session->session }}</option>
                                           @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="form-group-lable">Class</label>
                                    <select name="class_name" id="className" class="form-control className">
                                        <option selected>--- select class ---</option>
                                           @foreach ($classes as $class)
                                                <option  value="{{ $class->id }}">{{ $class->class_name }}</option>
                                           @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="form-group-lable">Section</label>
                                    <select name="section" id="sectionId" class="form-control sectionId">

                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="form-group-lable">Exam Name</label>
                                    <select name="exam_name" id="" class="form-control">
                                        @foreach ($exam_lists as $exam)
                                            <option  value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="form-group-lable">Subject Name</label>
                                    <select name="subject_name" id="" class="form-control">
                                        @foreach ($subject_lists as $sub)
                                            <option  value="{{ $sub->id }}">{{ $sub->sub_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="form-group-lable">Class Roll</label>
                                    <input type="text" name="class_roll" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="card">
                                   <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <div class="form-group">
                                                <input type="submit" value="Edit Mark" class="fw-btn-fill btn-gradient-yellow">
                                            </div>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action="{{ route('admin.manageMark.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="card">
                                   <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <p class="pr-5 text-warning text-center fs-4">Class : <span  id="currentClass"></span></p>
                                            <p class="pr-5 text-warning text-center fs-4">Section :<span  id="currentSection"></span></p>
                                            <p class="text-warning text-center fs-4">Exam : <span  id="currentExam"></span></p>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Roll</th>
                                            <th>Name</th>
                                            <th>Theory</th>
                                            <th>MCQ</th>
                                            <th>Practical</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">



                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" name="stu_roll" value="{{ $exam_mark->roll }}" class="form-control" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">

                                                            <input type="hidden" name="exam" value=" {{ $rqeaxm_name }}" class="form-control" readonly>
                                                            <input type="hidden" name="id" value="{{ $exam_mark->id }}" class="form-control" readonly>
                                                            <input type="hidden" name="student_id" value="{{ $exam_mark->student_id }}" class="form-control" readonly>
                                                            <input type="text" name="student_name" value="{{ $exam_mark->stu_name }}" class="form-control" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" name="theory" value="{{ $exam_mark->theory }}" class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" name="mcq" value="{{ $exam_mark->mcq }}" class="form-control">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" name="practical" value="{{  $exam_mark->practical }}" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-1-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                <input type="submit" value="Save" class="fw-btn-fill btn-gradient-yellow">
                            </div>

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


        $(document).ready(function(){

            $("#currentClass").html("{{ $rqclass_name }}");
            $("#currentSection").html("{{ $sections->section_name }}");
            $("#currentExam").html("{{ $rqeaxm_name }}");

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


        $(document).ready(function(){
            $('#className').change(function(){
                let classId = $(this).val();
                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.dailyAttendance.classSection') }}",
                    data:{
                        class_id : classId,
                    },
                    success:function(data) {
                        let td = '';
                        $.each(data, function(key, value){
                            td += "<option value="+value.id+">"+value.section_name+"</option>";
                        });
                        $("#sectionId").html(td);


                    }
                });
            });

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
