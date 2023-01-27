@extends('Backend.Admin.master')
@section('title')
    Class Routine
@endsection


@section('css')


    <style>


        .rs-active{
            background: #0B5782;
        }

        .card-routine{
            border-radius: 15px;
        }
        .card-header-bg{
            padding: 10px 0px;
            /* background: var(--main-color); */
            background: #0B5782;
            justify-content: center;
            align-items: center;
            line-height: 15px;
            text-align: center;
            /* color: var(--white-color); */
            color: #ffffff;
        }

        .card-header-bg h3{
            font-weight: 500;
            font-size: 4rem !important;
            color: #ffffff !important;
        }

        .card-header-bg p{
            font-weight: 400;
            font-size: 2.5rem !important;
            color: #ffffff !important;
        }
        .card-body-bg{
            /* background-color: var(--primary-color); */
            background: #116DA1;
        }

        .box-warper{
            display: flex;
            flex-direction: row;
            /* float: left; */
            /* color: var(--white-color); */
            color: #ffffff;
        }


        .box-warper .box{
            width: 169px;
            height: 80px;
            margin: 10px 15px;
            border-radius: 12px;

        }
        .box-clr-dark{
            background-color: #222222;
        }
        .box-clr-dark p{
            padding: 5px;
            color: #ffffff !important;
        }
        .box-clr{
            /* background-color: var(--button-color); */
            background: #FF5E3F;
        }

        .box-clr p{
            color: #ffffff !important;
        }

        .box-warper .box p{
            padding-top: 20px;
            font-size: 20px;
            font-weight: 400;
            /* line-height: 38.73px; */
            text-align: center;
            justify-content: center;
            align-items: center;

        }


        .box-warper .box-sub{
            width: 169px;
            height: 100px;
            margin: 10px 15px;
            padding: 5px 1px;
            border-radius: 12px;
            text-align: center;
            justify-content: center;
            align-items: center;
            color: #222222;
            line-height: 0px;
            padding-top: 10px;
        }
        .box-warper .box-sub i{
            margin-bottom: 13px;
        }

        .box-warper .box-sub p{
            font-size: 13px;
            font-weight: 300;

        }
        .box-warper .box-sub .p{
            font-size: 10px;
            font-weight: 300;
        }
        .box-warper .box-sub span{
            font-size: 10px;
            font-weight: 300;
            margin-top: -20px !important;
        }

        .box-warper .box-clr-time{

            background-color: #2D2B4D;
            color: #ffffff  !important;
        }
        .box-warper .box-clr-time p{
            font-size: 20px;
            color: #ffffff  !important;
            padding-top: 40px !important;
        }

        .box-warper .box-clr-sub{
            background-color: #ffffff;
        }

    </style>

@endsection


@php
    $classes = \App\Models\Classes::all();
    $sections = \App\Models\Section::where('class_id', $class->id)->get();
    $teachers = \App\Models\Teacher::all();
@endphp


@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>@yield('title')</h3>
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li>@yield('title')</li>
        </ul>
    </div>

    <!-- Breadcubs Area End Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Class Routine</h3>
                </div>
                <div class="dropdown">
                    @if(auth()->user()->hasPermission('app.classroutine.create'))
                    <a href="{{ route('admin.classRoutine.create') }}" class="btn-fill-sm btn-gradient-yellow btn-hover-bluedark"><i
                            class="fa fa-plus mr-2"></i><span>Add Class Routine</span></a>
                    @endif
                </div>
            </div>
            <div class="basic-tab">
                @include('Backend.Admin.ClassRoutine.Partials.navbar')


                @foreach ($sections as $section)

                                    {{-- NEW DESIGN CLASS RUTINE START --}}



                                    <div class="row mb-4">
                                        <div class="col-lg-12">
                                            <div class="card-routine">
                                                <div class="card-header-bg">
                                                    <h3>Class Routine</h3>
                                                    <p>{{ $class->class_name }}</p>
                                                    <p>Section {{ $section->section_name }}</p>
                                                </div>
                                                <div class="card-body-bg">
                                                    <div class="box-warper">
                                                        <div class="box box-clr-dark">
                                                            <p>Day/Period</p>
                                                        </div>
                                                        <div class="box box-clr">
                                                            <p>1st Period</p>
                                                        </div>
                                                        <div class="box box-clr">
                                                            <p>2nd Period</p>
                                                        </div>
                                                        <div class="box box-clr">
                                                            <p>3rd Period</p>
                                                        </div>
                                                        <div class="box box-clr">
                                                            <p> 4th Period</p>
                                                        </div>
                                                        <div class="box box-clr">
                                                            <p>5th Period</p>
                                                        </div>
                                                        <div class="box box-clr">
                                                            <p>6th Period</p>
                                                        </div>
                                                    </div>
                                                    <div class="box-warper">
                                                        <div class="box-sub box-clr-time">
                                                            {{-- <i class="fas fa-edit"></i> --}}
                                                            <p>Saturday</p>
                                                        </div>
                                                        @foreach ($all_subject as $sat)
                                                            @if ($section->id == $sat->section)
                                                                @if ($sat->day == 'Saturday')


                                                                <div class="box-sub box-clr-sub">
                                                                    <i class="fas fa-edit"  data-toggle="modal" data-target="#classRoutine_day_{{ $sat->id }}"></i>
                                                                    <p>{{ Str::limit($sat->subjects->sub_name, '12', '...') }}</p>
                                                                    <p class="p">
                                                                       {{ $sat->starting_hour }}
                                                                        :
                                                                        {{ $sat->starting_minute }}
                                                                        {{ $sat->starting  }}
                                                                        -
                                                                        {{ $sat->ending_hour }}
                                                                        :
                                                                        {{ $sat->ending_minute }}
                                                                        {{ $sat->ending }}
                                                                    </p>
                                                                    <p class="p">{{ $sun->teacher ?? '' }}</p>
                                                                </div>



                                                                <div class="modal fade" id="classRoutine_day_{{ $sat->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Routine</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form id="class_form" method="post" action="{{ route('admin.classRoutine.update') }}" enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <div class="row">
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <label for="className" class="text-dark">Class Name</label>
                                                                                            <input type="hidden" name="id" value="{{ $sat->id }}">
                                                                                            <select name="class_name" id="className" class="form-control">
                                                                                                <option selected> -- select class --</option>
                                                                                                @foreach ($classes as $class)
                                                                                                    <option {{ $sat->class_name == $class->id ? 'selected' : ' ' }} value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="groupSection">
                                                                                            <label for="classGroup" class="text-dark">Section/Group</label>
                                                                                            <select name="section" id="classGroup" class="form-control">
                                                                                                <option value="{{ $sat->section }}">{{ $sat->sections->section_name }}</option>

                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="">
                                                                                            <label for="classSubject" class="text-dark">Subject</label>
                                                                                            <select name="subject" id="classSubject" class="form-control">
                                                                                                <option value="{{ $sat->subject }}">{{ $sat->subjects->sub_name }}</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="subTeacher">
                                                                                            <label for="" class="text-dark">Teacher</label>
                                                                                            <input type="text" name="teacher" value="{{ $sat->teacher }}" class='form-control' readonly>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <label for="tradeCode" class="text-dark">Day</label>
                                                                                            <select class="select2" name="day">
                                                                                                <option selected>-- select day --</option>
                                                                                                <option {{ $sat->day == "Saturday" ? 'selected' : ' ' }} value="Saturday">Saturday</option>
                                                                                                <option {{ $sat->day == "Sunday" ? 'selected' : ' ' }} value="Sunday">Sunday</option>
                                                                                                <option {{ $sat->day == "Monday" ? 'selected' : ' ' }} value="Monday">Monday</option>
                                                                                                <option {{ $sat->day == "Tuesday" ? 'selected' : ' ' }} value="Tuesday">Tuesday</option>
                                                                                                <option {{ $sat->day == "Wednesday" ? 'selected' : ' ' }} value="Wednesday">Wednesday</option>
                                                                                                <option {{ $sat->day == "Thursday" ? 'selected' : ' ' }} value="Thursday">Thursday</option>
                                                                                            </select>
                                                                                        </div>


                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group mt-4">
                                                                                            <h6>Starting Time</h6>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                    <label for="tradeCode" class="text-dark">Hour</label>
                                                                                                    <select class="select2" name="starting_hour">
                                                                                                        <option selected>-- select hour --</option>
                                                                                                        @for ($i = 0; $i <= 12  ; $i++)
                                                                                                            <option {{ $sat->starting_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                        @endfor
                                                                                                    </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">Minutes</label>
                                                                                                        <select class="select2" name="starting_minute">
                                                                                                            <option selected>-- select minutes --</option>
                                                                                                            @for ($i = 0; $i <= 60  ; $i++)
                                                                                                                <option {{ $sat->starting_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                            @endfor
                                                                                                        </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">
                                                                                                    <div class="form-group">
                                                                                                        <label for="tradeCode" class="text-dark">AM/PM</label>
                                                                                                        <select class="select2" name="starting">
                                                                                                            <option selected>-- select am/pm --</option>
                                                                                                            <option {{ $sat->starting == "AM" ? "selected" : ''}} value="AM">AM</option>
                                                                                                            <option {{ $sat->starting == "PM" ? "selected" : ''}} value="PM">PM</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>




                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group mt-4">
                                                                                            <h6>Ending Time</h6>
                                                                                        </div>



                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                    <label for="tradeCode" class="text-dark">Hour</label>
                                                                                                    <select class="select2" name="ending_hour">
                                                                                                        <option selected>-- select hour --</option>
                                                                                                        @for ($i = 0; $i <= 12  ; $i++)
                                                                                                            <option {{ $sat->ending_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                        @endfor
                                                                                                    </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">Minutes</label>
                                                                                                        <select class="select2" name="ending_minute">
                                                                                                            <option selected>-- select minutes --</option>
                                                                                                            @for ($i = 0; $i <= 60  ; $i++)
                                                                                                                <option {{ $sat->ending_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                            @endfor
                                                                                                        </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">AM/PM</label>
                                                                                                        <select class="select2" name="ending">
                                                                                                            <option selected>-- select am/pm --</option>
                                                                                                            <option {{ $sat->ending == "AM" ? "selected" : ''}} value="AM">AM</option>
                                                                                                            <option {{ $sat->ending == "PM" ? "selected" : ''}} value="PM">PM</option>
                                                                                                        </select>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 form-group mg-t-8">
                                                                                            <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Update Routine">
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>

                                                    {{-- // SUNDAY --}}

                                                    <div class="box-warper">
                                                        <div class="box-sub box-clr-time">
                                                            {{-- <i class="fas fa-edit"></i> --}}
                                                            <p>Sunday</p>
                                                        </div>
                                                        @foreach ($all_subject as $sun)
                                                            @if ($section->id == $sun->section)
                                                                @if ($sun->day == 'Sunday')


                                                                <div class="box-sub box-clr-sub">
                                                                    <i class="fas fa-edit" data-toggle="modal" data-target="#classRoutine_day_{{ $sun->id }}"></i>
                                                                    <p>{{ $sun->subjects->sub_name }}</p>
                                                                    <p class="p">
                                                                       {{ $sun->starting_hour }}
                                                                        :
                                                                        {{ $sun->starting_minute }}
                                                                        {{ $sun->starting  }}
                                                                        -
                                                                        {{ $sun->ending_hour }}
                                                                        :
                                                                        {{ $sun->ending_minute }}
                                                                        {{ $sun->ending }}
                                                                    </p>
                                                                    <p class="p">{{ $sun->teacher ?? '' }}</p>
                                                                </div>

                                                                <div class="modal fade" id="classRoutine_day_{{ $sun->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Routine</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form id="class_form" method="post" action="{{ route('admin.classRoutine.update') }}" enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <div class="row">
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <label for="className" class="text-dark">Class Name</label>
                                                                                            <input type="hidden" name="id" value="{{ $sun->id }}">
                                                                                            <select name="class_name" id="className" class="form-control">
                                                                                                <option selected> -- select class --</option>
                                                                                                @foreach ($classes as $class)
                                                                                                    <option {{ $sun->class_name == $class->id ? 'selected' : ' ' }} value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="groupSection">
                                                                                            <label for="classGroup" class="text-dark">Section/Group</label>
                                                                                            <select name="section" id="classGroup" class="form-control">
                                                                                                <option value="{{ $sun->section }}">{{ $sun->sections->section_name }}</option>

                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="">
                                                                                            <label for="classSubject" class="text-dark">Subject</label>
                                                                                            <select name="subject" id="classSubject" class="form-control">
                                                                                                <option value="{{ $sun->subject }}">{{ $sun->subjects->sub_name }}</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="subTeacher">
                                                                                            <label for="">Teacher</label>
                                                                                            <input type="text" name="teacher" value="{{ $sun->teacher }}" class='form-control' readonly>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <label for="tradeCode" class="text-dark">Day</label>
                                                                                            <select class="select2" name="day">
                                                                                                <option selected>-- select day --</option>
                                                                                                <option {{ $sun->day == "Saturday" ? 'selected' : ' ' }} value="Saturday">Saturday</option>
                                                                                                <option {{ $sun->day == "Sunday" ? 'selected' : ' ' }} value="Sunday">Sunday</option>
                                                                                                <option {{ $sun->day == "Monday" ? 'selected' : ' ' }} value="Monday">Monday</option>
                                                                                                <option {{ $sun->day == "Tuesday" ? 'selected' : ' ' }} value="Tuesday">Tuesday</option>
                                                                                                <option {{ $sun->day == "Wednesday" ? 'selected' : ' ' }} value="Wednesday">Wednesday</option>
                                                                                                <option {{ $sun->day == "Thursday" ? 'selected' : ' ' }} value="Thursday">Thursday</option>
                                                                                            </select>
                                                                                        </div>


                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group mt-4">
                                                                                            <h6 class="text-dark">Starting Time</h6>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                    <label for="tradeCode" class="text-dark">Hour</label>
                                                                                                    <select class="select2" name="starting_hour">
                                                                                                        <option selected>-- select hour --</option>
                                                                                                        @for ($i = 0; $i <= 12  ; $i++)
                                                                                                            <option {{ $sun->starting_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                        @endfor
                                                                                                    </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">Minutes</label>
                                                                                                        <select class="select2" name="starting_minute">
                                                                                                            <option selected>-- select minutes --</option>
                                                                                                            @for ($i = 0; $i <= 60  ; $i++)
                                                                                                                <option {{ $sun->starting_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                            @endfor
                                                                                                        </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">
                                                                                                    <div class="form-group">
                                                                                                        <label for="tradeCode" class="text-dark">AM/PM</label>
                                                                                                        <select class="select2" name="starting">
                                                                                                            <option selected>-- select am/pm --</option>
                                                                                                            <option {{ $sun->starting == "AM" ? "selected" : ''}} value="AM">AM</option>
                                                                                                            <option {{ $sun->starting == "PM" ? "selected" : ''}} value="PM">PM</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>




                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group mt-4">
                                                                                            <h6>Ending Time</h6>
                                                                                        </div>



                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                    <label for="tradeCode" class="text-dark">Hour</label>
                                                                                                    <select class="select2" name="ending_hour">
                                                                                                        <option selected>-- select hour --</option>
                                                                                                        @for ($i = 0; $i <= 12  ; $i++)
                                                                                                            <option {{ $sun->ending_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                        @endfor
                                                                                                    </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">Minutes</label>
                                                                                                        <select class="select2" name="ending_minute">
                                                                                                            <option selected>-- select minutes --</option>
                                                                                                            @for ($i = 0; $i <= 60  ; $i++)
                                                                                                                <option {{ $sun->ending_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                            @endfor
                                                                                                        </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">AM/PM</label>
                                                                                                        <select class="select2" name="ending">
                                                                                                            <option selected>-- select am/pm --</option>
                                                                                                            <option {{ $sun->ending == "AM" ? "selected" : ''}} value="AM">AM</option>
                                                                                                            <option {{ $sun->ending == "PM" ? "selected" : ''}} value="PM">PM</option>
                                                                                                        </select>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 form-group mg-t-8">
                                                                                            <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Update Routine">
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>




                                                    {{-- MONDAY --}}

                                                    <div class="box-warper">
                                                        <div class="box-sub box-clr-time">
                                                            {{-- <i class="fas fa-edit"></i> --}}
                                                            <p>Monday</p>
                                                        </div>
                                                        @foreach ($all_subject as $mon)
                                                            @if ($section->id == $mon->section)
                                                                @if ($mon->day == 'Monday')


                                                                <div class="box-sub box-clr-sub">
                                                                    <i class="fas fa-edit"  data-toggle="modal" data-target="#classRoutine_day_{{ $mon->id }}"></i>
                                                                    <p>{{ Str::limit($mon->subjects->sub_name, '12', '...') }}</p>
                                                                    <p class="p">
                                                                       {{ $mon->starting_hour }}
                                                                        :
                                                                        {{ $mon->starting_minute }}
                                                                        {{ $mon->starting  }}
                                                                        -
                                                                        {{ $mon->ending_hour }}
                                                                        :
                                                                        {{ $mon->ending_minute }}
                                                                        {{ $mon->ending }}
                                                                    </p>
                                                                    <p class="p">{{ $mon->teacher ?? '' }}</p>
                                                                </div>


                                                                <div class="modal fade" id="classRoutine_day_{{ $mon->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Routine</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form id="class_form" method="post" action="{{ route('admin.classRoutine.update') }}" enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <div class="row">
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <label for="className">Class Name</label>
                                                                                            <input type="hidden" name="id" value="{{ $mon->id }}">
                                                                                            <select name="class_name" id="className" class="form-control">
                                                                                                <option selected> -- select class --</option>
                                                                                                @foreach ($classes as $class)
                                                                                                    <option {{ $mon->class_name == $class->id ? 'selected' : ' ' }} value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="groupSection">
                                                                                            <label for="classGroup">Section/Group</label>
                                                                                            <select name="section" id="classGroup" class="form-control">
                                                                                                <option value="{{ $mon->section }}">{{ $mon->sections->section_name }}</option>

                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="">
                                                                                            <label for="classSubject">Subject</label>
                                                                                            <select name="subject" id="classSubject" class="form-control">
                                                                                                <option value="{{ $mon->subject }}">{{ $mon->subjects->sub_name }}</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="subTeacher">
                                                                                            <label for="">Teacher</label>
                                                                                            <input type="text" name="teacher" value="{{ $mon->teacher }}" class='form-control' readonly>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <label for="tradeCode">Day</label>
                                                                                            <select class="select2" name="day">
                                                                                                <option selected>-- select day --</option>
                                                                                                <option {{ $mon->day == "Saturday" ? 'selected' : ' ' }} value="Saturday">Saturday</option>
                                                                                                <option {{ $mon->day == "Sunday" ? 'selected' : ' ' }} value="Sunday">Sunday</option>
                                                                                                <option {{ $mon->day == "Monday" ? 'selected' : ' ' }} value="Monday">Monday</option>
                                                                                                <option {{ $mon->day == "Tuesday" ? 'selected' : ' ' }} value="Tuesday">Tuesday</option>
                                                                                                <option {{ $mon->day == "Wednesday" ? 'selected' : ' ' }} value="Wednesday">Wednesday</option>
                                                                                                <option {{ $mon->day == "Thursday" ? 'selected' : ' ' }} value="Thursday">Thursday</option>
                                                                                            </select>
                                                                                        </div>


                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group mt-4">
                                                                                            <h6>Starting Time</h6>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                    <label for="tradeCode" class="text-dark">Hour</label>
                                                                                                    <select class="select2" name="starting_hour">
                                                                                                        <option selected>-- select hour --</option>
                                                                                                        @for ($i = 0; $i <= 12  ; $i++)
                                                                                                            <option {{ $mon->starting_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                        @endfor
                                                                                                    </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">Minutes</label>
                                                                                                        <select class="select2" name="starting_minute">
                                                                                                            <option selected>-- select minutes --</option>
                                                                                                            @for ($i = 0; $i <= 60  ; $i++)
                                                                                                                <option {{ $mon->starting_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                            @endfor
                                                                                                        </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">
                                                                                                    <div class="form-group">
                                                                                                        <label for="tradeCode" class="text-dark">AM/PM</label>
                                                                                                        <select class="select2" name="starting">
                                                                                                            <option selected>-- select am/pm --</option>
                                                                                                            <option {{ $mon->starting == "AM" ? "selected" : ''}} value="AM">AM</option>
                                                                                                            <option {{ $mon->starting == "PM" ? "selected" : ''}} value="PM">PM</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>




                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group mt-4">
                                                                                            <h6>Ending Time</h6>
                                                                                        </div>



                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                    <label for="tradeCode" class="text-dark">Hour</label>
                                                                                                    <select class="select2" name="ending_hour">
                                                                                                        <option selected>-- select hour --</option>
                                                                                                        @for ($i = 0; $i <= 12  ; $i++)
                                                                                                            <option {{ $mon->ending_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                        @endfor
                                                                                                    </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">Minutes</label>
                                                                                                        <select class="select2" name="ending_minute">
                                                                                                            <option selected>-- select minutes --</option>
                                                                                                            @for ($i = 0; $i <= 60  ; $i++)
                                                                                                                <option {{ $mon->ending_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                            @endfor
                                                                                                        </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">AM/PM</label>
                                                                                                        <select class="select2" name="ending">
                                                                                                            <option selected>-- select am/pm --</option>
                                                                                                            <option {{ $mon->ending == "AM" ? "selected" : ''}} value="AM">AM</option>
                                                                                                            <option {{ $mon->ending == "PM" ? "selected" : ''}} value="PM">PM</option>
                                                                                                        </select>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 form-group mg-t-8">
                                                                                            <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Update Routine">
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>


                                                    {{-- ============ wednesdday ========== --}}


                                                    <div class="box-warper">
                                                        <div class="box-sub box-clr-time">
                                                            {{-- <i class="fas fa-edit"></i> --}}
                                                            <p>Wednesday</p>
                                                        </div>
                                                        @foreach ($all_subject as $wed)
                                                            @if ($section->id == $wed->section)
                                                                @if ($wed->day == 'Wednesday')


                                                                <div class="box-sub box-clr-sub">
                                                                    <i class="fas fa-edit"  data-toggle="modal" data-target="#classRoutine_day_{{ $wed->id }}"></i>
                                                                    <p>{{ Str::limit($wed->subjects->sub_name, '12', '...') }}</p>
                                                                    <p class="p">
                                                                       {{ $wed->starting_hour }}
                                                                        :
                                                                        {{ $wed->starting_minute }}
                                                                        {{ $wed->starting  }}
                                                                        -
                                                                        {{ $wed->ending_hour }}
                                                                        :
                                                                        {{ $wed->ending_minute }}
                                                                        {{ $wed->ending }}
                                                                    </p>
                                                                    <p class="p">{{ $wed->teacher ?? '' }}</p>
                                                                </div>

                                                                <div class="modal fade" id="classRoutine_day_{{ $wed->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Routine</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form id="class_form" method="post" action="{{ route('admin.classRoutine.update') }}" enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <div class="row">
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <label for="className">Class Name</label>
                                                                                            <input type="hidden" name="id" value="{{ $wed->id }}">
                                                                                            <select name="class_name" id="className" class="form-control">
                                                                                                <option selected> -- select class --</option>
                                                                                                @foreach ($classes as $class)
                                                                                                    <option {{ $wed->class_name == $class->id ? 'selected' : ' ' }} value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="groupSection">
                                                                                            <label for="classGroup">Section/Group</label>
                                                                                            <select name="section" id="classGroup" class="form-control">
                                                                                                <option value="{{ $wed->section }}">{{ $wed->sections->section_name }}</option>

                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="">
                                                                                            <label for="classSubject">Subject</label>
                                                                                            <select name="subject" id="classSubject" class="form-control">
                                                                                                <option value="{{ $wed->subject }}">{{ $wed->subjects->sub_name }}</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="subTeacher">
                                                                                            <label for="">Teacher</label>
                                                                                            <input type="text" name="teacher" value="{{ $wed->teacher }}" class='form-control' readonly>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <label for="tradeCode">Day</label>
                                                                                            <select class="select2" name="day">
                                                                                                <option selected>-- select day --</option>
                                                                                                <option {{ $wed->day == "Saturday" ? 'selected' : ' ' }} value="Saturday">Saturday</option>
                                                                                                <option {{ $wed->day == "Sunday" ? 'selected' : ' ' }} value="Sunday">Sunday</option>
                                                                                                <option {{ $wed->day == "Monday" ? 'selected' : ' ' }} value="Monday">Monday</option>
                                                                                                <option {{ $wed->day == "Tuesday" ? 'selected' : ' ' }} value="Tuesday">Tuesday</option>
                                                                                                <option {{ $wed->day == "Wednesday" ? 'selected' : ' ' }} value="Wednesday">Wednesday</option>
                                                                                                <option {{ $wed->day == "Thursday" ? 'selected' : ' ' }} value="Thursday">Thursday</option>
                                                                                            </select>
                                                                                        </div>


                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group mt-4">
                                                                                            <h6>Starting Time</h6>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                    <label for="tradeCode" class="text-dark">Hour</label>
                                                                                                    <select class="select2" name="starting_hour">
                                                                                                        <option selected>-- select hour --</option>
                                                                                                        @for ($i = 0; $i <= 12  ; $i++)
                                                                                                            <option {{ $wed->starting_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                        @endfor
                                                                                                    </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">Minutes</label>
                                                                                                        <select class="select2" name="starting_minute">
                                                                                                            <option selected>-- select minutes --</option>
                                                                                                            @for ($i = 0; $i <= 60  ; $i++)
                                                                                                                <option {{ $wed->starting_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                            @endfor
                                                                                                        </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">
                                                                                                    <div class="form-group">
                                                                                                        <label for="tradeCode" class="text-dark">AM/PM</label>
                                                                                                        <select class="select2" name="starting">
                                                                                                            <option selected>-- select am/pm --</option>
                                                                                                            <option {{ $wed->starting == "AM" ? "selected" : ''}} value="AM">AM</option>
                                                                                                            <option {{ $wed->starting == "PM" ? "selected" : ''}} value="PM">PM</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>




                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group mt-4">
                                                                                            <h6>Ending Time</h6>
                                                                                        </div>



                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                    <label for="tradeCode" class="text-dark">Hour</label>
                                                                                                    <select class="select2" name="ending_hour">
                                                                                                        <option selected>-- select hour --</option>
                                                                                                        @for ($i = 0; $i <= 12  ; $i++)
                                                                                                            <option {{ $wed->ending_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                        @endfor
                                                                                                    </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">Minutes</label>
                                                                                                        <select class="select2" name="ending_minute">
                                                                                                            <option selected>-- select minutes --</option>
                                                                                                            @for ($i = 0; $i <= 60  ; $i++)
                                                                                                                <option {{ $wed->ending_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                            @endfor
                                                                                                        </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">AM/PM</label>
                                                                                                        <select class="select2" name="ending">
                                                                                                            <option selected>-- select am/pm --</option>
                                                                                                            <option {{ $wed->ending == "AM" ? "selected" : ''}} value="AM">AM</option>
                                                                                                            <option {{ $wed->ending == "PM" ? "selected" : ''}} value="PM">PM</option>
                                                                                                        </select>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 form-group mg-t-8">
                                                                                            <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Update Routine">
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>



                                                    {{-- ============ Tuesday ========== --}}


                                                    <div class="box-warper">
                                                        <div class="box-sub box-clr-time">
                                                            {{-- <i class="fas fa-edit"></i> --}}
                                                            <p>Tuesday</p>
                                                        </div>
                                                        @foreach ($all_subject as $tue)
                                                            @if ($section->id == $tue->section)
                                                                @if ($tue->day == 'Tuesday')


                                                                <div class="box-sub box-clr-sub">
                                                                    <i class="fas fa-edit" data-toggle="modal" data-target="#classRoutine_day_{{ $tue->id }}"></i>
                                                                    <p>{{ Str::limit($tue->subjects->sub_name, '12', '...') }}</p>
                                                                    <p class="p">
                                                                       {{ $tue->starting_hour }}
                                                                        :
                                                                        {{ $tue->starting_minute }}
                                                                        {{ $tue->starting  }}
                                                                        -
                                                                        {{ $tue->ending_hour }}
                                                                        :
                                                                        {{ $tue->ending_minute }}
                                                                        {{ $tue->ending }}
                                                                    </p>
                                                                    <p class="p">{{ $tue->teacher ?? '' }}</p>
                                                                </div>


                                                                <div class="modal fade" id="classRoutine_day_{{ $tue->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Routine</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form id="class_form" method="post" action="{{ route('admin.classRoutine.update') }}" enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <div class="row">
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <label for="className">Class Name</label>
                                                                                            <input type="hidden" name="id" value="{{ $tue->id }}">
                                                                                            <select name="class_name" id="className" class="form-control">
                                                                                                <option selected> -- select class --</option>
                                                                                                @foreach ($classes as $class)
                                                                                                    <option {{ $tue->class_name == $class->id ? 'selected' : ' ' }} value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="groupSection">
                                                                                            <label for="classGroup">Section/Group</label>
                                                                                            <select name="section" id="classGroup" class="form-control">
                                                                                                <option value="{{ $tue->section }}">{{ $tue->sections->section_name }}</option>

                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="">
                                                                                            <label for="classSubject">Subject</label>
                                                                                            <select name="subject" id="classSubject" class="form-control">
                                                                                                <option value="{{ $tue->subject }}">{{ $tue->subjects->sub_name }}</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="subTeacher">
                                                                                            <label for="">Teacher</label>
                                                                                            <input type="text" name="teacher" value="{{ $tue->teacher }}" class='form-control' readonly>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <label for="tradeCode">Day</label>
                                                                                            <select class="select2" name="day">
                                                                                                <option selected>-- select day --</option>
                                                                                                <option {{ $tue->day == "Saturday" ? 'selected' : ' ' }} value="Saturday">Saturday</option>
                                                                                                <option {{ $tue->day == "Sunday" ? 'selected' : ' ' }} value="Sunday">Sunday</option>
                                                                                                <option {{ $tue->day == "Monday" ? 'selected' : ' ' }} value="Monday">Monday</option>
                                                                                                <option {{ $tue->day == "Tuesday" ? 'selected' : ' ' }} value="Tuesday">Tuesday</option>
                                                                                                <option {{ $tue->day == "Wednesday" ? 'selected' : ' ' }} value="Wednesday">Wednesday</option>
                                                                                                <option {{ $tue->day == "Thursday" ? 'selected' : ' ' }} value="Thursday">Thursday</option>
                                                                                            </select>
                                                                                        </div>


                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group mt-4">
                                                                                            <h6>Starting Time</h6>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                    <label for="tradeCode" class="text-dark">Hour</label>
                                                                                                    <select class="select2" name="starting_hour">
                                                                                                        <option selected>-- select hour --</option>
                                                                                                        @for ($i = 0; $i <= 12  ; $i++)
                                                                                                            <option {{ $tue->starting_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                        @endfor
                                                                                                    </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">Minutes</label>
                                                                                                        <select class="select2" name="starting_minute">
                                                                                                            <option selected>-- select minutes --</option>
                                                                                                            @for ($i = 0; $i <= 60  ; $i++)
                                                                                                                <option {{ $tue->starting_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                            @endfor
                                                                                                        </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">
                                                                                                    <div class="form-group">
                                                                                                        <label for="tradeCode" class="text-dark">AM/PM</label>
                                                                                                        <select class="select2" name="starting">
                                                                                                            <option selected>-- select am/pm --</option>
                                                                                                            <option {{ $tue->starting == "AM" ? "selected" : ''}} value="AM">AM</option>
                                                                                                            <option {{ $tue->starting == "PM" ? "selected" : ''}} value="PM">PM</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>




                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group mt-4">
                                                                                            <h6>Ending Time</h6>
                                                                                        </div>



                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                    <label for="tradeCode" class="text-dark">Hour</label>
                                                                                                    <select class="select2" name="ending_hour">
                                                                                                        <option selected>-- select hour --</option>
                                                                                                        @for ($i = 0; $i <= 12  ; $i++)
                                                                                                            <option {{ $tue->ending_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                        @endfor
                                                                                                    </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">Minutes</label>
                                                                                                        <select class="select2" name="ending_minute">
                                                                                                            <option selected>-- select minutes --</option>
                                                                                                            @for ($i = 0; $i <= 60  ; $i++)
                                                                                                                <option {{ $tue->ending_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                            @endfor
                                                                                                        </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">AM/PM</label>
                                                                                                        <select class="select2" name="ending">
                                                                                                            <option selected>-- select am/pm --</option>
                                                                                                            <option {{ $tue->ending == "AM" ? "selected" : ''}} value="AM">AM</option>
                                                                                                            <option {{ $tue->ending == "PM" ? "selected" : ''}} value="PM">PM</option>
                                                                                                        </select>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 form-group mg-t-8">
                                                                                            <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Update Routine">
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>



                                                    {{-- ============ Thursday ========== --}}


                                                    <div class="box-warper">
                                                        <div class="box-sub box-clr-time">
                                                            {{-- <i class="fas fa-edit"></i> --}}
                                                            <p>Thursday</p>
                                                        </div>
                                                        @foreach ($all_subject as $thu)
                                                            @if ($section->id == $thu->section)
                                                                @if ($thu->day == 'Thursday')


                                                                <div class="box-sub box-clr-sub">
                                                                    <i class="fas fa-edit" data-toggle="modal" data-target="#classRoutine_day_{{ $thu->id }}"></i>
                                                                    <p>{{ Str::limit($thu->subjects->sub_name, '12', '...') }}</p>
                                                                    <p class="p">
                                                                       {{ $thu->starting_hour }}
                                                                        :
                                                                        {{ $thu->starting_minute }}
                                                                        {{ $thu->starting  }}
                                                                        -
                                                                        {{ $thu->ending_hour }}
                                                                        :
                                                                        {{ $thu->ending_minute }}
                                                                        {{ $thu->ending }}
                                                                    </p>
                                                                    <p class="p">{{ $thu->teacher ?? '' }}</p>
                                                                </div>


                                                                <div class="modal fade" id="classRoutine_day_{{ $thu->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Routine</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form id="class_form" method="post" action="{{ route('admin.classRoutine.update') }}" enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <div class="row">
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <label for="className">Class Name</label>
                                                                                            <input type="hidden" name="id" value="{{ $thu->id }}">
                                                                                            <select name="class_name" id="className" class="form-control">
                                                                                                <option selected> -- select class --</option>
                                                                                                @foreach ($classes as $class)
                                                                                                    <option {{ $thu->class_name == $class->id ? 'selected' : ' ' }} value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="groupSection">
                                                                                            <label for="classGroup">Section/Group</label>
                                                                                            <select name="section" id="classGroup" class="form-control">
                                                                                                <option value="{{ $thu->section }}">{{ $thu->sections->section_name }}</option>

                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="">
                                                                                            <label for="classSubject">Subject</label>
                                                                                            <select name="subject" id="classSubject" class="form-control">
                                                                                                <option value="{{ $thu->subject }}">{{ $thu->subjects->sub_name }}</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group" id="subTeacher">
                                                                                            <label for="">Teacher</label>
                                                                                            <input type="text" name="teacher" value="{{ $thu->teacher }}" class='form-control' readonly>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <label for="tradeCode">Day</label>
                                                                                            <select class="select2" name="day">
                                                                                                <option selected>-- select day --</option>
                                                                                                <option {{ $thu->day == "Saturday" ? 'selected' : ' ' }} value="Saturday">Saturday</option>
                                                                                                <option {{ $thu->day == "Sunday" ? 'selected' : ' ' }} value="Sunday">Sunday</option>
                                                                                                <option {{ $thu->day == "Monday" ? 'selected' : ' ' }} value="Monday">Monday</option>
                                                                                                <option {{ $thu->day == "Tuesday" ? 'selected' : ' ' }} value="Tuesday">Tuesday</option>
                                                                                                <option {{ $thu->day == "Wednesday" ? 'selected' : ' ' }} value="Wednesday">Wednesday</option>
                                                                                                <option {{ $thu->day == "Thursday" ? 'selected' : ' ' }} value="Thursday">Thursday</option>
                                                                                            </select>
                                                                                        </div>


                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group mt-4">
                                                                                            <h6>Starting Time</h6>
                                                                                        </div>
                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                    <label for="tradeCode" class="text-dark">Hour</label>
                                                                                                    <select class="select2" name="starting_hour">
                                                                                                        <option selected>-- select hour --</option>
                                                                                                        @for ($i = 0; $i <= 12  ; $i++)
                                                                                                            <option {{ $thu->starting_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                        @endfor
                                                                                                    </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">Minutes</label>
                                                                                                        <select class="select2" name="starting_minute">
                                                                                                            <option selected>-- select minutes --</option>
                                                                                                            @for ($i = 0; $i <= 60  ; $i++)
                                                                                                                <option {{ $thu->starting_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                            @endfor
                                                                                                        </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">
                                                                                                    <div class="form-group">
                                                                                                        <label for="tradeCode" class="text-dark">AM/PM</label>
                                                                                                        <select class="select2" name="starting">
                                                                                                            <option selected>-- select am/pm --</option>
                                                                                                            <option {{ $thu->starting == "AM" ? "selected" : ''}} value="AM">AM</option>
                                                                                                            <option {{ $thu->starting == "PM" ? "selected" : ''}} value="PM">PM</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>




                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group mt-4">
                                                                                            <h6>Ending Time</h6>
                                                                                        </div>



                                                                                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                    <label for="tradeCode" class="text-dark">Hour</label>
                                                                                                    <select class="select2" name="ending_hour">
                                                                                                        <option selected>-- select hour --</option>
                                                                                                        @for ($i = 0; $i <= 12  ; $i++)
                                                                                                            <option {{ $thu->ending_hour == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                        @endfor
                                                                                                    </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">Minutes</label>
                                                                                                        <select class="select2" name="ending_minute">
                                                                                                            <option selected>-- select minutes --</option>
                                                                                                            @for ($i = 0; $i <= 60  ; $i++)
                                                                                                                <option {{ $thu->ending_minute == $i ? "selected" : ''}} value="{{ $i }}">{{ $i }}</option>
                                                                                                            @endfor
                                                                                                        </select>

                                                                                                </div>
                                                                                                <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">

                                                                                                        <label for="tradeCode" class="text-dark">AM/PM</label>
                                                                                                        <select class="select2" name="ending">
                                                                                                            <option selected>-- select am/pm --</option>
                                                                                                            <option {{ $thu->ending == "AM" ? "selected" : ''}} value="AM">AM</option>
                                                                                                            <option {{ $thu->ending == "PM" ? "selected" : ''}} value="PM">PM</option>
                                                                                                        </select>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 form-group mg-t-8">
                                                                                            <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Update Routine">
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>




                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     {{-- NEW DESIGN CLASS RUTINE END --}}

                @endforeach
            </div>

        </div>
    </div>
@endsection



@section('js')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




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




        $(document).ready(function() {

            $(document).on('click', '.delete_btn', function(e) {
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
                    if (result) {
                        if (result.isConfirmed) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type: "GET",
                                url: "delete/classroutine/" + emp_id,
                                success: function(response) {
                                    if (response.status == 200) {
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
