@extends('Backend.Admin.master')

@section('title')
    Daily Attendance
@endsection


@php
    $classes = \App\Models\Classes::all();
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
                    <h3>Daily Attendance Manage</h3>
                </div>
                <div class="dropdown">
                    {{-- @if(auth()->user()->hasPermission('app.classroutine.create')) --}}
                    <a href="{{ route('admin.dailyAttendance.index') }}" class="btn-fill-sm btn-gradient-yellow text-white"><span>Reload</span></a>
                    {{-- @endif --}}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('admin.dailyAttendance.attendance') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="form-group-lable">Session</label>
                                    <select name="session" id="sessionId" class="form-control">
                                        <option selected>--- select session ---</option>
                                           @foreach ($sessions as $session)
                                                <option {{ $loop->last == $session->id ? "selected" : " " }} value="{{ $session->session }}">{{ $session->session }}</option>
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
                                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                           @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="form-group-lable">Section</label>
                                    <select name="section" id="sectionId" class="form-control sectionId">
                                        <option selected>--- select section ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="form-group-lable">Date</label>
                                    <input type="date" name="date" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mt-5">
                                    <input type="submit" value="Serach Attendance" class="btn-fill-sm btn-gradient-yellow text-white">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('js')


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
