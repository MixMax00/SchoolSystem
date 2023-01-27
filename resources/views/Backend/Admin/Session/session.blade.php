
@extends('Backend.Admin.master')
@section('title')
    Session Settings
@endsection

@php($sessions = \App\Models\SessionYear::all())

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
                    <h3>Session</h3>
                </div>
                <div class="dropdown">
                    @if(auth()->user()->hasPermission('app.session.create'))
                     <a href="" class="fw-btn-fill btn-gradient-yellow" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Add Session</a>
                    @endif
                </div>
            </div>
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
                        <th>Session</th>
                        @if(auth()->user()->hasPermission('app.session.update'))
                        <th>Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sessions as $s)
                        <tr>
                            <td>
                                {{ $loop->index +1 }}
                            </td>
                            <td>{{ $s->session }}</td>

                            <td>

                                @if(auth()->user()->hasPermission('app.session.update'))
                                <a class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter_{{$s->id}}"><i class="fas fa-edit text-white"></i></a>
{{--                                                                <a href="{{ route('course.status', ["id"=>$s->id]) }}" class="btn btn-{{ $class->status == 1 ? "success" : "warning" }}"><i class="fas fa-arrow-{{  $class->status == 1 ? "circle-up" : "circle-down" }}"></i></a>--}}
                                <button class="btn btn-danger delete_btn" value="{{$s->id}}" id="delete" ><i class="fas fa-trash text-white"></i></button>
                                @endif
                                <div class="modal fade" id="exampleModalCenter_{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Session</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="class_form2" method="post" action="{{route('admin.session.update')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="tradeTitle">Session</label>
                                                        <input type="text" name="session_name" value="{{$s->session}}" class="form-control" placeholder="Class Name" id="courseTitle">
                                                        <input type="hidden" name="id" value="{{$s->id}}" class="form-control" >
                                                    </div>

                                                    <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">
                                                        <button type="submit" class="fw-btn-fill btn-gradient-yellow">Update Session</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Session</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="class_form" method="post" action="{{route('admin.session.add')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Class Name</label>
                            <input type="text" name="session_name" class="form-control" placeholder="Session" id="courseTitle">
                        </div>

                        <div class="col-1-xxxl col-xl-4 col-lg-4 col-12 form-group">
                            <button type="submit" class="fw-btn-fill btn-gradient-yellow">Add Session</button>
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
        if($('#class_form'). length > 0){
            $('#class_form').validate({
                rules: {
                    session: {
                        required:true,
                    }

                },
                messages:{
                    session: {
                        required:"Please Enter Session (2001-2002)",
                    }
                }
            })
        }


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
                    if(result){
                        if (result.isConfirmed) {
                            $.ajax({
                                type:"GET",
                                url:"session/delete/session/"+emp_id,
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

