@extends('Backend.admin.master')

@section('title')
    Head List
@endsection

@php($deposit_head_lists = \App\Models\MainHead::where('code','deposit')->get())
@php($expense_head_lists = \App\Models\MainHead::where('code','expense')->get())

@section('content')

    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>@yield('title')</h3>
        <ul>
            <li>
                <a href="{{ route('admin.dashboard')  }}">Home</a>
            </li>
            <li>@yield('title')</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Dashboard summery Start Here -->

    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>@yield('title')</h3>
                </div>

                <!-- <div class="dropdown">
                    <a href="{{ route('admin.accountmanagement.mainhead.add') }}" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Add Main Head</a>
                </div> -->

            </div>
{{--            <form class="mg-b-20">--}}
{{--                <div class="row gutters-8">--}}
{{--                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">--}}
{{--                        <input type="text" placeholder="Search by Roll ..." class="form-control">--}}
{{--                    </div>--}}
{{--                    <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">--}}
{{--                        <input type="text" placeholder="Search by Name ..." class="form-control">--}}
{{--                    </div>--}}
{{--                    <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">--}}
{{--                        <input type="text" placeholder="Search by Class ..." class="form-control">--}}
{{--                    </div>--}}
{{--                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">--}}
{{--                        <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkAll">
                                <label class="form-check-label">SL</label>
                            </div>
                        </th>
                        <th>Head</th>
                        <th>Code</th>
                        <th>Applicable</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr style="background-color: #042954;color: #ffffff;">
                                     <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">#</label>
                                        </div>
                                    </td>
                                    <td>
                                    জমার খাত সমূহ

                                    </td>

                                    <td colspan="3">1</td>

                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                               aria-expanded="false">
                                                <span class="flaticon-more-button-of-three-dots text-white"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('admin.accountmanagement.mainhead.add') }}"><i
                                                        class="fas fa-plus text-dark-pastel-green"></i> Add sub Head</a>

                                            </div>
                                        </div>
                                    </td>
                        </tr>
                        @foreach($deposit_head_lists as $head_list)
                             @php($table_name = strtolower(str_replace(' ', '', $head_list->main_head)))
                             @php($sub_head_lists = \Illuminate\Support\Facades\DB::table($table_name)->where('main_head_id',$head_list->id)->get())

                                <tr >
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">#</label>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $head_list->main_head  }}

                                    </td>

                                    <td colspan="3">{{ $head_list->id }}</td>

                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                               aria-expanded="false">
                                                <span class="flaticon-more-button-of-three-dots text-white"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('admin.accountmanagement.head.add',['id'=>$head_list->id])  }}"><i
                                                        class="fas fa-plus text-dark-pastel-green"></i> Add sub Head</a>

                                            </div>
                                        </div>
                                    </td>

                             @foreach($sub_head_lists as $sub_list)
                                 <tr>
                                     <td>
                                         <div class="form-check">
                                             <input type="checkbox" class="form-check-input">
                                             <label class="form-check-label">#</label>
                                         </div>
                                     </td>
                                     <td class="ml-2" style="margin-left: 50px; padding: left 30px;">
                                     ---- {{ $sub_list->head_name  }}
                                     </td>
                                     <td>{{ $head_list->id }}.{{ $sub_list->id }}</td>
                                     <td>{{ $sub_list->applicable }}</td>
                                     <td>{{ $sub_list->details }}</td>
                                     <td>

                                         <div class="dropdown">
                                             <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false">
                                                 <span class="flaticon-more-button-of-three-dots"></span>
                                             </a>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                 <a class="dropdown-item" href="{{ route('admin.accountmanagement.edit',['id'=>$sub_list->id,'table' =>$table_name])  }}"><i
                                                         class="fas fa-edit text-dark-pastel-green"></i> Edit Head</a>

                                             </div>
                                         </div>

                                     </td>

                                 </tr>
                                 @endforeach
                                </tr>

                        @endforeach

                        <tr style="background-color: #042954;color: #ffffff;">
                                     <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">#</label>
                                        </div>
                                    </td>
                                    <td>
                                    ব্যায়ের খাত সমূহ

                                    </td>

                                    <td colspan="3">2</td>

                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                               aria-expanded="false">
                                                <span class="flaticon-more-button-of-three-dots text-white"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('admin.accountmanagement.mainhead.add') }}"><i
                                                        class="fas fa-plus text-dark-pastel-green"></i> Add sub Head</a>

                                            </div>
                                        </div>
                                    </td>
                        </tr>

                        @foreach($expense_head_lists as $head_list)
                             @php($table_name = strtolower(str_replace(' ', '', $head_list->main_head)))
                             @php($sub_head_lists = \Illuminate\Support\Facades\DB::table($table_name)->where('main_head_id',$head_list->id)->get() ?? '')

                                <tr >
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">#</label>
                                        </div>
                                    </td>
                                    <td>
                                     {{ $head_list->main_head  }}

                                    </td>

                                    <td colspan="3">{{ $head_list->id }}</td>

                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                               aria-expanded="false">
                                                <span class="flaticon-more-button-of-three-dots text-white"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('admin.accountmanagement.head.add',['id'=>$head_list->id])  }}"><i
                                                        class="fas fa-plus text-dark-pastel-green"></i> Add sub Head</a>

                                            </div>
                                        </div>
                                    </td>

                             @foreach($sub_head_lists as $sub_list)
                                 <tr>
                                     <td>
                                         <div class="form-check">
                                             <input type="checkbox" class="form-check-input">
                                             <label class="form-check-label">#</label>
                                         </div>
                                     </td>
                                     <td class="ml-2" style="margin-left: 50px; padding: left 30px;">
                                     ----  {{ $sub_list->head_name  }}
                                     </td>
                                     <td>{{ $head_list->id }}.{{ $sub_list->id }}</td>
                                     <td>{{ $sub_list->applicable }}</td>
                                     <td>{{ $sub_list->details }}</td>
                                     <td>

                                         <div class="dropdown">
                                             <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false">
                                                 <span class="flaticon-more-button-of-three-dots"></span>
                                             </a>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                 <a class="dropdown-item" href="{{ route('admin.accountmanagement.edit',['id'=>$sub_list->id,'table' =>$table_name])  }}"><i
                                                         class="fas fa-edit text-dark-pastel-green"></i> Edit Head</a>

                                             </div>
                                         </div>

                                     </td>

                                 </tr>
                                 @endforeach
                                </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection
