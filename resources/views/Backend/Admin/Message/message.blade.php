@extends('Backend.Admin.master')
@section('title')
    Message
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
            Message
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
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Subject</th>
                      <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($messages = \App\Models\Contact::where('school_id', 'ins-39405')->get())
                    @foreach($messages as $message)
                    <tr>
                        <td>
                           {{ $loop->index +1 }}
                        </td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ $message->subject }}</td>
                        {{-- <td width="200px">{{ \Illuminate\Support\Str::limit($message->subject, 50, '...')}}<a class="font-bold " data-toggle="modal" data-target="#exampleModalCenter-{{$message->id}}"><u>Read more</u></a>
                                <div class="modal fade" id="exampleModalCenter-{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">{{$message->subject}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div style="white-space: initial; text-align: justify; /* For Edge */
  -moz-text-align-last: justify; /* For Firefox prior 58.0 */
  text-align-last: justify; " >
                                                        {{ $message->message }}
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td> --}}
                        <td>
                         <button class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter-{{$message->id}}"><i class="fas fa-eye text-info "></i></button>
                         <button class="dropdown-item delete_btn" value="{{$message->id}}" id="delete" ><i class="fas fa-trash text-danger "></i></button>

                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModalCenter-{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{$message->subject}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="mb-3">
                                                <h4><strong>Name: </strong>{{ $message->name }}</h4>
                                                <p><strong>Email: </strong>{{ $message->email }}</p>
                                                <p><strong>Phone: </strong>{{ $message->phone }}</p>
                                                <p><strong>Sub: </strong> {{ $message->subject }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div style="white-space: initial; text-align: justify; text-align-last: justify;" >
                                                {{ $message->message }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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



@endsection
