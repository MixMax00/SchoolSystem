@extends('Backend.Admin.master')

@section('title')
    Edit Class Routine
@endsection

@php
    $classes = \App\Models\Classes::all();
    $teachers = \App\Models\Teacher::all();
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
            Edit Class Routine
            <a href="{{ route('admin.classRoutine') }}" class="btn btn-primary float-right"><i class="fa fa-eye mr-2"></i><span>View Routine</span></a>

        </div>
        <div class="card-body">
            <form id="class_form" method="post" action="{{ route('admin.classRoutine.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="className">Class Name</label>
                    <input type="hidden" name="id" value="{{ $edit->id }}">
                    <select name="class_name" id="className" class="form-control">
                        <option selected> -- select class --</option>
                        @foreach ($classes as $class)
                            <option {{ $edit->class_name == $class->id ? 'selected' : ' ' }} value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="groupSection">
                    <label for="classGroup">Section/Group</label>
                    <select name="section" id="classGroup" class="form-control">
                        <option value="{{ $edit->section }}">{{ $edit->sections->section_name }}</option>

                    </select>
                </div>
                <div class="form-group" id="">
                    <label for="classSubject">Subject</label>
                    <select name="subject" id="classSubject" class="form-control">
                        <option value="{{ $edit->subject }}">{{ $edit->subjects->sub_name }}</option>
                    </select>
                </div>
                <div class="form-group" id="subTeacher">
                    <label for="">Teacher</label>
                    <input type="text" name="teacher" value="{{ $edit->teacher }}" class='form-control' readonly>
                </div>
                <div class="form-group">
                    <label for="tradeCode">Day</label>
                    <select class="form-control" name="day">
                        <option selected>-- select day --</option>
                        <option {{ $edit->day == "Saturday" ? 'selected' : ' ' }} value="Saturday">Saturday</option>
                        <option {{ $edit->day == "Sunday" ? 'selected' : ' ' }} value="Sunday">Sunday</option>
                        <option {{ $edit->day == "Monday" ? 'selected' : ' ' }} value="Monday">Monday</option>
                        <option {{ $edit->day == "Tuesday" ? 'selected' : ' ' }} value="Tuesday">Tuesday</option>
                        <option {{ $edit->day == "Wednesday" ? 'selected' : ' ' }} value="Wednesday">Wednesday</option>
                        <option {{ $edit->day == "Thursday" ? 'selected' : ' ' }} value="Thursday">Thursday</option>
                    </select>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12">
                        <h6>Starting Time</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tradeCode">Hour</label>
                            <select class="form-control" name="starting_hour">
                                <option selected>-- select hour --</option>
                                @for ($i = 0; $i <= 12  ; $i++)
                                    <option {{ $edit->starting_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tradeCode">Minutes</label>
                            <select class="form-control" name="starting_minute">
                                <option selected>-- select minutes --</option>
                                @for ($i = 0; $i <= 60  ; $i++)
                                    <option {{ $edit->starting_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tradeCode">AM/PM</label>
                            <select class="form-control" name="starting">
                                <option selected>-- select am/pm --</option>
                                <option {{ $edit->starting == "AM" ? "selected" : ''}} value="AM">AM</option>
                                <option {{ $edit->starting == "PM" ? "selected" : ''}} value="PM">PM</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12">
                        <h6>Ending Time</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tradeCode">Hour</label>
                            <select class="form-control" name="ending_hour">
                                <option selected>-- select hour --</option>
                                @for ($i = 0; $i <= 12  ; $i++)
                                    <option {{ $edit->ending_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tradeCode">Minutes</label>
                            <select class="form-control" name="ending_minute">
                                <option selected>-- select minutes --</option>
                                @for ($i = 0; $i <= 60  ; $i++)
                                    <option {{ $edit->ending_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tradeCode">AM/PM</label>
                            <select class="form-control" name="ending">
                                <option selected>-- select am/pm --</option>
                                <option {{ $edit->ending == "AM" ? "selected" : ''}} value="AM">AM</option>
                                <option {{ $edit->ending == "PM" ? "selected" : ''}} value="PM">PM</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-12 form-group mg-t-8">
                    <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Update Routine">
                </div>
            </form>
        </div>
    </div>
@endsection


@section('js')

    <script>


        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#className').change(function(){
                $('#groupSection').show();
                let className = $(this).val();

                $.ajax({
                    type:'POST',
                    url:"{{ route('admin.classRoutine.group') }}",
                    data: {class_id: className},
                    success:function(data){
                        if(!data){
                            $('#groupSection').hide();
                        }else{
                            $('#classGroup').html(data);
                        }

                    }
                });

                $.ajax({
                    type:'POST',
                    url:"{{ route('admin.classRoutine.subject') }}",
                    data: {subject_id: className},
                    success:function(res){
                        $('#classSubject').html(res);
                    }
                });
            });

            $("#classSubject").change(function(){
                let subjectId = $(this).val();
                $.ajax({
                    type:'POST',
                    url:"{{ route('admin.classRoutine.teacher') }}",
                    data: {sub_id: subjectId},
                    success:function(res){

                        var fieldTeacher = "<label for='''>Teacher</label><input type='text' name='teacher' value='"+res.name+"' class='form-control' readonly>"
                        $('#subTeacher').html(fieldTeacher);
                    }
                });
            });

        });
    </script>

@endsection
