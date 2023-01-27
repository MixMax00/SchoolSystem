@extends('Backend.Admin.master')

@section('title')
    Student Result
@endsection

@php
    $examinations = \App\Models\ExamList::all();
    $classess = \App\Models\Classes::all();
    $sessions = \App\Models\SessionYear::all();
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
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Result</h3>
                </div>
            </div>
            <form class="mg-b-20" action="{{ route('admin.manageMark.getResult') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-3-xxxl col-xl-12 col-lg-12 col-12 inline-group">
                        <div class="row">
                            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                <label>Session</label>
                            </div>
                            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                <select class="form-control" name="session">
                                    <option selected>Select by Session</option>
                                    @foreach ($sessions as $session)
                                        <option value="{{ $session->session }}">{{ $session->session }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                <label>Examination</label>
                            </div>
                            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                <select class="form-control" name="examination">
                                    <option selected>Select by Examination</option>
                                    @foreach ($examinations as $exam)
                                        <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                <label>Class</label>
                            </div>
                            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                <select class="form-control" name="class">
                                    <option selected>Select by class</option>
                                    @foreach ($classess as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                <label>Select Institute Or Individual Student Result</label>
                            </div>
                            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                <select class="form-control" name="type" id="individual">
                                    <option selected>Select by result type</option>
                                    <option value="individual">Individual Student Result</option>
                                    <option value="full">Full Institute Result</option>
                                </select>
                            </div>
                        </div>
                        <div class="row hide">
                            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                <label>Roll</label>

                            </div>
                            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                <input type="text" name="roll" placeholder="Search by roll ..." class="form-control">
                            </div>
                        </div>
                        <div class="row school-hide">
                            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                <label>School Id</label>

                            </div>
                            <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                                <input type="text" name="school_id" placeholder="Search by school Id ..." class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">
                            </div>
                            <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                <button type="submit" class="fw-btn-fill btn-gradient-yellow">Get Result</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection



@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function(){
            $(".hide").hide();
            $('.school-hide').hide();
            $("#individual").change(function(){
                let type = $(this).val();

                if(type == "individual"){
                    $(".hide").show();
                    $('.school-hide').hide();
                }else{
                    $(".hide").hide();
                    $('.school-hide').show();
                }

            });
        });
    </script>


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


    </script>



@endsection
