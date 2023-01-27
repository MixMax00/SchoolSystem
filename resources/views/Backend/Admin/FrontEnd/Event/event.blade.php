@extends('Backend.Admin.master')
@section('title')
    Event Settings
@endsection

@php($events = \App\Models\Event::all())



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
                    <h3>Event</h3>
                </div>
                <div class="dropdown">
                    <a href="" class="fw-btn-fill btn-gradient-yellow" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Add Event</a>


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
                        <th>Event Details</th>
                        <th>Event Date</th>
                        <th>Image</th>
                        {{--                        <th>Published</th>--}}
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($events as $event)
                        <tr>
                            <td>
                                {{$i++}}
                            </td>
                            <td>{{$event->title}}</td>
                            <td width="200px">{!! \Illuminate\Support\Str::limit($event->details, 50, '...')!!}<a class="font-bold " data-toggle="modal" data-target="#exampleModalCenter-{{$event->id}}"><u>Read more</u></a>
                                <div class="modal fade" id="exampleModalCenter-{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">{{$event->title}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div style="white-space: initial; text-align: justify; /* For Edge */
  -moz-text-align-last: justify; /* For Firefox prior 58.0 */
  text-align-last: justify; " >
                                                        {!! $event->details !!}
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$event->event_date}}</td>
                            <td>
                                @if($event->image)
                                    <img src="{{asset($event->image)}}" alt="" width="100px" height="100px">
                                @else
                                    <img src="{{asset('assets/backend/img/default.jpg')}}" alt="" width="100px" height="100px">
                                @endif
                            </td>
{{--                                                    <td class="badge badge-pill badge-{{$event->status==1 ? 'success':'danger'}} d-block mg-t-8">{{$event->status==1 ? 'Active':'Inactive'}}</td>--}}
                            <td>

                                @if($event->status==1)
                                    <a class="dropdown-item" href="{{route('admin.frontend.event.inactive',['id'=>$event->id])}}"><i class="fas fa-arrow-circle-up text-success"></i></a>
                                @else
                                    <a class="dropdown-item" href="{{route('admin.frontend.event.active',['id'=>$event->id])}}"><i class="fas fa-arrow-circle-down text-primary"></i></a>
                                @endif
                                <a class="dropdown-item"  data-toggle="modal" data-target="#exampleModalCenter_{{$event->id}}"><i class="fas fa-edit text-secondary"></i></a>

                                <button class="dropdown-item delete_btn" value="{{$event->id}}" id="delete" ><i class="fas fa-trash text-danger "></i></button>

                                <div class="modal fade" id="exampleModalCenter_{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Update Event</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="update_form" method="post" action="{{route('admin.frontend.event.update')}}" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputEmail1">Title</label>
                                                        <input type="text" class="form-control" name="title" value="{{$event->title}}" required >
                                                        <input type="hidden" class="form-control" name="id" value="{{$event->id}}" >

                                                    </div>

                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputEmail1">Event Details</label>
                                                        <textarea type="text" class="form-control" name="event_details" style="height: 20px" id="editor_{{$event->id}}" required >{!! $event->details !!}</textarea>

                                                    </div>
                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputPassword1">Event Date</label>
                                                        <input type="date" class="form-control" name="event_date" required value="{{$event->event_date}}">
                                                    </div>


                                                    <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                                                        <label for="exampleInputPassword1">Image</label>
                                                        <input type="file" class="form-control" name="image"   onchange="loadFile_{{$event->id}}(event)" >
                                                        @if($event->image)
                                                            <img src="{{asset($event->image)}}" alt="" width="150px" height="150px" id="output_{{$event->id}}">
                                                        @else
                                                            <img src="{{asset('assets/backend/img/default.jpg')}}" alt="" width="150px" height="150px" id="output_{{$event->id}}">
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
                                                                </div>
                                                            </div>
                                <script>
                                    var loadFile_{{$event->id}} = function(event) {
                                        var output = document.getElementById('output_{{$event->id}}');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        output.onload = function() {
                                            URL.revokeObjectURL(output_{{$event->id}}.src) // free memory
                                        }
                                    };
                                </script>
                                <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

                                <script>
                                    CKEDITOR.replace( 'editor_{{$event->id}}' );
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="contact_form" method="post" action="{{route('admin.frontend.event.save')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" name="title" value="" >

                        </div>

                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputEmail1">Event Details</label>
                            <textarea type="text" class="form-control" name="event_details" style="height: 20px" id="editor" ></textarea>

                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputPassword1">Event Date</label>
                            <input type="date" class="form-control" name="event_date" required>
                            {{--                                                            <input type="number" class="form-control" name="referral_bonus" value="{{$event->id}}" required>--}}
                        </div>

                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <label for="exampleInputPassword1">Image</label>
                            <input type="file" class="form-control" name="image"  onchange="loadFile(event)" >
                            {{--                                                            <input type="number" class="form-control" name="referral_bonus" value="{{$event->id}}" required>--}}
                        </div>
                        <div class="col-1-xxxl col-xl-12 col-lg-12 col-12 form-group">
                            <img src="{{asset('assets/backend/img/default.jpg')}}" alt="" width="150px" height="150px" id="output">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        if($('#contact_form'). length > 0){
            $('#contact_form').validate({
                rules: {
                    title: {
                        required:true,
                    },event_details:{
                        required:true,
                    },event_date:{
                        required:true,
                    },image:{
                        required:true,
                    }
                },
                messages:{
                    title: {
                        required:"Please enter Your title",
                    },event_details:{
                        required:"Please enter event details",
                    },event_date:{
                        required:"please enter event date",
                    },image:{
                        required:"Please select image",
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
                                url:"event/delete/"+emp_id,
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

