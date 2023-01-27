@extends('Backend.Admin.master')
@section('title')
    Gallery
@endsection

@section('css')

    <style type="text/css">
        .custom-img{
            position: relative;
            box-sizing: border-box;
        }


        .overlay{
            position: absolute;
            top: 0;
            left: 0;
            background-color:rgba(0, 255, 0, 0.3);
            width: 100%;
            height: 92%;
            border-radius: 5px;
            box-sizing: border-box;
            opacity: 0;

        }
        .overlay a i{
            padding-top: 65px;
            margin-left: 40%;
        }

        .custom-img:hover .overlay{
            opacity: 1;
        }


        .upload-gallery{
            position: relative;
            width: 100%;
            background-color:rgba(0, 255, 0, 0.5);
            margin-top: 13px;
            padding: 20px 25px 45px 5px;
            border-radius: 5px;
            color: #000;
        }
        .gall-image{
            position: absolute;
            padding-right:5px;
            width: 100%;
            top: 30%;
            left: 0%;
        }

         .gall-image[type="file"]{

           padding-left: 3px;
           margin: 0!important;
         }
    </style>

@endsection

@php($galleries = \App\Models\Gallery::with('galleries')->get())
{{--{{dd ($galleries)}}--}}

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
                    <h3>Gallery</h3>
                </div>
                <div class="dropdown">
                    <a href="" class="fw-btn-fill btn-gradient-yellow" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus "></i> Add Gallery</a>


                </div>
            </div>
            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                    <tr>
                        <th>
                            <div class="form-check">
{{--                                <input type="checkbox" class="form-check-input checkAll">--}}
                                <label class="form-check-label">ID</label>
                            </div>
                        </th>
                        <th>Title</th>
                        <th>Title Image</th>
                        <th>Total Image</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($galleries as $gallery)
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td>{{$gallery->title}}</td>
                            <td><img src="{{asset($gallery->title_image)}}" alt="" width="100px" height="100px"></td>
{{--                            <td><img src="{{asset()}}" alt="" width="100px" height="100px"></td>--}}
                            <td>{{$gallery->total_image}}</td>
                            <td> {{date('d-m-Y', strtotime($gallery->created_at))}} </td>


                            <td>
                                @if($gallery->status==1)
                                    <a class="dropdown-item" href="{{route('admin.frontend.gallery.inactive',['id'=>$gallery->id])}}"><i class="fas fa-arrow-circle-up text-success "></i></a>
                                @else
                                    <a class="dropdown-item" href="{{route('admin.frontend.gallery.active',['id'=>$gallery->id])}}"><i class="fas fa-arrow-circle-down text-primary"></i></a>
                                @endif
                                <a class="dropdown-item"  data-toggle="modal" data-target="#gallery_{{$gallery->id}}"><i class="fas fa-eye text-secondary"></i></a>
                                <a class="dropdown-item"  data-toggle="modal" data-target="#exampleModalCenter_{{$gallery->id}}"><i class="fas fa-edit text-secondary"></i></a>

                                <button class="dropdown-item delete_btn" value="{{$gallery->id}}" id="delete" ><i class="fas fa-trash text-danger "></i></button>

                                <div class="modal fade" id="exampleModalCenter_{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Update Gallery</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="update_form" method="post" action="{{ route('admin.frontend.gallery.update') }}" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputEmail1">Title</label>
                                                        <input type="hidden" class="form-control" name="id" value="{{ $gallery->id }}" >
                                                        <input type="text" class="form-control" name="title" value="{{ $gallery->title }}" >

                                                    </div>

                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputEmail1">Title Image</label>
                                                        <input type="file" class="form-control" name="title_image" value="" onchange="loadFile_{{$gallery->id}}(event)">

                                                    </div>
                                                     <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">

                                                        <img src="{{asset($gallery->title_image)}}" alt="" id="output_{{$gallery->id}}"  width="100px" height="200px">

                                                    </div>


                                                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                                                        <button type="submit" class="fw-btn-fill btn-gradient-yellow">Update</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    var loadFile_{{$gallery->id}} = function(event) {
                                        var output = document.getElementById('output_{{$gallery->id}}');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        output.onload = function() {
                                            URL.revokeObjectURL(output_{{$gallery->id}}.src) // free memory
                                        }
                                    };
                                </script>

                                <div class="modal fade" id="gallery_{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Gallery</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               @php($galleries = \App\Models\GalleryImage::where('gallery_id',$gallery->id)->get())
                                               <div class="row d-flex justify-content-center align-items-center g-3 mt-5">
                                                    @foreach($galleries as $single_gallery)
                                                      <div class="col-1-xxxl col-xl-3 col-lg-3 col-12 form-group">
                                                        <div class="custom-img">
                                                             <img
                                                              class="imf-fluid img mb-4"
                                                              src="{{ isset($single_gallery->gallery_image) ? asset($single_gallery->gallery_image) : ''}}"
                                                              alt=""
                                                            />

                                                            <div class="overlay">
                                                                 <a class="delete_btn_gallery" data-gallery-id="{{ $single_gallery->id}}" id="delete" ><i class="fas fa-2x fa-trash text-danger"></i></a>
                                                            </div>
                                                        </div>

                                                      </div>

                                                    @endforeach

                                                    <div class="col-1-xxxl col-xl-3 col-lg-3 col-12 form-group">

                                                            <div class="card">
                                                               <form action="{{ route('admin.frontend.gallery.add') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                        <label for="gallImage" class="upload-gallery mt-4 pl-4">Image Upload</label>
                                                                        <input type="hidden" name="id" value="{{ $gallery->id }}">
                                                                        <input type="file" id="gallImage" class="d-none" name="gallery_image[]" multiple>
                                                                    </div>
                                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                                        <button type="submit" class="fw-btn-fill btn-gradient-yellow">Upload</button>
                                                                    </div>
                                                               </form>
                                                            </div>


                                                    </div>
                                                </div>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="contact_form" method="post" action="{{route('admin.frontend.gallery.save')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" name="title" value="" >

                        </div>

                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputEmail1">Title Image</label>
                            <input type="file" class="form-control" name="title_image" value="" />

                        </div>

                       {{--  <div class="form-group">
                            <label for="exampleInputEmail1">Preview Image</label>
                            <img src="{{asset('assets/backend/img/default.jpg')}}" alt="" id="output_img"  width="100px" height="200px">

                        </div> --}}

                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputPassword1">Gallery Image</label>
                            <input type="file" class="form-control" name="gallery_image[]" multiple  >

                        </div>



                        <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                            <button type="submit" class="fw-btn-fill btn-gradient-yellow">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('js')


    {{-- <script>
        var loadFile_img = function(event) {
            var output = document.getElementById('output_img');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output_img.src) // free memory
            }
        };
    </script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        if($('#contact_form'). length > 0){
            $('#contact_form').validate({
                rules: {
                    title: {
                        required:true,
                    }
                    ,title_image: {
                        required:true,
                    }
                    ,gallery_image: {
                        required:true,
                    }

                },
                messages:{
                    title: {
                        required:"Please enter gallery title",
                    },
                    title_image:{
                        required:"Please select title image",
                    },
                    gallery_image:{
                        required:"Please select multiple image",
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

            $(document).on('click', '.delete_btn_gallery', function (e){
                e.preventDefault();
                let emp_id = $(this).attr('data-gallery-id');

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
                                url:"image/gallery/delete/"+emp_id,
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
                                url:"gallery/delete/"+emp_id,
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
