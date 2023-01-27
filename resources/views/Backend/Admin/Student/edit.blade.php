@extends('Backend.Admin.master')

@section('title')
    Edit Student
@endsection


@php

    $general_info = \App\Models\GeneralSettings::find(1);
    $session_years = \App\Models\SessionYear::all();
    $classes = \App\Models\Classes::all();
    $districts = \App\Models\District::all();
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
    <div class="card">
        <div class="card-header">
            Edit Student
            <a href="" class="btn btn-primary float-right"><i class="fa fa-eye"></i></a>
        </div>
        <div class="card-body">

            <form class="form" action="{{ route('admin.student.update') }}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <div class="form-group mb-3">
                            <label for="">Institute Name</label>
                            <input type="hidden" name="id" value="{{ $edit->id }}">
                            <input type="text" name="institute_name" value="{{ $general_info->website_name }}" id="" class="form-control" readonly>

                        </div>
                        <div class="form-group mb-3">
                            <label for="">Branch</label>
                            <input type="text" name="branch" value="{{ $edit->branch }}" id="" class="form-control">
                        </div>
                        {{-- <div class="form-group mt-4">
                            <label for="">Course </label>
                            <select name="course" id="courseId" class="form-control">
                                <option selected>--- select course ---</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    {{-- <div class="col-lg-4"> --}}
                        {{-- <div class="form-group mb-3">
                            <label for="">Branch</label>
                            <input type="text" name="branch" id="" class="form-control">
                        </div> --}}
                        {{-- <div class="form-group mt-4">
                            <label for="">Trade</label>
                            <select name="trade" id="tradeId" class="form-control">
                                <option selected>--- select trade ---</option>
                            </select>
                       </div> --}}
                    {{-- </div> --}}
                    <div class="col-lg-4">
                        <div class="form-group mt-3">
                            <div class="image">
                                <img class="border" src="{{ $edit->image ? asset($edit->image) : asset('assets/backend/avatar/student_avatar.jpg') }}" id="output" width="100px" height="80px"/>
                            </div>
                        </div>
                       <div class="form-group">
                            <label for="">Photo</label>
                            <input type="file" name="image" id="" class="form-control" onchange="studentPhoto(event)" >
                       </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Class Roll</label>
                            <input type="text" name="class_roll" value="{{ $edit->class_roll }}" id="" class="form-control">
                       </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                            <label for="">Class</label>
                            <select name="class" id="classId" class="form-control">
                                <option selected>--- select class ---</option>
                                @foreach ($classes as $class)
                                    <option {{ $class->id == $edit->class ? "selected" : " " }} value="{{ $class->id  }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                       </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">

                            <label for="">Group/Section</label>
                            <select name="group" id="classGroup" class="form-control">
                                <option value="{{ $edit->group }}">{{ \App\Models\Section::find($edit->group)->section_name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Technology</label>
                            <select name="technology" id="" class="form-control">
                                <option selected>--- select technology ---</option>

                                <option {{ $edit->technology == "computer" ? "selected" : " " }} value="computer">Computer</option>
                                <option {{ $edit->technology == "electrical" ? "selected" : " " }} value="electrical">Electrical</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                       <div class="form-group">
                            <label for="">Semester</label>
                            <select name="semester" id="" class="form-control">
                                <option selected>--- select semester ---</option>
                                <option {{ $edit->semester == "1st Semester" ? "selected" : " " }} value="1st Semester">1st Semester</option>
                                <option {{ $edit->semester == "2nd Semester" ? "selected" : " " }} value="2nd Semester">2nd Semester</option>
                                <option {{ $edit->semester == "3rd Semester" ? "selected" : " " }} value="3rd Semester">3rd Semester</option>
                                <option {{ $edit->semester == "4th Semester" ? "selected" : " " }} value="4th Semester">4th Semester</option>
                            </select>
                       </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Session</label>
                            <select name="session_year" id="" class="form-control">
                                <option selected>--- select session ---</option>
                                @foreach ($session_years as $session)
                                    <option {{ $edit->session == $session->session ? "selected" : " " }}  value="{{ $session->session  }}">{{ $session->session }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Student Name (English)</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="student_name_eng" id="" value="{{ $edit->student_name_eng }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="student_phone_1" id="" value="{{ $edit->student_phone_1 }}" class="form-control" placeholder="student phone no 1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Student Name (Bangla)</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="student_name_ban" id="" value="{{ $edit->student_name_ban }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="student_phone_2" id="" value="{{ $edit->student_phone_2 }}" class="form-control" placeholder="student phone no 2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Father's Name (English)</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="father_name_eng" id="" value="{{ $edit->father_name_eng }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="father_phone_1" id="" value="{{ $edit->father_phone_1 }}" class="form-control" placeholder="father's phone no 1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Father's Name (Bangla)</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="father_name_ban" id="" value="{{ $edit->father_name_ban }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="father_phone_2" id="" value="{{ $edit->father_phone_2 }}" class="form-control" placeholder="father's phone no 2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Mother's Name (English)</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="mother_name_eng" id=""  value="{{ $edit->mother_name_eng }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="mother_phone_1" id="" value="{{ $edit->mother_phone_1 }}" class="form-control" placeholder="mother's phone no 1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Mother's Name (Bangla)</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="mother_name_ban" id="" value="{{ $edit->mother_name_ban }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="mother_phone_2" id="" value="{{ $edit->mother_phone_2 }}" class="form-control" placeholder="mother's phone no 2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <h5>Address</h5>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="zilla">Zila</label>
                            <select name="zila" id="zillaId" class="form-control">
                                <option selected>--- select zila ---</option>
                                @foreach ($districts as $district)
                                    <option {{  $district->id == $edit->zila ? 'selected' : ''  }} value="{{ $district->id }}">{{$district->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="upzilla">upzila</label>
                            <select name="upzila" id="upzillaId" class="form-control">
                                <option value="{{ $edit->upzila }}">{{ \App\Models\Thana::find($edit->upzila)->name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="union">union</label>
                            <select name="union" id="unionId" class="form-control">
                                <option value="{{ $edit->union }}">{{ \App\Models\Union::find($edit->union)->name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_office">Post Office</label>
                            <input type="text" name="post"  value="{{ $edit->post }}" id="post_office" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="ward">Ward</label>
                            <input type="text" name="ward" value="{{ $edit->ward }}" id="ward" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="village">Village</label>
                            <input type="text" name="village" value="{{ $edit->village }}" id="village" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="para">Para</label>
                            <input type="text" name="para" value="{{ $edit->para }}" id="para" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <h5>Guardian Address</h5>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="zilla">Zila</label>
                            <select name="g_zila" id="gzillaId" class="form-control">
                                <option selected>--- select zila ---</option>
                                @foreach ($districts as $district)
                                    <option {{ $edit->g_zila == $district->id ? "selected" : " " }} value="{{ $district->id }}">{{$district->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="upzilla">upzila</label>
                            <select name="g_upzila" id="gupzillaId" class="form-control">
                                <option value="{{ $edit->g_upzila }}">{{ \App\Models\Thana::find($edit->g_upzila)->name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="union">union</label>
                            <select name="g_union" id="gunionId" class="form-control">
                                <option value="{{ $edit->g_union }}">{{ \App\Models\Union::find($edit->g_union)->name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="g_office">Post Office</label>
                            <input type="text" name="g_post" value="{{ $edit->g_post }}" id="post_office" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="ward">Ward</label>
                            <input type="text" name="g_ward" value="{{ $edit->g_ward }}" id="ward" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="village">Village</label>
                            <input type="text" name="g_village" value="{{ $edit->g_village }}" id="village" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="para">Para</label>
                            <input type="text" name="g_para" id="para"  value="{{ $edit->g_para }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="localGuardianName">Local Guardian Name</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="loc_name" value="{{ $edit->loc_name }}" id="localGuardianName" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="loc_phone" id="" value="{{ $edit->loc_phone }}" class="form-control" placeholder="Local guardian phone no">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="localGuardianName">Relation with student</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" name="loc_relation" value="{{ $edit->loc_relation }}" id="" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <h5>Identifire Information</h5>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="zilla">Zilla</label>

                            <select name="loc_zila" id="idzillaId" class="form-control">

                                <option selected>--- select zila ---</option>
                                @foreach ($districts as $district)
                                    <option {{ $edit->loc_zila ==  $district->id ? "selected" : " "}} value="{{ $district->id }}">{{$district->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="upzilla">upzila</label>

                            <select name="loc_upzila" id="idupzillaId" class="form-control">
                                <option value="{{ $edit->loc_upzila }}">{{ \App\Models\Thana::find($edit->loc_upzila)->name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="union">union</label>
                            <select name="loc_union" id="idunionId" class="form-control">
                                <option value="{{ $edit->loc_union }}">{{ \App\Models\Union::find($edit->loc_union)->name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_office">Post Office</label>

                            <input type="text" name="loc_post" value="{{ $edit->loc_post }}" id="post_office" class="form-control">

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="ward">Ward</label>
                            <input type="text" name="loc_ward" value="{{ $edit->loc_ward }}" id="ward" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="village">Village</label>
                            <input type="text" name="loc_village" value="{{ $edit->loc_village }}" id="village" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="para">Para</label>
                            <input type="text" name="loc_para" value="{{ $edit->loc_para }}" id="para" class="form-control">
                        </div>
                    </div>
                </div>
                {{-- <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <h5>Mentor</h5>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select name="zilla" id="zilla" class="form-control">
                                <option selected>--- select mentor ---</option>
                                <option value="">Dhaka</option>
                                <option value="Rangpur">Rangpur</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="upzilla" id="upzilla" class="form-control">
                                <option selected>--- select  mentor ---</option>
                                <option value="">Dhaka</option>
                                <option value="Rangpur">Rangpur</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="union" id="union" class="form-control">
                                <option selected>--- select  mentor---</option>
                                <option value="">Dhaka</option>
                                <option value="Rangpur">Rangpur</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="union" id="union" class="form-control">
                                <option selected>--- select  mentor---</option>
                                <option value="">Dhaka</option>
                                <option value="Rangpur">Rangpur</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select name="union" id="union" class="form-control">
                                <option selected>--- select  mentor---</option>
                                <option value="">Dhaka</option>
                                <option value="Rangpur">Rangpur</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="union" id="union" class="form-control">
                                <option selected>--- select  mentor---</option>
                                <option value="">Dhaka</option>
                                <option value="Rangpur">Rangpur</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="union" id="union" class="form-control">
                                <option selected>--- select  mentor---</option>
                                <option value="">Dhaka</option>
                                <option value="Rangpur">Rangpur</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="union" id="union" class="form-control">
                                <option selected>--- select  mentor---</option>
                                <option value="">Dhaka</option>
                                <option value="Rangpur">Rangpur</option>
                            </select>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <h5>Educational Qualification</h5>
                        </div>
                    </div>
                </div>
                @forelse (\App\Models\EducationQualifications::where('student_id',$edit->id)->get() as $edu_qua)

                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Exam Name</label>
                            <select name="exam_name[]" id="" class="form-control">
                                <option>select exam name</option>
                                <option {{ $edu_qua->exam_name == "PSC" ? "selected" : " " }} value="PSC">PSC</option>
                                <option {{ $edu_qua->exam_name == "JSC" ? "selected" : " " }} value="JSC">JSC</option>
                                <option {{ $edu_qua->exam_name == "SSC" ? "selected" : " " }} value="SSC">SSC</option>
                                <option {{ $edu_qua->exam_name == "HSC" ? "selected" : " " }} value="HSC">HSC</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Depertment</label>
                            <select name="department[]" id="" class="form-control">
                                <option >select</option>
                                <option {{ $edu_qua->department == "Science" ? "selected" : " " }} value="Science">Science</option>
                                <option {{ $edu_qua->department == "Arts" ? "selected" : " " }} value="Arts">Arts</option>
                                <option {{ $edu_qua->department == "Commerce" ? "selected" : " " }} value="Commerce">Commerce</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Borad</label>
                            <select name="board[]" id="" class="form-control">
                                <option > select</option>
                                <option {{ $edu_qua->board == "Barisal" ? "selected" : " " }} value="Barisal">Barisal</option>
                                <option {{ $edu_qua->board == "Chittagong" ? "selected" : " " }} value="Chittagong">Chittagong</option>
                                <option {{ $edu_qua->board == "Comilla" ? "selected" : " " }} value="Comilla">Comilla</option>
                                <option {{ $edu_qua->board == "Dhaka" ? "selected" : " " }} value="Dhaka">Dhaka</option>
                                <option {{ $edu_qua->board == "Dinajpur" ? "selected" : " " }} value="Dinajpur">Dinajpur</option>
                                <option {{ $edu_qua->board == "Jessore" ? "selected" : " " }} value="Jessore">Jessore</option>
                                <option {{ $edu_qua->board == "Mymensingh" ? "selected" : " " }} value="Mymensingh">Mymensingh</option>
                                <option {{ $edu_qua->board == "Rajshahi" ? "selected" : " " }} value="Rajshahi">Rajshahi</option>
                                <option {{ $edu_qua->board == "Sylhet" ? "selected" : " " }} value="Sylhet">Sylhet</option>
                                <option {{ $edu_qua->board == "Madrasah" ? "selected" : " " }} value="Madrasah">Madrasah</option>
                                <option {{ $edu_qua->board == "Technical" ? "selected" : " " }} value="Technical">Technical</option>
                                <option {{ $edu_qua->board == "DIBS(Dhaka)" ? "selected" : " " }} value="DIBS(Dhaka)">DIBS(Dhaka)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Passing year</label>
                            <select name="passing_year[]" id="" class="form-control">
                                <option selected>passing year-</option>
                                @for ($i = 2001; $i <= 2050; $i++)
                                    <option {{ $edu_qua->passing_year == $i ? "selected" : " " }} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Roll</label>
                            <input type="text" name="exam_roll[]" value="{{ $edu_qua->exam_roll }}" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Reg</label>
                            <input type="text" name="reg[]" value="{{ $edu_qua->reg }}" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">GPA</label>
                            <input type="text" name="gpa[]" value="{{ $edu_qua->gpa }}" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2 mt-5">
                        <div class="form-group">
                            <label for=""></label>
                            <button type="button" id="addExamRow" class="btn btn-info">Add</button>
                            <button type="button" id="removeExamRow" class="btn btn-danger ">Remove</button>
                        </div>
                    </div>
                </div>

                @empty


                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Exam Name</label>
                            <select name="exam_name[]" id="" class="form-control">
                                <option selected>select exam name</option>
                                <option value="PSC">PSC</option>
                                <option value="JSC">JSC</option>
                                <option value="SSC">SSC</option>
                                <option value="HSC">HSC</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Depertment</label>
                            <select name="department[]" id="" class="form-control">
                                <option selected>select</option>
                                <option value="Science">Science</option>
                                <option value="Arts">Arts</option>
                                <option value="Commerce">Commerce</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Borad</label>
                            <select name="board[]" id="" class="form-control">
                                <option selected>select</option>
                                <option value="Barisal">Barisal</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Comilla">Comilla</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Dinajpur">Dinajpur</option>
                                <option value="Jessore">Jessore</option>
                                <option value="Mymensingh">Mymensingh</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Sylhet">Sylhet</option>
                                <option value="Madrasah">Madrasah</option>
                                <option value="Technical">Technical</option>
                                <option value="DIBS(Dhaka)">DIBS(Dhaka)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Passing year</label>
                            <select name="passing_year[]" id="" class="form-control">
                                <option selected>passing year-</option>
                                @for ($i = 2001; $i <= 2050; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Roll</label>
                            <input type="text" name="exam_roll[]" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Reg</label>
                            <input type="text" name="reg[]" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">GPA</label>
                            <input type="text" name="gpa[]" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2 mt-5">
                        <div class="form-group">
                            <label for=""></label>
                            <button type="button" id="addExamRow" class="btn btn-info">Add</button>
                            <button type="button" id="removeExamRow" class="btn btn-danger ">Remove</button>
                        </div>
                    </div>
                </div>

                @endforelse

                <div class="add-exam">

                </div>
                {{-- <div class="row">
                    <div class="col-lg-12">
                        <div class="form-inline">
                            <input type="checkbox" id="checkHostel">
                            <label for="" class="pl-2 fs-3">Hostel Fee information</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 removeHostel">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Hostel Student</label>
                        <input type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Hostel Fee</label>
                            <input type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-inline">
                            <input type="checkbox" id="checkFeeInfo">
                            <label for="" class="pl-2 fs-3"> Fee information</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 removeFeeInfo">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Discount</label>
                        <input type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                            <label for="">Tution Fee</label>
                            <input type="text" name="" id="" class="form-control">
                       </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="form-inline">
                            <input type="checkbox" id="checkSessionFee">
                            <label for="" class="pl-2 fs-3">Session Fee information</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 removeSessionFee">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Yearly session fee</label>
                            <input type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Total Fee</label>
                            <input type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                </div> --}}
                <div class="row mt-4">
                  <div class="col-lg-12">
                     <div class="form-group">
{{--                        <label for="">Fee</label>--}}
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">

                                    <label for="">Hostel</label>

                                    <select name="hostel" id="" class="form-control">
                                        <option> Please Select </option>
                                        <option {{ $edit->hostel == "yes" ? "selected" : " " }} value="yes"> yes </option>
                                        <option {{ $edit->hostel == "no" ? "selected" : " " }} value="no"> no </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Full Course Fee</label>
                                    <input type="text" value="{{ $edit->full_course_fee }}" name="full_course_fee" id="" class="form-control" placeholder="Full course fee">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Semester Fee</label>
                                    <input type="text" name="semester_fee" value="{{ $edit->semester_fee }}" id="" class="form-control" placeholder="semester fee">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Internship Fee</label>
                                    <input type="text" name="internship_fee" value="{{ $edit->internship_fee }}" id="" class="form-control" placeholder="internship fee">
                                </div>
                            </div>
                        </div>
                        <div class="addFee">

                        </div>
                     </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Agreement</label>
                            <textarea name="agreement" id="" cols="30" rows="10" class="form-control">{{ $edit->agreement }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Document Copy 1</label>
                            <input type="file" name="doc1" id="" class="form-control">
                            <label for=""><span><i class="fa fa-upload"></i></span>  Choose a file</label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Document Copy 2</label>
                            <input type="file" name="doc2" id="" class="form-control">
                            <label for=""><span><i class="fa fa-upload"></i></span>  Choose a file</label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Document Copy 3</label>
                            <input type="file" name="doc3" id="" class="form-control">
                            <label for=""><span><i class="fa fa-upload"></i></span>  Choose a file</label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Document Copy 4</label>
                            <input type="file" name="doc4" id="" class="form-control">
                            <label for=""><span><i class="fa fa-upload"></i></span>  Choose a file</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Remarks</label>
                            <textarea name="remarks" id="" cols="30" rows="10" class="form-control">{{ $edit->remarks }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Others activities</label>
                            <textarea name="other_activities" id="" cols="30" rows="10" class="form-control">{{ $edit->other_activities }}</textarea>
                        </div>
                    </div>
                </div>
                {{-- <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Confiram Password</label>
                            <input type="password" name="password_confirmation" id="" class="form-control">
                        </div>
                    </div>
                </div> --}}
                <div class="row mb-5">
                    <div class="col-lg-4">
                        <h3 class="text-center">
                            Student's Signature
                        </h3>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="text-center">
                            Guardian's Signature
                        </h3>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="text-center">
                            Admitted By
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 offset-lg-5">
                        <button type="submit" class="btn btn-info btn-lg">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('js')

    <script>
        var studentPhoto = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>


    <script>
        $(document).ready(function(){

            $('#classId').change(function(){
                let classId = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.student.class.group') }}",
                    data:{
                        class_id : classId,
                    },
                    success:function(data) {
                        $("#classGroup").html(data);
                    }
                });
            });

            $('#courseId').change(function(){
                let courseId = $(this).val();
                // alert(courseId);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.student.trade') }}",
                    data:{
                        course_id : courseId,
                    },
                    success:function(data) {
                        $("#tradeId").html(data);
                    }
                });
            });

            $('#zillaId').change(function(){
                let zillaId = $(this).val();
                // alert(courseId);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.student.upzilla') }}",
                    data:{
                        zilla_id : zillaId,
                    },
                    success:function(data) {
                        $("#upzillaId").html(data);
                    }
                });
            });

            $('#upzillaId').change(function(){
                let upzillaId = $(this).val();
                // alert(upzillaId);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.student.union') }}",
                    data:{
                        upzilla_id : upzillaId,
                    },
                    success:function(data) {
                        $("#unionId").html(data);
                    }
                });
            });

            $('#gzillaId').change(function(){
                let gzillaId = $(this).val();
                // alert(courseId);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.student.gupzilla') }}",
                    data:{
                        gzilla_id : gzillaId,
                    },
                    success:function(data) {
                        $("#gupzillaId").html(data);
                    }
                });
            });

            $('#gupzillaId').change(function(){
                let gupzillaId = $(this).val();
                // alert(upzillaId);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.student.gunion') }}",
                    data:{
                        gupzilla_id : gupzillaId,
                    },
                    success:function(data) {
                        $("#gunionId").html(data);
                    }
                });
            });

            $('#idzillaId').change(function(){
                let idzillaId = $(this).val();
                // alert(courseId);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.student.idupzilla') }}",
                    data:{
                        idzilla_id : idzillaId,
                    },
                    success:function(data) {
                        $("#idupzillaId").html(data);
                    }
                });
            });

            $('#idupzillaId').change(function(){
                let idupzillaId = $(this).val();
                // alert(upzillaId);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.student.idunion') }}",
                    data:{
                        idupzilla_id : idupzillaId,
                    },
                    success:function(data) {
                        $("#idunionId").html(data);
                    }
                });
            });


            $("#checkHostel").click(function(){
                if(this.checked){
                    $('.removeHostel').hide();
                }else{
                    $('.removeHostel').show();
                }
            });

            $("#checkFeeInfo").click(function(){
                if(this.checked){
                    $('.removeFeeInfo').hide();
                }else{
                    $('.removeFeeInfo').show();
                }
            });

            $("#checkSessionFee").click(function(){
                if(this.checked){
                    $('.removeSessionFee').hide();
                }else{
                    $('.removeSessionFee').show();
                }
            });



            $(document).on('click','#addExamRow', function(){
               $('.add-exam').append(`<div class="row"><div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Exam Name</label>
                            <select name="exam_name[]" id="" class="form-control">
                                <option selected>select exam name</option>
                                <option value="PSC">PSC</option>
                                <option value="JSC">JSC</option>
                                <option value="SSC">SSC</option>
                                <option value="HSC">HSC</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Depertment</label>
                            <select name="department[]" id="" class="form-control">
                                <option selected>select depertment</option>
                                <option value="Science">Science</option>
                                <option value="Arts">Arts</option>
                                <option value="Commerce">Commerce</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Borad</label>
                            <select name="board[]" id="" class="form-control">
                                <option selected>select borad</option>
                                <option value="Barisal">Barisal</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Comilla">Comilla</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Dinajpur">Dinajpur</option>
                                <option value="Jessore">Jessore</option>
                                <option value="Mymensingh">Mymensingh</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Sylhet">Sylhet</option>
                                <option value="Madrasah">Madrasah</option>
                                <option value="Technical">Technical</option>
                                <option value="DIBS(Dhaka)">DIBS(Dhaka)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Passing year</label>
                            <select name="passing_year[]" id="" class="form-control">
                                <option selected>--- select passing year---</option>
                                @for ($i = 2001; $i <= 2050; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Exam Roll</label>
                            <input type="text" name="exam_roll[]" id="" class="form-control">
                         </div>
                    </div>
                    <div class="col-lg-2">
                         <div class="form-group">
                            <label for="">Reg</label>
                            <input type="text" name="reg[]" id="" class="form-control">
                         </div>
                    </div>
                    <div class="col-lg-2">
                         <div class="form-group">
                             <label for="">GPA</label>
                             <input type="text" name="gpa[]" id="" class="form-control">
                         </div>
                    </div>
                    <div class="col-lg-2 mt-5">
                        <div class="form-group">
                            <label for=""></label>
                            <button type="button" id="addExamRow" class="btn btn-info">Add</button>
                            <button type="button" id="removeExamRow" class="btn btn-danger ">Remove</button>
                        </div>
                    </div></div>`);
            });
        });

        $(document).on('click','#removeExamRow', function(){
            $('.add-exam .row:last').remove();
        });

        $(document).on('click','#addFeeRow', function(){
            $('.addFee').append(`<div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input type="text" name="full_course_fee[]" id="" class="form-control" placeholder="Full course fee">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input type="text" name="semester_fee[]" id="" class="form-control" placeholder="semester fee">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input type="text" name="internship_fee[]" id="" class="form-control" placeholder="internship fee">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <button type="button" id="addFeeRow" class="btn btn-info">Add </button>
                                <button type="button" id="removeFeeRow" class="btn btn-danger">Remove</button>
                            </div>
                        </div>`);
        });

        $(document).on('click','#removeFeeRow', function(){
            $('.addFee .row:last').remove();
        });
    </script>

@endsection
