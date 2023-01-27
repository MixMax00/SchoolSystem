@extends('Backend.Admin.master')

@section('title')
    Result
@endsection

@php
    $examinations = \App\Models\ExamList::all();
    $classess = \App\Models\Classes::all();
    $sum= 0;
@endphp

@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>@yield('title')</h3>
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li>@yield('title')</li>
        </ul>
    </div>

    <!-- Breadcubs Area End Here -->
    <div class="card">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Result</h3>
                </div>
                <div class="dropdown">
                    <a href="{{ route('admin.manageMark.result') }}" class="fw-btn-fill btn-gradient-yellow">Back</a>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <td><b>Roll No</b></td>
                    <td><b>{{ $student_info->class_roll }}</b></td>
                    <td><b>Registration No</b></td>
                    <td>[HIDDEN]</td>
                </tr>
                <tr>
                    <td><b>Name of Student:</b></td>
                    <td colspan="3"><b>{{ $student_info->student_name_eng }}</b></td>
                </tr>
                <tr>
                    <td><b>Father's Name</b></td>
                    <td colspan="3">{{ $student_info->father_name_eng }}</td>
                </tr>
                <tr>
                    <td><b>Mother's Name</b></td>
                    <td colspan="3">{{ $student_info->mother_name_eng }}</td>
                </tr>
                <tr>
                    <td><b>Name of Institute</b></td>
                    <td colspan="3">{{ $student_info->institute_name }}</td>
                </tr>
                <tr>
                    <td><b>Board</b></td>
                    <td>{{ $student_info->branch }}</td>
                    <td><b>Session</b></td>
                    <td>{{ $student_info->session }}</td>
                </tr>
                <tr>
                    <td><b>Group</b></td>
                    <td>{{ $student_info->group }}</td>
                    <td><b>Type:</b></td>
                    <td>REGULAR</td>
                </tr>
                <tr>

                    <td><b>Result</b></td>
                    <td><b>GPA=5.00</b></td>
                    <td><b>TOTAL MARK</b></td>
                    <td><b>{{ $sum }}</b></td>
                </tr>

            </table>
            <div style='margin-top:20px'>
                <div class="result_sheet">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>CODE</th>
                                <th>SUBJECT</th>
                                <th>Theory</th>
                                <th>Mcq</th>
                                <th>Practical</th>
                                <th>Total Mark</th>
                                <th>Grade</th>
                            </tr>
                        </thead>

                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $result->subject_name }}</td>
                                <td>{{ \App\Models\Subject::find($result->subject_name)->sub_name }}</td>
                                <td>{{ $result->theory }}</td>
                                <td>{{ $result->mcq }}</td>
                                <td>{{ $result->practical }}</td>
                                <td>{{ $total_mark = ($result->theory) + ($result->mcq) + ($result->practical) }}</td>
                                <?php $sum  = $sum + $total_mark; ?>
                                <td>
                                    @switch($total_mark)
                                        @case($total_mark >= 80 )
                                             A+
                                             @break
                                        @case($total_mark >= 70 && $total_mark <= 79)
                                             A
                                             @break
                                        @case($total_mark >= 60 && $total_mark <= 69)
                                             A-
                                             @break
                                        @case($total_mark >= 50 && $total_mark <= 59)
                                             B
                                             @break
                                        @case($total_mark >= 40 && $total_mark <= 49)
                                             C
                                             @break
                                        @case($total_mark >= 33 && $total_mark <= 49)
                                             D
                                             @break
                                        @case($total_mark < 33)
                                             F
                                             @break
                                        @default
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection


