@extends('Backend.Admin.master')

@php
    $sessions = \App\Models\SessionYear::all();
    $classes = \App\Models\Classes::all();
@endphp
@section('title')
Current Session: <span id="currentSessionHtml">{{ $current_session->session }}</span>

@endsection

@section('css')
    <style>
        .control-custom{
            margin-top: 1px;
            height: 25px;
        }
        /* .serachRoll{
            margin-top: -3px;
            height: 25px;
        } */
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
            <li>Current Session <span id="breadcrumbsTitle">{{ $current_session->session }}</span></li>
        </ul>
    </div>

    <!-- Breadcubs Area End Here -->

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Current Session :</label>
                <select name="current_session" class="form-control" id="currentSession">
                    @foreach ($sessions as $session)
                        <option {{ $session->session == $current_session->session ? "selected" : " " }} value="{{ $session->session }}">{{ $session->session }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for=""> Class :</label>
                <select name="curr_class" class="form-control" id="selectClass">
                    <option selected>-- select class --</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for=""> Roll :</label>
                <div class="input-group mb-3">
                    <input type="text" id="rollId" class="form-control">
                    <div class="input-group-append">
                        <span id="serachRoll" class="input-group-text bg-primary"><i class="fas fa-search text-white fa-2x"></i></span>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            All Student
            @if(auth()->user()->hasPermission('app.student.create'))
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i></a>
            @endif
        </div>
        <div class="card-body">
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
                        <th>Name</th>
                        <th>Class</th>
                        <th>Roll</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="sessionTable">
                        @foreach ($current_ses_students as $cs_student)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $cs_student->student_name_eng }}</td>
                                <td>{{ $cs_student->class }}</td>
                                <td>{{ $cs_student->class_roll }}</td>
                                <td>
                                    @if(auth()->user()->hasPermission('app.roles.create'))
                                    <button class="btn btn-info view_student mr-3" id="showStudent" value="{{ $cs_student->id }}"><i class="fas fa-eye text-white"></i></button>
                                    {{-- <button class="btn btn-info  mr-3" id="send_pdf_student" value="{{ $cs_student->id }}"><i class="fas fa-arrow-right text-white"></i></button> --}}
                                    <button class="btn btn-success  mr-3" id="edit_student" value="{{ $cs_student->id }}"><i class="fas fa-edit text-white"></i></button>
                                    <button class="btn btn-danger delete_btn mr-3" value="" id="delete" ><i class="fas fa-trash text-white"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function(){

            // var getUrl = window.location;
            // var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[2];
            $('#currentSession').change(function(){
                // alert($(this).val());
                let sessionYear = $(this).val();

                $("#currentSessionHtml").html(sessionYear);
                $("#breadcrumbsTitle").html(sessionYear);



                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.student.session') }}",
                    data:{
                        session_year : sessionYear,
                    },
                    success:function(data) {
                        var td = " ";
                        $.each(data, function(key, value){
                            td += "<tr>";
                            td += "<td>"+key+"</td>";
                            td +="<td>"+value.student_name_eng+"</td>";
                            td +="<td>"+value.class+"</td>";
                            td +="<td>"+value.class_roll+"</td>";
                            td +="<td>";
                            td +="<button class='btn btn-info view_student mr-3' id='showStudent' value='"+value.id+"'><i class='fas fa-eye text-white'></i></button>";
                            td +="<button class='btn btn-danger delete_btn mr-3' id='delete'><i class='fas fa-trash text-white'></i></button>";
                            td +="</td>";
                            td +="</tr>";
                        });

                        $("#sessionTable").html(td);
                    }
                });
            });
        });

        $(document).on('click', '.view_student',function(){
         let url = $(this).val();
           window.location.href = "{{ url('admin/student/details') }}"+"/"+ + url;
        });

        $(document).on('click', '#send_pdf_student',function(){
         let url = $(this).val();
           window.location.href = "{{ url('admin/student/send-pdf') }}"+"/"+ + url;
        });

        $(document).on('click', '#edit_student',function(){
         let url = $(this).val();
           window.location.href = "{{ url('admin/student/edit') }}"+"/"+ + url;
        });





        $(document).ready(function(){

            $("#selectClass").change(function(){
                let currSesiion = $("#currentSessionHtml").text();
                let  currClass = $(this).val();

                var classText = $('#selectClass').find(":selected").text();
                if(classText == "-- select class --"){

                }else{
                    $('#rollId').removeAttr('disabled');
                }


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.student.session-class') }}",
                    data:{
                        curr_sesiion : currSesiion,
                        curr_class   : currClass,
                    },
                    success:function(data) {
                        var td = " ";

                        if(!data){
                            td += "<tr>";
                            td += "<td class='text-center text-danger' colspan='10'>"+"Student Class Not Found."+"</td>";
                            td +="</tr>";

                            $("#sessionTable").html(td);
                        }else{
                            $.each(data, function(key, value){
                                td += "<tr>";
                                td += "<td>"+key+"</td>";
                                td +="<td>"+value.stu_name+"</td>";
                                td +="<td>"+value.class+"</td>";
                                td +="<td>"+value.roll+"</td>";
                                td +="<td>";
                                td +="<button class='btn btn-info view_student mr-3' id='showStudent' value='"+value.student_id+"'><i class='fas fa-eye text-white'></i></button>";
                                td +="<button class='btn btn-danger delete_btn mr-3' id='delete'><i class='fas fa-trash text-white'></i></button>";
                                td +="</td>";
                                td +="</tr>";

                            });

                            $("#sessionTable").html(td);

                        }


                        // console.log(data);


                    }
                });
            });
        });

        $(document).ready(function(){
            var disableRoll = $('#rollId').attr('disabled', 'disabled');

                $('#serachRoll').click(function(){
                    let rollId = $("#rollId").val();
                    let currSesiion = $("#currentSessionHtml").text();
                    let currClass = $("#selectClass").val();


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:"POST",
                        url:"{{ route('admin.student.search-class-roll') }}",
                        data:{
                            curr_sesiion : currSesiion,
                            curr_class   : currClass,
                            roll_id      : rollId,
                        },
                        success:function(data) {
                            var td = " ";
                            if(!data){
                                td += "<tr>";
                                td += "<td class='text-center text-danger' colspan='10'>"+"Student Not Found."+"</td>";
                                td +="</tr>";
                                $("#sessionTable").html(td);

                            }else{
                                td += "<tr>";
                                td += "<td>"+"1"+"</td>";
                                td +="<td>"+data.stu_name+"</td>";
                                td +="<td>"+data.class+"</td>";
                                td +="<td>"+data.roll+"</td>";
                                td +="<td>";
                                td +="<button class='btn btn-info view_student mr-3' id='showStudent' value='"+data.id+"'><i class='fas fa-eye text-white'></i></button>";
                                td +="<button class='btn btn-danger delete_btn mr-3' id='delete'><i class='fas fa-trash text-white'></i></button>";
                                td +="</td>";
                                td +="</tr>";

                                $("#sessionTable").html(td);
                            }

                        }
                    });
                });

        });
    </script>
@endsection

