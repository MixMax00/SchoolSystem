@extends('Backend.Admin.master')
@section('title')
    Quotes Settings
@endsection

@php($settings = \App\Models\GeneralSettings::find(1))

@php($messages = \App\Models\Quote::all())

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
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Quotes</h3>
                </div>
                <div class="dropdown">
                    <a href="" class="fw-btn-fill btn-gradient-yellow" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i>Add Message</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table display data-table ">
                    <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkAll">
                                <label class="form-check-label">ID</label>
                            </div>
                        </th>
                        <th>Name</th>
                        <th>Message</th>
                        <th>Designation</th>
                        <th>Education</th>
                        <th>Image</th>
{{--                        <th>Published</th>--}}
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($messages as $message)
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td>{{$message->name}}</td>
                            <td width="200px">{!! \Illuminate\Support\Str::limit($message->quotes, 50, '...')!!}
                            <br><a class="font-bold btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalCenter-{{$message->id}}">Read more</a>
                            <div class="modal fade" id="exampleModalCenter-{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">{{$message->title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div style="white-space: initial; text-align: justify; /* For Edge */
  -moz-text-align-last: justify; /* For Firefox prior 58.0 */
  text-align-last: justify; " >
                                                {!! $message->quotes !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
                            <td >{{$message->designation}}</td>
                            <td>{{$message->education}}</td>
                            <td><img src="{{asset($message->image)}}" alt="" width="100px" height="100px"></td>
{{--                            <td class="badge badge-pill badge-{{$message->status==1 ? 'success':'danger'}} d-block mg-t-8  mt-5">{{$message->status==1 ? 'Active':'Inactive'}}</td>--}}

                            <td>

                                @if($message->status==1)
                                    <a class="dropdown-item" href="{{route('admin.frontend.message.inactive',['id'=>$message->id])}}"><i class="fas fa-arrow-circle-up text-success"></i></a>
                                @else
                                    <a class="dropdown-item" href="{{route('admin.frontend.message.active',['id'=>$message->id])}}"><i class="fas fa-arrow-circle-down text-primary"></i></a>
                                @endif
                                <a class="dropdown-item"  data-toggle="modal" data-target="#exampleModalCenter_{{$message->id}}"><i class="fas fa-edit text-secondary"></i></a>

                                <button value="{{$message->id}}" class="dropdown-item delete_btn" id="delete" ><i class="fas fa-trash text-danger"></i></button>

                                <div class="modal fade" id="exampleModalCenter_{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Update Message</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="update_form" method="post" action="{{route('admin.frontend.message.update')}}" enctype="multipart/form-data">
                                                    @csrf


                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputEmail1">Name</label>
                                                        <input type="text" class="form-control" required name="name" value="{{$message->name}}" >
                                                        <input type="hidden" class="form-control" required name="id" value="{{$message->id}}" >

                                                    </div>

                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputEmail1">Message</label>
                                                        <textarea type="text" class="form-control" name="message" required style="height: 20px" id="editor_{{$message->id}}" >{!!$message->quotes  !!}</textarea>

                                                    </div>
                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputPassword1">Designation</label>
                                                        <input type="text" class="form-control" name="designation" required value="{{$message->designation}}">

                                                    </div>
                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputPassword1">Education Details</label>
                                                        <input type="text" class="form-control" name="education_details" required value="{{$message->education}}">

                                                    </div>


                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputPassword1">Image</label>
                                                        <input type="file" class="form-control" name="image"  onchange="loadFile_{{$message ->id}}(event)" >
                                                        @if($message->image)
                                                        <img src="{{asset($message->image)}}" alt="" width="150px" height="150px" id="output_{{$message->id}}">
                                                        @else
                                                            <img src="{{asset('assets/backend/img/default.jpg')}}" alt="" width="150px" height="150px" id="output_{{$message->id}}">
                                                        @endif


                                                    </div>

                                                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
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
                                    var loadFile_{{$message ->id}} = function(event) {
                                        var output = document.getElementById('output_{{$message->id}}');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        output.onload = function() {
                                            URL.revokeObjectURL(output_{{$message->id}}.src) // free memory
                                        }
                                    };
                                </script>
                                <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

                                <script>
                                    CKEDITOR.replace( 'editor_{{$message->id}}' );
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="contact_form" method="post" action="{{route('admin.frontend.message.save')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" value="" >

                        </div>

                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputEmail1">Message</label>
                            <textarea type="text" class="form-control" name="message" style="height: 20px" id="editor" ></textarea>

                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputPassword1">Designation</label>
                            <input type="text" class="form-control" name="designation" required>

                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputPassword1">Education Details</label>
                            <input type="text" class="form-control" name="education_details" required>

                        </div>


                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputPassword1">Image</label>
                            <input type="file" class="form-control" name="image"  onchange="loadFile(event)" >
                            <img src="{{asset('assets/backend/img/default.jpg')}}" alt="" width="150px" height="150px" id="output">

                        </div>


                        <div class="col-1-xxxl col-xl-3 col-lg-3 col-12 form-group">
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
                  name: {
                      required:true,
                  },message:{
                      required:true,
                    },designation:{
                      required:true,
                    },education_details:{
                      required:true,
                    },image:{
                      required:true,
                    }
                },
                messages:{
                    name:{
                        required: "Please enter name",
                    },message:{
                        required: "Please enter message",
                    },designation:{
                        required: "Please enter designation",
                    },education_details:{
                        required: "Please enter education details",
                    },image:{
                        required: "Please enter image",
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
                                url:"message/delete/"+emp_id,
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

    {{--    <script>--}}
    {{--        loadFile = function(event, id) {--}}
    {{--            var output = document.getElementById('image');--}}
    {{--            output.src = URL.createObjectURL(event.target.files[0]);--}}
    {{--        };--}}
    {{--    </script>--}}
@endsection

