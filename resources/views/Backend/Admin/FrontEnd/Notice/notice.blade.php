@extends('Backend.Admin.master')
@section('title')
    Notice
@endsection

@php($notices = \App\Models\Notice::all())

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
                    <h3>Notice</h3>
                </div>
                <div class="dropdown">
                    <a href="" class="fw-btn-fill btn-gradient-yellow" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus "></i> Add Notice</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table display data-table text-nowrap " id="myTable">
                    <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkAll">
                                <label class="form-check-label">ID</label>
                            </div>
                        </th>
                        <th>Title</th>
                        <th>Notice</th>
                        <th>Date</th>
{{--                        <th>Published</th>--}}
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($notices as $notice)
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td>{{$notice->title}}</td>
                            <td ><a href="{{route('notice.download',['id'=>$notice->id])}}" class="btn-primary btn">Download</a></td>
                            <td> {{date('d-m-Y', strtotime($notice->created_at))}} </td>

{{--                            <td class="badge badge-pill badge-{{$notice->status==1 ? 'success':'danger'}} d-block mg-t-12">{{$notice->status==1 ? 'Active':'Inactive'}}</td>--}}
{{--                            <td>--}}
                            <td>

                                @if($notice->status==1)
                                    <a class="dropdown-item" href="{{route('admin.frontend.notice.inactive',['id'=>$notice->id])}}"><i class="fas fa-arrow-circle-up text-success "></i></a>
                                @else
                                    <a class="dropdown-item" href="{{route('admin.frontend.notice.active',['id'=>$notice->id])}}"><i class="fas fa-arrow-circle-down text-primary"></i></a>
                                @endif
                                <a class="dropdown-item"  data-toggle="modal" data-target="#exampleModalCenter_{{$notice->id}}"><i class="fas fa-edit text-secondary"></i></a>

                                <button class="dropdown-item delete_btn" value="{{$notice->id}}" id="delete" ><i class="fas fa-trash text-danger "></i></button>

                                <div class="modal fade" id="exampleModalCenter_{{$notice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Update Notice</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="update_form" method="post" action="{{route('admin.frontend.notice.update')}}" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputEmail1">Title</label>
                                                        <input type="text" class="form-control" name="title" value="{{$notice->title}}" required >
                                                        <input type="hidden" class="form-control" name="id" value="{{$notice->id}}" >

                                                    </div>





                                                    <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputPassword1">Notice (PDF)</label>
                                                        <input type="file" class="form-control" name="notice"    >

                                                        {{--                                                            <input type="number" class="form-control" name="referral_bonus" value="{{$r->id}}" required>--}}
                                                    </div>

                                                    <div class="col-4-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                                        <button type="submit" class="fw-btn-fill btn-gradient-yellow">Update</button>
                                                    </div>


                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                                <script>
                                    var loadFile_{{$notice->id}} = function(event) {
                                        var output = document.getElementById('output_{{$notice->id}}');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        output.onload = function() {
                                            URL.revokeObjectURL(output_{{$notice->id}}.src) // free memory
                                        }
                                    };
                                </script>
                                <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

                                <script>
                                    CKEDITOR.replace( 'editor_{{$notice->id}}' );
                                </script>

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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Notice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="contact_form" method="post" action="{{route('admin.frontend.notice.save')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" name="title" value="" >

                        </div>



                        <div class="col-4-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputPassword1">Notice (pdf)</label>
                            <input type="file" class="form-control" name="notice"  >

                        </div>


                        <div class="col-4-xxxl col-xl-2 col-lg-3 col-12 form-group">


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
        if($('#contact_form'). length > 0){
            $('#contact_form').validate({
                rules: {
                    title: {
                        required:true,
                    }
                    ,notice:{
                        required:true,
                    }
                },
                messages:{
                    title: {
                        required:"Please enter notice title",
                    },
                   notice:{
                        required:"Please select notice Pdf",
                    }
                }
            })
        }


    </script>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
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
                                url:"notice/delete/"+emp_id,
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
