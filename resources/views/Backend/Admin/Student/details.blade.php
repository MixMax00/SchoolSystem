@extends('Backend.Admin.master')
@section('title')
    Student Profile
@endsection

@section('css')
    <style>
        .para {
            font-size: 14px;
            line-height: 3px;
        }

        @media print {
            /* body * {
                    visibility: hidden;
                } */

            /* * {
                background-color: #fff !important;
            } */

            .navbar {
                visibility: hidden;
            }

            .sidebar-menu-one * {
                visibility: hidden;
            }

            .breadcrumbs-area {
                visibility: hidden;
            }

            .card-header {
                visibility: hidden;
            }

            .row:after {
                content: " ";
                clear: both;
                display: block;
            }

            .footer-wrap-layout1{
                visibility: hidden;
            }

            .page-break { page-break-after: always; }

            #printSection {
                position: relative;
                left: -30px;
                top: -135px;
                width: 29.5cm;
                min-height: auto !important;
                background-color: #fff !important;
            }

            .form-group .form-control{
                height: 45px !important;
                background-color: #f8f8f8 !important;
                font-size: 14px !important;
                color: #111111 !important;
                border-radius: 4px !important;
                border: none !important;
                padding: 5px 15px !important;
            }

            .title h3{
                text-align: center !important;
            }
            .padding-print{
                margin-top: 40px !important;
            }


        }

        .col-print-1 {
            width: 8%;
            float: left;
        }

        .col-print-2 {
            width: 16%;
            float: left;
        }

        .col-print-3 {
            width: 25%;
            float: left;
        }

        .col-print-4 {
            width: 33%;
            float: left;
        }

        .col-print-5 {
            width: 42%;
            float: left;
        }

        .col-print-6 {
            width: 50%;
            float: left;
        }

        .col-print-7 {
            width: 58%;
            float: left;
        }

        .col-print-8 {
            width: 66%;
            float: left;
        }

        .col-print-9 {
            width: 75%;
            float: left;
        }

        .col-print-10 {
            width: 83%;
            float: left;
        }

        .col-print-11 {
            width: 92%;
            float: left;
        }

        .col-print-12 {
            width: 100%;
            float: left;
        }
    </style>
@endsection

@php($general_info = \App\Models\GeneralSettings::find(1))
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
    <div id="printSection">
        <!-- Breadcubs Area End Here -->
        <div class="card">
            <div class="card-header">
                Student Profile
                <a href="" class="btn btn-primary float-right"><i class="fa fa-eye"></i></a>
            </div>
            <div class="card-body">

                <form class="form" action="" method="post" enctype="multipart/form-data">

                    {{-- <div id="printSection"> --}}
                    <div class="row mb-5">
                        <div class="col-lg-2 col-print-2">
                            <div class="logo mt-5">
                                <img class="" src="{{ isset($general_info->logo) ? asset($general_info->logo) : '' }}"
                                    alt="" width="250px" height="250px">
                            </div>
                        </div>
                        <div class="col-lg-8 col-print-8">
                            <div class="general text-center">
                                <h3>{{ $general_info->website_name }}</h3>
                                <p class="para">{{ $general_info->address }}</p>
                                <p class="para"><strong>Email: </strong>{{ $general_info->email }}</p>
                                <p class="para"><strong>Phone: </strong>{{ $general_info->phone }}</p>
                                <p class="para"><strong>Website: </strong>www.drutoschool.com</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-print-2">
                            <div class="stu-image mt-5">
                                <img class="border" src="{{ isset($detail->image) ? asset($detail->image) : '' }}"
                                    alt="" width="250px" height="250px">
                            </div>
                        </div>
                    </div>
                    <div class="padding-print"></div>
                    {{-- <div class="row mt-5">
                        <div class="col-lg-12 col-print-12">
                            <div class="title text-center">
                                <h3 class="text-center">Student Information</h3>
                            </div>
                        </div>
                    </div> --}}

                    <div class="row mb-3 pt-5">
                        <div class="col-lg-4 col-print-4">
                            {{-- <div class="form-group">
                                <label for="">Course </label>
                                <input type="text" name="" value="{{ $detail->courses->course_name }}"
                                    id="" class="form-control" readonly>
                            </div> --}}
                        </div>

                        <div class="col-lg-4 col-print-4">
                            {{-- <div class="form-group">
                                <label for="">Trade</label>
                                <input type="text" name="" value="{{ $detail->trades->trade_title }}"
                                    id="" class="form-control" readonly>
                            </div> --}}
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group mb-3">
                                <label for="">Branch</label>
                                <input type="text" name="" value="{{ $detail->branch }}" id=""
                                    class="form-control" readonly>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="">Class Roll</label>
                                <input type="text" name="" value="{{ $detail->class_roll }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="">Class</label>
                                <input type="text" name="" value="{{ $detail->class }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">

                                <label for="">Group/Section</label>
                                <input type="text" name="" value="{{ $detail->group }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="">Technology</label>
                                <input type="text" name="" value="{{ $detail->technology }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="">Semester</label>
                                <input type="text" name="" value="{{ $detail->semester }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="">Session</label>
                                <input type="text" name="" value="{{ $detail->session }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="">Student Name (English)</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="" value="{{ $detail->student_name_eng }}"
                                    id="" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="student_phone_1" value="{{ $detail->student_phone_1 }}"
                                    id="" class="form-control" placeholder="student phone no 1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="">Student Name (Bangla)</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="student_name_ban" value="{{ $detail->student_name_ban }}"
                                    id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="student_phone_2" value="{{ $detail->student_phone_2 }}"
                                    id="" class="form-control" placeholder="student phone no 2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="">Father's Name (English)</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="father_name_eng" value="{{ $detail->father_name_eng }}"
                                    id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="father_phone_1" value="{{ $detail->father_phone_1 }}"
                                    id="" class="form-control" placeholder="father's phone no 1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="">Father's Name (Bangla)</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="father_name_ban" value="{{ $detail->father_name_ban }}"
                                    id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="father_phone_2" value="{{ $detail->father_phone_2 }}"
                                    id="" class="form-control" placeholder="father's phone no 2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="">Mother's Name (English)</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="mother_name_eng" value="{{ $detail->mother_name_eng }}"
                                    id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="mother_phone_1" value="{{ $detail->mother_phone_1 }}"
                                    id="" class="form-control" placeholder="mother's phone no 1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="">Mother's Name (Bangla)</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="mother_name_ban" value="{{ $detail->mother_name_ban }}"
                                    id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="mother_phone_2" value="{{ $detail->mother_phone_2 }}"
                                    id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <h5>Address</h5>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="zilla">Zila</label>

                                <input type="text" name=""
                                    value="{{ isset($detail->districts->name) ? $detail->districts->name : '' }}"
                                    id="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="upzilla">upzila</label>
                                <input type="text" name=""
                                    value="{{ isset($detail->thanas->name) ? $detail->thanas->name : '' }}"
                                    id="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="union">union</label>
                                <input type="text" name=""
                                    value="{{ isset($detail->unions->name) ? $detail->unions->name : '' }}"
                                    id="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="post_office">Post Office</label>
                                <input type="text" name="" value="{{ $detail->post }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="ward">Ward</label>
                                <input type="text" name="" value="{{ $detail->ward }}" id=""
                                    class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="village">Village</label>
                                <input type="text" name="" value="{{ $detail->village }}" id=""
                                    class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="para">Para</label>
                                <input type="text" name="" value="{{ $detail->para }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <h5>Guardian Address</h5>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="zilla">Zila</label>
                                <input type="text" name=""
                                    value="{{ isset($detail->g_districts->name) ? $detail->g_districts->name : '' }}"
                                    id="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="upzilla">upzila</label>
                                <input type="text" name=""
                                    value="{{ isset($detail->g_thanas->name) ? $detail->g_thanas->name : '' }}"
                                    id="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="union">union</label>
                                <input type="text" name=""
                                    value="{{ isset($detail->g_unions->name) ? $detail->g_unions->name : '' }}"
                                    id="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="g_office">Post Office</label>
                                <input type="text" name="" value="{{ $detail->g_post }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="ward">Ward</label>
                                <input type="text" name="" value="{{ $detail->g_ward }}" id=""
                                    class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="village">Village</label>
                                <input type="text" name="" value="{{ $detail->g_village }}" id=""
                                    class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="para">Para</label>
                                <input type="text" name="" value="{{ $detail->g_para }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="localGuardianName">Local Guardian Name</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="" value="{{ $detail->loc_name }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="" value="{{ $detail->loc_phone }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="localGuardianName">Relation with student</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <input type="text" name="" value="{{ $detail->loc_relation }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <h5>Identifire Information</h5>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="zilla">Zilla</label>

                                <input type="text" name=""
                                    value="{{ isset($detail->loc_districts->name) ? $detail->loc_districts->name : '' }}"
                                    id="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="upzilla">upzila</label>

                                <input type="text" name=""
                                    value="{{ isset($detail->loc_thanas->name) ? $detail->loc_thanas->name : ' ' }}"
                                    id="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="union">union</label>
                                <input type="text" name=""
                                    value="{{ isset($detail->loc_unions->name) ? $detail->loc_unions->name : '' }}"
                                    id="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="post_office">Post Office</label>

                                <input type="text" name="" value="{{ $detail->loc_post }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-print-4">
                            <div class="form-group">
                                <label for="ward">Ward</label>
                                <input type="text" name="" value="{{ $detail->loc_ward }}" id=""
                                    class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="village">Village</label>
                                <input type="text" name="" value="{{ $detail->loc_village }}" id=""
                                    class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="para">Para</label>
                                <input type="text" name="" value="{{ $detail->loc_para }}" id=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-print-12">
                            <div class="form-group">
                                <h5>Educational Qualification</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-print-12">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Exam Name</th>
                                    <th>Depertment</th>
                                    <th>Borad</th>
                                    <th>Year</th>
                                    <th>Roll</th>
                                    <th>Reg</th>
                                    <th>GPA</th>
                                </thead>
                                <tbody>
                                    @foreach ($edu_details as $edu_detail)
                                        <tr>
                                            <td>{{ $edu_detail->exam_name }}</td>
                                            <td>{{ $edu_detail->department }}</td>
                                            <td>{{ $edu_detail->board }}</td>
                                            <td>{{ $edu_detail->passing_year }}</td>
                                            <td>{{ $edu_detail->exam_roll }}</td>
                                            <td>{{ $edu_detail->reg }}</td>
                                            <td>{{ $edu_detail->gpa }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-lg-12 col-print-12">
                            <div class="form-group">
                                <label for="">Fee</label>
                                <div class="row">
                                    <div class="col-lg-3 col-print-3">
                                        <div class="form-group">

                                            <label for="">Hostel</label>

                                            <input type="text" name="" value="{{ $detail->hostel }}"
                                                id="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-print-3">
                                        <div class="form-group">
                                            <label for="">Full Course Fee</label>
                                            <input type="text" name="" value="{{ $detail->full_course_fee }}"
                                                id="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-print-3">
                                        <div class="form-group">
                                            <label for="">Semester Fee</label>
                                            <input type="text" name="" value="{{ $detail->semester_fee }}"
                                                id="" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-print-3">
                                        <div class="form-group">
                                            <label for="">Internship Fee</label>
                                            <input type="text" name="" value="{{ $detail->internship_fee }}"
                                                id="" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="addFee">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-print-12">
                            <div class="form-group">
                                <label for="">Agreement</label>
                                <textarea name="agreement" id="" cols="30" rows="10" class="form-control">{{ $detail->agreement }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 col-print-12">
                            <div class="form-group">
                                <label for="">Remarks</label>
                                <textarea name="remarks" id="" cols="30" rows="10" class="form-control">{{ $detail->remarks }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-12 col-print-12">
                            <div class="form-group">
                                <label for="">Others activities</label>
                                <textarea name="other_activities" id="" cols="30" rows="10" class="form-control">{{ $detail->other_activities }}</textarea>
                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
