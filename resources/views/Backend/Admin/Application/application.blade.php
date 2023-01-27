@extends('Backend.Admin.master')
@section('title')
    Application Canidate
@endsection

@section('css')
  <style>

    @media print{
        body *{
            visibility:hidden;
        }
        #printBtn{
            display: none;
        }


        .page-break{
          page-break-after:always;
        }

        .extra{
          padding-top: 50px!important;
        }


        .page-break-top{
          margin-top: 120px!important;
        }


        #printSection, #printSection *{
            visibility:visible;
        }
        #printSection {
            position:absolute;
            left:0;
            top:0;
            width: 100%;
            padding: 7px;
            margin:50px 5px 40px 5px;
            background-color: #ffffff;
        }

        .border-section{
          box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.15)!important;
          background-color: #e5e5e5!important;
          -webkit-print-color-adjust: exact;
          padding: 1.5rem 3rem 3rem 3rem !important;
          border-radius: 12px !important;
        }

        .address h6{
          padding: 0!important;
        }
        span {
          font-size: 16px !important;
        }
        .form-control {
          background-color: #ffffff!important;
          -webkit-print-color-adjust: exact;
        }
        .form-select {
          background-color: #ffffff!important;
          -webkit-print-color-adjust: exact;
        }
        p{
          font-size: 10px!important;
        }

        h5 {
          font-family: "Poppins";
          font-style: normal;
          font-weight: 300;
          font-size: 14px !important;
          margin-top: 10px!important;
          text-transform: uppercase !important;
          color: var(--primary-color)!important;
        }

        h6 {
          font-family: "Poppins"!important;
          font-style: normal !important;
          font-weight: 300 !important;
          font-size: 14px !important;
          line-height: 4px !important;
          text-transform: capitalize;
          color: var(--primary-color)!important;
          -webkit-print-color-adjust: exact;
        }



    }


      .col-print-1 {width:8%;  float:left;}
      .col-print-2 {width:16%; float:left;}
      .col-print-3 {width:25%; float:left;}
      .col-print-4 {width:33%; float:left;}
      .col-print-5 {width:42%; float:left;}
      .col-print-6 {width:50%; float:left;}
      .col-print-7 {width:58%; float:left;}
      .col-print-8 {width:66%; float:left;}
      .col-print-9 {width:75%; float:left;}
      .col-print-10{width:83%; float:left;}
      .col-print-11{width:92%; float:left;}
      .col-print-12{width:100%; float:left;}



      .address h6{
        padding: 0!important;
      }
      span {
        font-size: 16px;
      }
      .form-control {
        background-color: #ffffff;
      }
      .form-select {
        background-color: #ffffff;
      }
      p{
        font-size: 10px;
      }

      .border-section {
        box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.15);
        background-color: #e5e5e5;
        -webkit-print-color-adjust: exact;
        padding: 1.5rem 3rem 3rem 3rem;
        border-radius: 12px;
      }


      label {
        margin-top: 1rem;
      }
      h5 {
        font-family: "Poppins";
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        text-transform: uppercase;
        color: var(--primary-color);
      }

      h6 {
        font-family: "Poppins";
        margin-top: 20px !important;
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        line-height: 4px;
        text-transform: capitalize;
        color: var(--primary-color);
      }
  </style>
@endsection

@php($schooL_info = \App\Models\GeneralSettings::find(1))
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
                    Application Canidate
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
                        <th>Trade Name</th>
                        <th>Course Name</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($application_canidates as $app_can)
                    <tr>
                        <td>
                            {{ $loop->index +1 }}
                        </td>
                        <td>{{ $app_can->name }}</td>
                        <td>{{ $app_can->trades->trade_title }}</td>
                        <td>{{ $app_can->courses->course_name }}</td>
                        <td>
                            @if($app_can->image)
                            <img src="{{asset($app_can->image)}}" alt="" width="100px" height="100px">
                            @else
                                <img src="{{asset('assets/backend/img/default.jpg')}}" alt="" width="100px" height="100px">
                            @endif
                        </td>

                        <td>


                                        <a class="btn btn-info text-white"  data-toggle="modal" data-target="#exampleModalCenter_{{$app_can->id}}">View</a>


                                        <button class="btn btn-danger delete_btn" value="{{$app_can->id}}" id="delete" >Delete</button>

                                        <div class="modal fade" id="exampleModalCenter_{{$app_can->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document" >
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Applicant Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <section class="section_padding" id="printModal">
                                                            <div class="container">
                                                            <div id="printThis">
                                                              <div class="row">
                                                                <div class="col-md-12 d-flex justify-content-end">
                                                                  <button type="button" id="printBtn" class="btn btn-warning  float-right mb-3" onclick="window.print()">Print</button>
                                                                </div>
                                                              </div>

                                                              <div class="row border-section mb-4">
                                                                <div class="col-2 col-print-2">
                                                                  <div class="logo mt-5 d-flex justify-content-start align-items-center">
                                                                    <img src="{{ isset($schooL_info->logo) ? asset($schooL_info->logo) : '' }}" width="100px" height="100px"/>
                                                                  </div>
                                                                </div>
                                                                <div class="col-7 col-print-7">
                                                                  <div class="address text-center mt-4">
                                                                    <h3 class="fs-1">{{ $schooL_info->website_name }}</h3>
                                                                    <h6 class="fs-4"><strong>InstituteID : </strong>{{ $schooL_info->school_id }}</h6>
                                                                    <h6 class="fs-4"><strong>Address :</strong>{{ $schooL_info->address }}</h6>

                                                                    <h6 class="fs-4"><strong>Eamil :</strong>{{ $schooL_info->email }}
                                                                    <strong>Phone :</strong> {{ $schooL_info->phone }}</h6>
                                                                  </div>
                                                                </div>
                                                                <div class="col-3 col-print-3">
                                                                  <div class="image mt-4 d-flex justify-content-end align-items-center">
                                                                    <img src="{{ isset($app_can->image) ? asset($app_can->image) : '' }}" width="100px" height="100px"/>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <h6 class="text-uppercase header">Personal:</h6>
                                                              <div class="row border-section">
                                                                <div class="col-lg-6 col-print-6">

                                                                  <div class="form-group">
                                                                    <label for="name">Name</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="name"
                                                                            aria-describedby="emailHelp"
                                                                            value="{{ $app_can->name  }}"
                                                                            disabled
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="exampleInputEmail1">Email address</label>
                                                                    <input
                                                                            type="email"
                                                                            class="form-control"
                                                                            id="exampleInputEmail1"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->email  }}"
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="exampleInputEmail1">Birth Certificate</label>
                                                                    <input
                                                                            type="email"
                                                                            class="form-control"
                                                                            id="exampleInputEmail1"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->birth_certificate  }}"
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="phone">Gender</label>
                                                                    <div class="input-group">
                                                                      <input
                                                                              type="email"
                                                                              class="form-control"
                                                                              id="exampleInputEmail1"
                                                                              aria-describedby="emailHelp"
                                                                              disabled
                                                                              value="{{ $app_can->gender  }}"
                                                                      />
                                                                    </div>
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="name">Religion</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="religion"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->religion  }}"
                                                                    />
                                                                  </div>
                                                                  </form>
                                                                </div>
                                                                <div class="col-lg-6 col-print-6">
                                                                  <div class="form-group">
                                                                    <label for="phone">Mobile Number</label>
                                                                    <input
                                                                            type="number"
                                                                            class="form-control"
                                                                            id="phone"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->phone  }}"
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="phone">BirthDate</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="exampleFormControlInput1"
                                                                            placeholder=""
                                                                            disabled
                                                                            value="{{ $app_can->date  }}"
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="phone">Blood Group</label>
                                                                    <div class="input-group">
                                                                      <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              id="exampleInputEmail1"
                                                                              aria-describedby="emailHelp"
                                                                              disabled
                                                                              value="{{ $app_can->blood_group }}"
                                                                      />
                                                                    </div>
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="name">Nationality</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="nationality"
                                                                            aria-describedby="emailHelp"

                                                                            disabled
                                                                            value="{{ $app_can->nationality  }}"
                                                                    />
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <h6 class="text-uppercase header">Parents:</h6>
                                                              <div class="row border-section">
                                                                <div class="col-lg-6 col-print-6">
                                                                  <h6>Father's Information:</h6>
                                                                  <form>
                                                                    <div class="form-group">
                                                                      <label for="name">Father's Name</label>
                                                                      <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              id="name"
                                                                              aria-describedby="emailHelp"
                                                                              disabled
                                                                              value="{{ $app_can->father_name  }}"
                                                                      />
                                                                    </div>
                                                                    <div class="form-group">
                                                                      <label for="phone">Mobile Number</label>
                                                                      <input
                                                                              type="text"
                                                                              class="form-control"
                                                                              id="phone"
                                                                              aria-describedby="emailHelp"
                                                                              disabled
                                                                              value="{{ $app_can->father_phone  }}"
                                                                      />
                                                                    </div>
                                                                    <div class="form-group">
                                                                      <label for="NID">NID</label>
                                                                      <input
                                                                              type="number"
                                                                              class="form-control"
                                                                              id="NID"
                                                                              aria-describedby="emailHelp"
                                                                              disabled
                                                                              value="{{ $app_can->father_nid  }}"
                                                                      />
                                                                    </div>

                                                                </div>

                                                                <div class="col-lg-6 col-print-6">
                                                                  <h6>Mother's Information:</h6>

                                                                  <div class="form-group">
                                                                    <label for="name"> Mother's Name</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="name"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->mother_name  }}"
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="NID">Mobile Number</label>
                                                                    <input
                                                                            type="number"
                                                                            class="form-control"
                                                                            id="NID"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->mother_phone  }}"

                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="phone">NID</label>
                                                                    <input
                                                                            type="number"
                                                                            class="form-control"
                                                                            id="phone"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->mother_nid  }}"
                                                                    />
                                                                  </div>

                                                                </div>
                                                              </div>

                                                              <h6 class="text-uppercase header">local guardian:</h6>
                                                              <div class="row border-section mb-5">
                                                                <div class="col-lg-6 col-print-6">

                                                                  <div class="form-group">
                                                                    <label for="name">Name</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="name"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->local_guardian_name  }}"
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="exampleInputEmail1">Email </label>
                                                                    <input
                                                                            type="email"
                                                                            class="form-control"
                                                                            id="exampleInputEmail1"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->local_guardian_email  }}"
                                                                    />
                                                                  </div>

                                                                </div>
                                                                <div class="col-lg-6 col-print-6">

                                                                  <div class="form-group">
                                                                    <label for="phone">Mobile Number</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="phone"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->local_guardian_phone    }}"
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="NID">NID</label>
                                                                    <input
                                                                            type="number"
                                                                            class="form-control"
                                                                            id="NID"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->local_guardian_nid  }}"
                                                                    />
                                                                  </div>

                                                                </div>
                                                              </div>
                                                              <div class="page-break"></div>
                                                              <h6 class="text-uppercase header extra">Present Address:</h6>
                                                              <div class="row border-section">
                                                                <div class="col-lg-6 col-print-6">

                                                                  <div class="form-group">
                                                                    <label for="name">Division </label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="Village"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->divisions->name  }}"
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="phone">Union</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="phone"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->unions->name  }}"
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="phone">Village</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="phone"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->village  }}"
                                                                    />
                                                                  </div>

                                                                </div>
                                                                <div class="col-lg-6 col-print-6">

                                                                  <div class="form-group">
                                                                    <label for="phone">Distric</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="phone"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->districts->name  }}"
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="phone">Thana</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="phone"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->thanas->name  }}"
                                                                    />
                                                                  </div>

                                                                </div>
                                                              </div>



                                                              <h6 class="text-uppercase header">Permanent Address:</h6>
                                                              <div class="row border-section">
                                                                <div class="col-lg-6 col-print-6">

                                                                  <div class="form-group">
                                                                    <label for="name">Division </label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="Village"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->per_divisions->name  }}"
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="phone">Union</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="phone"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->per_unions->name  }}"
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="phone">Village</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="phone"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->per_village  }}"
                                                                    />
                                                                  </div>

                                                                </div>
                                                                <div class="col-lg-6 col-print-6">

                                                                  <div class="form-group">
                                                                    <label for="phone">Distric</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="phone"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->per_districts->name  }}"
                                                                    />
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="phone">Thana</label>
                                                                    <input
                                                                            type="text"
                                                                            class="form-control"
                                                                            id="phone"
                                                                            aria-describedby="emailHelp"
                                                                            disabled
                                                                            value="{{ $app_can->per_thanas->name  }}"
                                                                    />
                                                                  </div>

                                                                </div>
                                                              </div>
                                                              <!--<div class="page-break"></div>-->

                                                              <h3 class="text-uppercase mt-4 header">SSC:</h3>
                                                              <div class="row border-section">
                                                                <div class="col-lg-6 col-print-6">

                                                                    <div class="form-group">
                                                                      <label for="name">Roll</label>
                                                                      <input
                                                                        type="text"
                                                                        name="ssc_roll"
                                                                        class="form-control"
                                                                        id="roll"
                                                                        value="{{ $app_can->ssc_roll }}"
                                                                        aria-describedby="emailHelp"
                                                                      />
                                                                    </div>
                                                                    <div class="form-group">
                                                                      <label for="name">GPA</label>
                                                                      <input
                                                                        type="text"
                                                                        name="ssc_gpa"
                                                                        class="form-control"
                                                                        id="gpa"
                                                                        aria-describedby="emailHelp"
                                                                        value="{{ $app_can->ssc_gpa }}"
                                                                      />
                                                                    </div>

                                                                    <div class="form-group">
                                                                      <label for="phone">Depertment</label>
                                                                      <div class="input-group">
                                                                         <input
                                                                        type="text"
                                                                        name="ssc_roll"
                                                                        class="form-control"
                                                                        id="roll"
                                                                        aria-describedby="emailHelp"
                                                                        value="{{ $app_can->ssc_depertment }}"
                                                                      />
                                                                      </div>
                                                                    </div>



                                                                </div>
                                                                <div class="col-lg-6 col-print-6">

                                                                    <div class="form-group">
                                                                      <label for="name">Registration</label>
                                                                      <input
                                                                        type="text"
                                                                        name="ssc_registation"
                                                                        class="form-control"
                                                                        id="regi"
                                                                         value="{{ $app_can->ssc_registation }}"
                                                                        aria-describedby="emailHelp"
                                                                      />
                                                                    </div>
                                                                    <div class="form-group">
                                                                      <label for="phone">Board</label>
                                                                      <div class="input-group">
                                                                         <input
                                                                        type="text"
                                                                        name="ssc_roll"
                                                                        class="form-control"
                                                                        id="roll"
                                                                        aria-describedby="emailHelp"
                                                                         value="{{ $app_can->ssc_borad }}"
                                                                      />
                                                                      </div>
                                                                    </div>
                                                                </div>
                                                              </div>

                                                              <h3 class="text-uppercase mt-4 header">Willing To Admission:</h3>
                                                              <div class="row border-section">
                                                                <div class="col-lg-6 col-print-6">
                                                                    <div class="form-group">
                                                                        <label for="phone">Course</label>
                                                                        <div class="input-group">
                                                                           <input
                                                                              type="text"
                                                                              name="ssc_roll"
                                                                              class="form-control"
                                                                              id="roll"
                                                                              value="{{ $app_can->courses->course_name }}"
                                                                              aria-describedby="emailHelp"
                                                                            />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-print-6">
                                                                    <div class="form-group">
                                                                    <label for="phone">Trade</label>
                                                                        <div class="input-group">
                                                                             <input
                                                                              type="text"
                                                                              name="ssc_roll"
                                                                              class="form-control"
                                                                              id="roll"
                                                                              value="{{ $app_can->trades->trade_title }}"
                                                                              aria-describedby="emailHelp"
                                                                            />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                            </div>

                                                          </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   </div>
                                 </div>

                          {{--   <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

                            <script>
                                CKEDITOR.replace( 'editor_{{$banner->id}}' );
                            </script> --}}

                        </td>
                    </tr>
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
                                url:"application/delete/"+emp_id,
                                success:function (response){
                                    if(response.status == 200) {
                                        window.location.reload();
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
        document.getElementById("printBtn").onclick = function(){
            printElement(document.getElementById("printThis"));
        }

        function printElement(elem){
            var domClone = elem.cloneNode(true);
            var $printSection = document.getElementById("printSection");


            if (!$printSection) {
                $printSection = document.createElement("div");
                $printSection.id = "printSection";
                document.body.appendChild($printSection);
            }

            $printSection.innerHTML = " ";
            $printSection.appendChild(domClone);

            window.print();

        }
    </script>



@endsection
