@extends('Backend.Admin.master')
@section('title')
    Trade
@endsection

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
        <div class="card-header">
            Trade
            @if(auth()->user()->hasPermission('app.trade.create'))
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus "></i></a>
            @endif
        </div>
        <div class="card-body">
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
                        <th>Trade Name</th>
                        <th>Trade Id</th>
                        <th>Course Name</th>
                        <th>Total Sit</th>
                        <th>Fillup Sit</th>
                        <th>Ablable Sit</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trades as $trade)
                    <tr>
                        <td>
                           {{ $loop->index +1 }}
                        </td>
                        <td>{{ $trade->trade_title}}</td>
                        <td>{{ $trade->trade_code }}</td>
                        <td>{{ $trade->courses->course_name }}</td>
                        <td>{{ $trade->total_sit }}</td>
                        <td>{{ $trade->fillup_sit }}</td>
                        <td>{{ $trade->ablable_sit }}</td>
                        <td>{{ $trade->status == 1 ? "Active" : "Inactive" }}</td>
                        <td>

                            @if(auth()->user()->hasPermission('app.trade.create'))
                            <a href="{{ route('trade.edit', ["id"=>$trade->id]) }}"  class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter_{{$trade->id}}"><i class="fas fa-edit text-white"></i></a>
                            <a href="{{ route('trade.status', ["id"=>$trade->id]) }}" class="btn btn-{{ $trade->status == 1 ? "success" : "warning" }}"><i class="fas text-white fa-arrow-{{  $trade->status == 1 ? "circle-up" : "circle-down" }}"></i></a>
                              <button class="btn btn-danger delete_btn" value="{{$trade->id}}" id="delete" ><i class="fas fa-trash text-white"></i></button>
                            @endif  

                            <div class="modal fade" id="exampleModalCenter_{{$trade->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Trade</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="update_form" method="post" action="{{route('trade.update')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                  <label for="tradeTitle">Trade Title</label>
                                                   <input type="hidden" name="id"  value="{{ $trade->id }}"  id="tradeTitle">
                                                  <input type="text" name="trade_title" class="form-control" value="{{ $trade->trade_title }}"  id="tradeTitle">
                                                </div>
                                                <div class="form-group">
                                                  <label for="tradeCode">Trade Code</label>
                                                  <input type="text" name="trade_code" class="form-control" value="{{ $trade->trade_code }}" id="tradeCode">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tradeTitle">Course Name</label>
                                                    <select class="form-control" name="course_id">
                                                      @foreach($courses as $course)
                                                        <option {{ $course->id == $trade->course_id ? 'selected' : ''  }}  value="{{ $course->id }}">{{ $course->course_name }}</option>
                                                      @endforeach
                                                    </select>

                                                  </div>
                                                  <div class="form-group">
                                                      <label for="tradeTitle">Total Sit</label>
                                                      <input type="text" name="total_sit" value="{{ $trade->total_sit }}" class="form-control"  id="tradeTitle">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="tradeTitle">Ablable Sit</label>
                                                      <input type="text" name="ablable_sit" value="{{ $trade->ablable_sit }}" class="form-control" id="tradeTitle">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="tradeTitle">Fillup Sit</label>
                                                      <input type="text" name="fillup_sit" value="{{ $trade->fillup_sit }}" class="form-control"  id="tradeTitle">
                                                  </div>

                                                <div class="form-group">
                                                  <label for="tradeCode">Status</label>
                                                  <select class="form-control" name="status">
                                                      <option {{  $trade->status == 1 ? "selected" : " " }} value="1">Active</option>
                                                      <option {{  $trade->status == 0 ? "selected" : " " }} value="0">Inactive</option>
                                                  </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-warning w-100" value="Update">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                             {{--

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
 --}}
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Trade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="contact_form" method="post" action="{{ route('trade.create.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="tradeTitle">Trade Title</label>
                          <input type="text" name="trade_title" class="form-control" placeholder="" id="tradeTitle">
                        </div>
                        <div class="form-group">
                          <label for="tradeCode">Trade Code</label>
                          <input type="text" name="trade_code" class="form-control" placeholder="" id="tradeCode">
                        </div>
                        <div class="form-group">
                          <label for="tradeTitle">Course Name</label>
                          <select class="form-control" name="course_id">
                            @foreach($courses as $course)
                              <option  value="{{ $course->id }}">{{ $course->course_name }}</option>
                            @endforeach
                          </select>

                        </div>
                        <div class="form-group">
                            <label for="tradeTitle">Total Sit</label>
                            <input type="text" name="total_sit" class="form-control"  id="tradeTitle">
                        </div>
                        <div class="form-group">
                            <label for="tradeTitle">Ablable Sit</label>
                            <input type="text" name="ablable_sit" class="form-control" id="tradeTitle">
                        </div>
                        <div class="form-group">
                            <label for="tradeTitle">Fillup Sit</label>
                            <input type="text" name="fillup_sit" class="form-control"  id="tradeTitle">
                        </div>
                        <div class="form-group">
                          <label for="tradeCode">Status</label>
                          <select class="form-control" name="status">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning w-100" value="Add Trade">
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
                    headings: {
                        required:true,
                    },short_description:{
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
                                url:"delete/trade/"+emp_id,
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
