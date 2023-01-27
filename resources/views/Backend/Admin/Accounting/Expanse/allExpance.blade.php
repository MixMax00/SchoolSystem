@extends('Backend.Admin.master')
@section('title')
   All Expanse
@endsection


@php
    $expnacesive_lists = \App\Models\ExpancesiveList::all();
    $expanseTypies = \App\Models\Expance::all();
    $sessions = \App\Models\SessionYear::all();
@endphp

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
        <!-- Add Expense Area Start Here -->
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>All Expenses</h3>
                    </div>
                   <div class="dropdown">
                    @if(auth()->user()->hasPermission('app.exam.create'))
                    <button class="fw-btn-fill btn-gradient-yellow" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus mr-2"></i><span>Add Expance</span></button>
                    @endif
                    </div>
                </div>
                <form class="mg-b-20">
                    <div class="row gutters-8">
                        <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                            <input type="text" placeholder="Search by ID ..." class="form-control">
                        </div>
                        <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                            <input type="text" placeholder="Search by Name ..." class="form-control">
                        </div>
                        <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                            <input type="text" placeholder="Search by Phone" class="form-control">
                        </div>
                        <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                            <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table data-table text-nowrap">
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
                                <th>Email</th>
                                <th>Ex. Type</th>
                                <th>Month</th>
                                <th>Pay / Salary</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($expnacesive_lists as $expance)


                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">#{{ $loop->index +1 }}</label>
                                    </div>
                                </td>
                                <td>{{ $expance->user_name }}</td>
                                <td>{{ $expance->phone }}</td>
                                <td>{{ $expance->email}}</td>
                                <td>{{ $expance->expance_type }}</td>
                                <td>{{ $expance->month }}</td>
                                <td>{{ $expance->pay == null ? $expance->salary : $expance->pay}}</td>
                                <td>{{ $expance->pay_status }}</td>
                                <td>{{ $expance->date }}</td>
                                 <td>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalCenter_{{ $expance->id}}"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>


                            <div class="modal fade" id="exampleModalCenter_{{ $expance->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Expanse List</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="new-added-form" action="{{ route('admin.accounting.allExpanceUpdate') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                        <label> Expanse Type *</label>
                                                        <input type="hidden" name="id" value="{{ $expance->id }}">
                                                        <select name="expanse_type" id="expanseType" class="form-control">
                                                            <option selected>Please select</option>
                                                            @foreach ($expanseTypies as $expanseType)
                                                                <option {{ $expance->expance_type == $expanseType->id ? "selected" : " "  }} value="{{ $expanseType->id }}">{{ $expanseType->expance_name }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                        <label> Name *</label>
                                                        <input type="text" name="user_name" value="{{ $expance->user_name }}" id="" class="form-control">
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                        <label> Email *</label>
                                                        <input type="email" name="email" value="{{ $expance->email }}" id="" class="form-control">
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                        <label> phone *</label>
                                                        <input type="text" name="phone" value="{{ $expance->phone }}" id="" class="form-control">
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                        <label> Pay *</label>
                                                        <input type="text" name="pay" value="{{ $expance->pay }}" id="" class="form-control">
                                                    </div>

                                                        @php
                                                            $var =  explode("_",$expance->month);
                                                        @endphp
                                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                        <label>Year</label>
                                                        <select name="year" class="select2">
                                                            <option value="">Please select</option>
                                                            @for ($i = 2000; $i <= 2050; $i++)
                                                                <option {{ $var[1] == $i ? "selected" : " " }}  value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                        <label>Bill Month *</label>
                                                        <select name="month" class="select2">
                                                            <option selected>Please select</option>
                                                            <option {{  $var[0] == "January" ? "selected" : " " }} value="January">January</option>
                                                            <option {{  $var[0] == "February" ? "selected" : " " }} value="February">February</option>
                                                            <option {{  $var[0] == "March" ? "selected" : " " }} value="March">March</option>
                                                            <option {{  $var[0] == "April" ? "selected" : " " }} value="April">April</option>
                                                            <option {{  $var[0] == "May" ? "selected" : " " }} value="May">May</option>
                                                            <option {{  $var[0] == "June" ? "selected" : " " }} value="June">June</option>
                                                            <option {{  $var[0] == "Julay" ? "selected" : " " }} value="Julay">Julay</option>
                                                            <option {{  $var[0] == "Auguest" ? "selected" : " " }} value="Auguest">Auguest</option>
                                                            <option {{  $var[0] == "Septembar" ? "selected" : " " }} value="Septembar">Septembar</option>
                                                            <option {{  $var[0] == "Octabar" ? "selected" : " " }} value="Octabar">Octabar</option>
                                                            <option {{  $var[0] == "Novembar" ? "selected" : " " }} value="Novembar">Novembar</option>
                                                            <option {{  $var[0] == "Decembar" ? "selected" : " " }} value="Decembar">Decembar</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                        <label> Date</label>
                                                        <input type="date" name="date" id="" value="{{ $expance->date }}" class="form-control">
                                                    </div>

                                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                        <label>Bill Month *</label>
                                                        <select name="pay_status" class="select2">
                                                            <option selected>Please select</option>
                                                            <option {{ $expance->pay_status == "paid" ? "selected" : "" }} value="paid">Paid</option>
                                                            <option  {{ $expance->pay_status == "unpaid" ? "selected" : "" }} value="unpaid">Unpaid</option>
                                                        </select>
                                                    </div>


                                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                        <label>Description</label>
                                                        <textarea name="discription" class="form-control">{{ $expance->discription }}</textarea>
                                                    </div>
                                                    <div class="col-12 form-group mg-t-8">
                                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update Expance</button>
                                                    </div>
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
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Expanse List</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="new-added-form" action="{{ route('admin.accounting.allExpanceStore') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label> Currrent Session  <span class="text-danger">*</span></label>
                                    <select name="session_year" class="form-control">
                                        @foreach ($sessions as $session)
                                            <option {{ $loop->last == $session->session ? "selected" : " " }} value="{{ $session->session }}">{{ $session->session }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label> Expanse Type <span class="text-danger">*</span></label>
                                    <select name="expanse_type" id="expanseType" class="form-control">
                                        <option selected>Please select</option>
                                        @foreach ($expanseTypies as $expanseType)
                                            <option value="{{ $expanseType->id }}">{{ $expanseType->expance_name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label> Name <span class="text-danger">*</span></label>
                                    <input type="text" name="user_name" id="" class="form-control">
                                </div>

                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label> Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="" class="form-control">
                                </div>

                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label> phone  <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="" class="form-control">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label> Pay <span class="text-danger">*</span></label>
                                    <input type="text" name="pay" id="" class="form-control">
                                </div>

                                @php
                                    $dt = new DateTime();
                                @endphp


                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label>Year</label>
                                    <select name="year" class="select2">
                                        <option value="">Please select</option>
                                        @for ($i = 2000; $i <= 2050; $i++)
                                            <option {{ $dt->format('Y') == $i ? "selected" : " " }} value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label>Bill Month <span class="text-danger">*</span></label>
                                    <select name="month" class="select2">
                                        <option selected>Please select</option>
                                        <option {{ $dt->format('M') == "Jan" ? "selected" : " " }} value="January">January</option>
                                        <option {{ $dt->format('M') == "Feb" ? "selected" : " " }} value="February">February</option>
                                        <option {{ $dt->format('M') == "Mar" ? "selected" : " " }} value="March">March</option>
                                        <option {{ $dt->format('M') == "Apr" ? "selected" : " " }} value="April">April</option>
                                        <option {{ $dt->format('M') == "May" ? "selected" : " " }} value="May">May</option>
                                        <option {{ $dt->format('M') == "Jun" ? "selected" : " " }} value="June">June</option>
                                        <option {{ $dt->format('M') == "Jul" ? "selected" : " " }} value="Julay">Julay</option>
                                        <option {{ $dt->format('M') == "Aug" ? "selected" : " " }} value="Auguest">Auguest</option>
                                        <option {{ $dt->format('M') == "Sep" ? "selected" : " " }} value="Septembar">Septembar</option>
                                        <option {{ $dt->format('M') == "Oct" ? "selected" : " " }} value="Octabar">Octabar</option>
                                        <option {{ $dt->format('M') == "Nov" ? "selected" : " " }} value="Novembar">Novembar</option>
                                        <option {{ $dt->format('M') == "Dec" ? "selected" : " " }} value="Decembar">Decembar</option>
                                    </select>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label> Date</label>
                                    <input type="date" name="date" id="" class="form-control">
                                </div>

                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label>Pay Status <span class="text-danger">*</span></label>
                                    <select name="pay_status" class="select2">
                                        <option selected>Please select</option>
                                        <option value="paid">Paid</option>
                                        <option value="unpaid">Unpaid</option>
                                    </select>
                                </div>


                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label>Description</label>
                                    <textarea name="discription" class="form-control"></textarea>
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Add New Expance</button>
                                </div>
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

            })
        }


    </script>
    <script>
        var loadFileTeacher = function(event) {
            var output = document.getElementById('outputTeacher');
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
                                url:"trash/"+emp_id,
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



