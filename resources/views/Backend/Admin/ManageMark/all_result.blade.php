@extends('Backend.Admin.master')

@section('title')
    All Result
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
                    <h3>All Result</h3>
                </div>
                <div class="dropdown">
                    <a href="{{ route('admin.manageMark.result') }}" class="fw-btn-fill btn-gradient-yellow">Back</a>
                </div>
            </div>

            <div style='margin-top:20px'>
                <div class="result_sheet">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Roll</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Total Mark</th>
                                <th>GPA</th>
                            </tr>
                        </thead>

                        @foreach ($gruops as $student => $results)
                            <?php
                                $total = 0;
                                $point = 0;
                                $count = 0;
                                $absent = 5;
                                $abs = 0;
                                $fail = 0;
                            ?>
                            @foreach ($results as $mark)
                                <?php

                                    $total = $total + $mark->total;
                                    $gpa = $mark->total;
                                    switch ($gpa) {
                                        case ($gpa >= 80):
                                             $point =  $point + 5;
                                            break;
                                        case ($gpa >= 70 && $gpa <= 79):
                                             $point =  $point + 4;
                                            break;
                                        case ($gpa >= 60 && $gpa <= 69):
                                             $point =  $point + 3.5;
                                            break;
                                        case ($gpa >= 50 && $gpa <= 59):
                                             $point =  $point + 3;
                                            break;
                                        case ($total >= 40 && $gpa <= 49):
                                             $point =  $point + 2;
                                            break;
                                        case ($gpa >= 33 && $gpa <= 39):
                                             $point =  $point + 1;
                                            break;
                                        case ($gpa < 32 ):
                                            break;
                                        case ($gpa < 1 && $gpa > 0):
                                            $abs = $abs + 1;
                                            break;
                                        default:
                                    }

                                    $count++;


                                ?>
                            @endforeach

                            <?php

                                if ($absent == $count){
                                    if ($fail == 0){
                                        $gpa = $point / $count;
                                    }else{
                                        $gpa = "Fail";
                                    }
                                }else{
                                    $gpa = "Absent";
                                }
                            ?>

                            @foreach ($results as $result)

                                @if ($result->roll == $student)
                                    <tr>
                                        <td>{{ $student }}</td>
                                        <td>{{ $result->stu_name }}</td>
                                        <td>{{ $result->class_name }}</td>
                                        <td>{{ $total_mark = $total}}</td>

                                        <td>
                                            {{ $gpa }}

                                        </td>
                                    </tr>
                                @endif

                                @break
                            @endforeach

                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection


