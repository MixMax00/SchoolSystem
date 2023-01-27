@extends('Backend.Admin.master')
@section('title')
    Manage Section
@endsection

@php($classes = \App\Models\Classes::all())

@section('content')
    <div class="breadcrumbs-area">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
            </ol>
        </nav>
    </div>

    <!-- Breadcubs Area End Here -->
    <div class="card">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Section</h3>
                </div>
                <div class="dropdown">
                    @if(auth()->user()->hasPermission('app.section.create'))
                    <a href="" class="fw-btn-fill btn-gradient-yellow" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Add Section</a>
                    @endif
                </div>
            </div>
            @include('Backend.Admin.Class.partials.nav')

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
                        <th>Section Name</th>
                        @if(auth()->user()->hasPermission('app.section.update'))
                        <th>Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sections as $section)
                        <tr>
                            <td>
                                {{ $loop->index +1 }}
                            </td>
                            <td>{{ $section->section_name }}</td>
                            <td>

                                @if(auth()->user()->hasPermission('app.section.create'))
                                <a class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter_{{$section->id}}"><i class="fas fa-edit text-white"></i></a>
{{--                                <a href="{{ route('course.status', ["id"=>$class->id]) }}" class="btn btn-{{ $class->status == 1 ? "success" : "warning" }}"><i class="fas fa-arrow-{{  $class->status == 1 ? "circle-up" : "circle-down" }}"></i></a>--}}
                                <button class="btn btn-danger delete_btn" value="{{$section->id}}" id="delete" ><i class="fas fa-trash text-white"></i></button>

                                @endif

                            </td>
                        </tr>

                        <div class="modal fade" id="exampleModalCenter_{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Section</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="class_form" method="post" action="{{route('admin.section.update')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                <label for="tradeTitle">Section Name</label>
                                                <input type="hidden" name="id" value="{{ $section->id }}"/>
                                                <input type="text" name="section_name" value="{{ $section->section_name }}" class="form-control" placeholder="Section Name" id="courseTitle">
                                            </div>
                                            <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                <label for="tradeCode">Class Name</label>
                                                <select class="form-control" name="class_id"  required>

                                                    @foreach($classes as $class)
                                                    <option {{ $class->id == $section->class_id ? "selected" : '' }} value="{{$class->id}}">{{$class->class_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-1-xxxl col-xl-3 col-lg-4 col-12 form-group">
                                                <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Update Section">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="class_form" method="post" action="{{route('admin.section.add')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeTitle">Section Name</label>
                            <input type="text" name="section_name" class="form-control" placeholder="Section Name" id="courseTitle">
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="tradeCode">Class Name</label>
                            <select class="form-control" name="class_id" required>

                                @foreach($classes as $all_class)
                                <option {{ $all_class->id == $class->id ? "selected" : " "   }} value="{{$all_class->id}}">{{$all_class->class_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-1-xxxl col-xl-3 col-lg-4 col-12 form-group">
                            <input type="submit" class="fw-btn-fill btn-gradient-yellow" value="Add Section">
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
                    class_id: {
                        required:true,
                    },section_name:{
                        required:true,
                    },

                },
                messages:{
                    class_id: {
                        required:"Please enter class name",
                    },section_name:{
                        required:"Please enter section name ",
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
                                url:"delete/section/"+emp_id,
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


