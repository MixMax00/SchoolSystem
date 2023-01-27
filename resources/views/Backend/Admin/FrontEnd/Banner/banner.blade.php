@extends('Backend.Admin.master')
@section('title')
    Banners
@endsection

@php($settings = \App\Models\GeneralSettings::find(1))

@php($banners = \App\Models\Banner::all())

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
                    <h3> Banners</h3>
                </div>
                <div class="dropdown">
                    <a href="" class="btn-fill-md text-light bg-orange-peel" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus "></i>Add Banner</a>

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
                        <th>Headings</th>
                        {{-- <th>email</th> --}}
                        {{-- <th>phone</th> --}}
                        <th>Image</th>
{{--                        <th>Published</th>--}}
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($banners as $banner)
                    <tr>
                        <td>
                           {{$i++}}
                        </td>
                        <td>{{$banner->headings}}</td>
{{--                        <td>{!! $banner->short_description!!}</td>--}}
                        {{-- <td width="200px">{!! \Illuminate\Support\Str::limit($banner->short_description, 50, '...')!!}
                            <br><a class="font-bold btn btn-primary text-white" data-toggle="modal" data-target="#exampleModalCenter-{{$banner->id}}">Read more</a>
                            <div class="modal fade" id="exampleModalCenter-{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">{{$banner->title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div style="white-space: initial; text-align: justify; /* For Edge */
  -moz-text-align-last: justify; /* For Firefox prior 58.0 */
  text-align-last: justify; " >
                                                {!! $banner->short_description !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td> --}}
                        {{-- <td>{{$banner->email}}</td> --}}

                        <td class="text-center">
                            @if($banner->image)
                            <img src="{{asset($banner->image)}}" alt="" width="100px" height="100px">
                            @else
                                <img src="{{asset('assets/backend/img/default.jpg')}}" alt="" width="100px" height="100px">
                            @endif
                        </td>
{{--                        <td class="badge badge-pill badge-{{$banner->status==1 ? 'success':'danger'}} d-block mg-t-8">{{$banner->status==1 ? 'Active':'Inactive'}}</td>--}}
                        <td>

                                    @if($banner->status==1)
                                    <a class="btn-fill-sm" href="{{route('admin.frontend.banner.inactive',['id'=>$banner->id])}}"><i class="fas fa-arrow-circle-up text-success"></i></a>
                                    @else
                                        <a class="btn-fill-sm" href="{{route('admin.frontend.banner.active',['id'=>$banner->id])}}"><i class="fas fa-arrow-circle-down text-primary"></i></a>
                                    @endif
                                        <a class="btn-fill-sm"  data-toggle="modal" data-target="#exampleModalCenter_{{$banner->id}}"><i class="fas fa-edit text-secondary"></i></a>

                                        <button class="btn-fill-sm  delete_btn" value="{{$banner->id}}" id="delete" ><i class="fas fa-trash text-danger "></i></button>

                                        <div class="modal fade" id="exampleModalCenter_{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Banner</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="update_form" method="post" action="{{route('admin.frontend.banner.update')}}" enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Headings</label>
                                                                <input type="text" class="form-control" name="headings" value="{{$banner->headings}}" required >
                                                                <input type="hidden" class="form-control" name="id" value="{{$banner->id}}" >

                                                            </div>

                                                            {{-- <div class="form-group">
                                                                <label for="exampleInputEmail1">Short Description</label>
                                                                <textarea type="text" class="form-control" name="short_description" style="height: 20px" id="editor_{{$banner->id}}" required >{!! $banner->short_description !!}</textarea>

                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Mobile Number</label>
                                                                <input type="text" class="form-control" name="phone" required value="{{$banner->phone}}">
                                                                {{--                                                            <input type="number" class="form-control" name="referral_bonus" value="{{$r->id}}" required>--}}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Email</label>
                                                                <input type="email" class="form-control" name="email" required value="{{$banner->email}}"  >
                                                                {{--                                                            <input type="number" class="form-control" name="referral_bonus" value="{{$r->id}}" required>--}}
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Image</label>
                                                                <input type="file" class="form-control" name="image"   onchange="loadFile_{{$banner->id}}(event)" >
                                                                @if($banner->image)
                                                                <img src="{{asset($banner->image)}}" alt="" width="150px" height="150px" id="output_{{$banner->id}}">
                                                                @else
                                                                    <img src="{{asset('assets/backend/img/default.jpg')}}" alt="" width="150px" height="150px" id="output_{{$banner->id}}">
                                                                @endif
                                                                    {{--                                                            <input type="number" class="form-control" name="referral_bonus" value="{{$r->id}}" required>--}}
                                                            </div>



                                                            <button type="submit" class="btn btn-primary">Update</button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                </div>--}}
{{--                            </div>--}}
                            <script>
                                var loadFile_{{$banner->id}} = function(event) {
                                    var output = document.getElementById('output_{{$banner->id}}');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                        URL.revokeObjectURL(output_{{$banner->id}}.src) // free memory
                                    }
                                };
                            </script>
                            <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

                            <script>
                                CKEDITOR.replace( 'editor_{{$banner->id}}' );
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
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="contact_form" method="post" action="{{route('admin.frontend.banner.save')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Headings</label>
                            <input type="text" class="form-control" name="headings" value="" >

                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Short Description</label>
                            <textarea type="text" class="form-control" name="short_description" style="height: 20px" id="editor" ></textarea>

                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mobile Number</label>
                            <input type="text" class="form-control" name="phone" required>
                            {{--                                                            <input type="number" class="form-control" name="referral_bonus" value="{{$r->id}}" required>--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" name="email" value=""  >
                                                                              {{-- <input type="number" class="form-control" name="referral_bonus" value="{{$r->id}}" required> --}}
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Image</label>
                            <input type="file" class="form-control" name="image"  onchange="loadFile(event)" >
                            {{--                                                            <input type="number" class="form-control" name="referral_bonus" value="{{$r->id}}" required>--}}
                        </div>
                        <div class="form-group">
                        <img src="{{asset('assets/backend/img/default.jpg')}}" alt="" width="150px" height="150px" id="output">
                        </div>


                        <button type="submit" class="btn btn-primary">Save</button>

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
                    headings: {
                        required:true,
                    },phone:{
                        required:true,
                    },image:{
                        required:true,
                    },email:{
                        required:true,
                        email:true,
                    }
                },
                messages:{
                    headings: {
                        required:"Please enter Your headings",
                    },short_description:{
                        required:"Please enter short description",
                    },phone:{
                        required:"please enter mobile number",
                    },image:{
                        required:"Please select image",
                    },email:{
                        required:"Please enter email",
                        email:"Please enter a valid email",
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
                                url:"banner/delete/"+emp_id,
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
