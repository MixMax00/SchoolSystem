@extends('Backend.Admin.master')

@section('title')
    Add Class Routine
@endsection

@php
    $classes = \App\Models\Classes::all();
    $teachers = \App\Models\Teacher::all();
@endphp

@section('css')

    <style>
       .form-control{
            padding-right: 21px !important;
        }
    </style>

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
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Add Class Routine</h3>
                </div>
                <div class="dropdown">
                    @if(auth()->user()->hasPermission('app.classroutine.create'))
                    <a href="{{ route('admin.classRoutine') }}" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark"><i
                            class="fa fa-eye mr-2"></i><span>View Class Routine</span></a>
                    @endif
                </div>
            </div>
            <form class="new-added-form" id="class_routine_form" method="post" action="{{ route('admin.classRoutine.save') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-12-xxxl col-lg-12 col-12 form-group">
                    <label for="className">Class Name</label>
                    <select name="class_name" id="className" class="form-control">
                        <option selected> -- select class --</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12-xxxl col-lg-12 col-12 form-group" id="groupSection">
                    <label for="classGroup">Section/Group</label>
                    <select name="section" id="classGroup" class="form-control">
                        <option selected>-- select section --</option>
                    </select>
                </div>
                <div class="col-12-xxxl col-lg-12 col-12 form-group" id="">
                    <label for="classSubject">Subject</label>
                    <select name="subject" id="classSubject" class="form-control">
                        <option selected>-- select subject --</option>
                    </select>
                </div>
                <div class="col-12-xxxl col-lg-12 col-12 form-group" id="subTeacher">

                </div>
                <div class="col-12-xxxl col-lg-12 col-12 form-group">
                    <label for="tradeCode">Day</label>
                    <select class="form-control" name="day">
                        <option selected>-- select day --</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                    </select>
                </div>

                <div class="col-12-xxxl col-lg-12 col-12 form-group" id="">
                        <h6>Starting Time</h6>
                </div>


                <div class="col-12-xxxl col-lg-12 col-12 form-group" id="">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tradeCode">Hour</label>
                                <select class="select2" name="starting_hour">
                                    <option selected>-- select hour --</option>
                                    @for ($i = 0; $i <= 12  ; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tradeCode">Minutes</label>
                                <select class="select2" name="starting_minute">
                                    <option selected>-- select minutes --</option>
                                    @for ($i = 0; $i <= 60  ; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tradeCode">AM/PM</label>
                                <select class="select2" name="starting">
                                    <option selected>-- select am/pm --</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12-xxxl col-lg-12 col-12 form-group" id="subTeacher">
                    <h6>Ending Time</h6>
                </div>
                <div class="col-12-xxxl col-lg-12 col-12 form-group" id="subTeacher">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tradeCode">Hour</label>
                                <select class="select2" name="ending_hour">
                                    <option selected>-- select hour --</option>
                                    @for ($i = 0; $i <= 12  ; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tradeCode">Minutes</label>
                                <select class="select2" name="ending_minute">
                                    <option selected>-- select minutes --</option>
                                    @for ($i = 0; $i <= 60  ; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tradeCode">AM/PM</label>
                                <select class="select2" name="ending">
                                    <option selected>-- select am/pm --</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-12 form-group mg-t-8">
                    <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Add Routine">
                </div>
            </form>
        </div>
    </div>
@endsection


@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
    integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    if ($('#class_routine_form').length > 0) {
        $('#class_routine_form').validate({
            rules: {
                class_name: {
                    required: true,
                },
                starting_minute: {
                    required: true,
                },

            },
            messages: {
                class_name: {
                    required: "Please select class name",
                },
                starting_minute: {
                    required: "Please select string time",
                }
            }
        })
    }
    </script>

    <script>


        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#groupSection').hide();
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
