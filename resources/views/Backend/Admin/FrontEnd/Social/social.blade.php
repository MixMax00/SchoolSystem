@extends('Backend.Admin.master')
@section('title')
    Social Settings
@endsection

@php($social_settings = \App\Models\SocialSettings::all())



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
                    <h3>Social Settings</h3>
                </div>
                <div class="dropdown">
                    <a href="" class="fw-btn-fill btn-gradient-yellow" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus "></i> Add</a>
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
                        <th>Title</th>
                        <th>Icon</th>
                        <th>Url</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($social_settings as $social)
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td>{{ $social->title }}</td>
                            <td>{!! $social->icon !!}</td>
                            <td>{{$social->url}}</td>
                            <td>
                                @if($social->status==1)
                                    <a class="dropdown-item" href="{{ route('admin.frontend.social.inactive', ["id"=>$social->id]) }}"><i class="fas fa-arrow-circle-up text-success"></i></a>
                                @else
                                    <a class="dropdown-item" href="{{ route('admin.frontend.social.active', ["id"=>$social->id]) }}"><i class="fas fa-arrow-circle-down text-primary"></i></a>
                                @endif
                                <a class="dropdown-item"  data-toggle="modal" data-target="#exampleModalCenter_{{$social->id}}"><i class="fas fa-edit text-secondary"></i></a>

                                <button class="dropdown-item delete_btn" value="{{$social->id}}" id="delete" ><i class="fas fa-trash text-danger "></i></button>

                                <div class="modal fade" id="exampleModalCenter_{{$social->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Update Social Settings</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="update_form" method="post" action="{{ route('admin.frontend.social.update') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
							                            <label for="exampleInputEmail1">Social Title</label>
							                            <input type="hidden" class="form-control" name="id" value="{{ $social->id }}" required >
							                            <input type="text" class="form-control" name="title" value="{{ $social->title }}">
							                        </div>
                                                    <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputEmail1">Social Icon code</label>
                                                        <input type="text" class="form-control" name="icon" value="{{ $social->icon }}" >
                                                    </div>
                                                    <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputPassword1">Social Url</label>
                                                        <input type="text" class="form-control" name="social_url" required value="{{$social->url}}">
                                                    </div>
                                                    <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                                        <button type="submit" class="fw-btn-fill btn-gradient-yellow">Update</button>
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
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Social Icon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="social_settings_form" method="post" action="{{ route('admin.frontend.social.save') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputEmail1">Social Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputEmail1">Icon Code</label>
                            <input type="text" class="form-control" name="icon" required>
                        </div>
                        <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputPassword1">Social Icon Url</label>
                            <input type="text" class="form-control" name="social_url" required>
                        </div>
                        <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                            <button type="submit" class="fw-btn-fill btn-gradient-yellow">Save</button>
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
        if($('#social_settings_form'). length > 0){
            $('#social_settings_form').validate({
                rules: {
                	title:{
                		required:true,
                	},icon: {
                        required:true,
                    },social_url:{
                        required:true,
                    }
                },
                messages:{
                	title:{
                		required:"Please enter social title",
                	},icon: {
                        required:"Please enter social icon",
                    },social_url:{
                        required:"please enter social url",
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
                                url:"social/delete/"+emp_id,
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

