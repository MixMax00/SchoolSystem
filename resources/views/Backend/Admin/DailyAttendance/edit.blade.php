@extends('Backend.Admin.master')
@section('title')
Daily Attendance
@endsection
@php
$classes = \App\Models\Classes::all();
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
<div class="card">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Attendance Edit</h3>
            </div>
            <div class="dropdown">
                {{-- @if(auth()->user()->hasPermission('app.classroutine.create')) --}}
                <a href="{{ route('admin.dailyAttendance.index') }}" class="btn-fill-sm btn-gradient-yellow text-white"><span>Back</span></a>
                {{-- @endif --}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="" class="form-group-lable">Session</label>
                                <select name="session" id="sessionId" class="form-control" disabled readonly>
                                    <option selected>--- select session ---</option>
                                    @foreach ($sessions as $session)
                                    <option {{ $rqsession == $session->session  ? 'selected' : '' }} value="{{ $session->session }}">{{ $session->session }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="" class="form-group-lable">Class</label>
                                <select name="class_name" id="className" class="form-control className" disabled readonly>
                                    <option selected>--- select class ---</option>
                                    @foreach ($classes as $class)
                                    <option {{ $rqclass_name == $class->id  ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="" class="form-group-lable">Section</label>
                                <select name="section" id="sectionId" class="form-control sectionId" disabled readonly>
                                    <option value="{{ $section }}">{{ \App\Models\Section::find($section)->section_name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="" class="form-group-lable">Date</label>
                                <input type="date" name="date" id="" value="{{ $date }}" class="form-control" disabled readonly>
                            </div>
                        </div>
                        {{-- <div class="col">
                            <div class="form-group mt-5 pt-3">
                                @if(auth()->user()->hasPermission('app.attendance.create'))
                                <input type="submit" value="Attendance" class="btn btn-warning btn-lg">
                                @endif
                            </div>
                        </div> --}}
                    </div>
                </form>
                <hr>
                @php
                    $atten = "attendance";
                @endphp
                <form
                    action="{{ route('admin.dailyAttendance.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="session_year" value="{{$rqsession}}">
                    <input type="hidden" name="class_name" value="{{$rqclass_name}}">
                    <input type="hidden" name="section" value="{{$section}}">
                    <input type="hidden" name="date" value="{{$date}}">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <p class="pr-5 text-warning text-center fs-4">Class : <span  id="currentClass"></span></p>
                                        <p class="pr-5 text-warning text-center fs-4">Section :<span  id="currentSection"></span></p>
                                        <p class="text-warning text-center fs-4">Date : <span  id="currentDate"></span></p>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check pr-5">
                                            <input type="checkbox" name="" id="allCheckPresent" class="form-check-input">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                <i class="fas fa-check mr-2"></i>  Mark All Present
                                            </label>
                                        </div>
                                        <div class="form-check">
                                                <input type="checkbox" name="" id="allCheckAbsent" class="form-check-input">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                        <i class="fas fa-times mr-2"></i> Mark All Absent
                                                </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Roll</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--                                        @if ($attendances)--}}
                                    @foreach ($attendances as $attendance)
                                    <tr class="text-center">

                                        <td>
                                            {{ $loop->index +1 }}
                                            <input type="hidden" name="id[]" value="{{ $attendance->id }}">
                                        </td>
                                        <td>{{ $attendance->roll }}</td>
                                        <input type="hidden" name="roll[]" value="{{$attendance->roll}}">
                                        <td>{{ $attendance->stu_name ?? $attendance->student_name }}</td>
                                        <input type="hidden" name="stu_name[]" value="{{$attendance->stu_name ?? $attendance->student_name}}">
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-check pr-5">
                                                    {{-- <select name="attendance[]" class="custom-control">
                                                        <option @if(isset($attendance->attendance)) {{ $attendance->attendance == "present" ? "selected" : " " }} @endif  value="present">Present</option>
                                                        <option @if(isset($attendance->attendance)) {{ $attendance->attendance == "absent" ? "selected" : " " }} @endif value="absent">Absent</option>
                                                    </select>
                                                     <label class="form-check-label" for="flexCheckChecked">
                                                        Absent
                                                    </label> --}}
                                                    <input type="checkbox" name="attendance[]" id="checkPresent" value="present" class="form-check-input" data-id="{{ $attendance->id }}" @if(isset($attendance->attendance)) {{ $attendance->attendance == "present" ? "checked" : " " }} @endif>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Present
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="attendance[]" id="checkAbsent" value="absent" class="form-check-input"  data-id="{{ $attendance->id }}" @if(isset($attendance->attendance)) {{ $attendance->attendance == "absent" ? "checked" : " " }} @endif>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Absent
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{--                                        @endif--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                @if(auth()->user()->hasPermission('app.attendance.create'))
                                    {{-- @if(isset($attendance->attendance)) --}}
                                    <input type="submit" value="Update Student Attandance" class="btn-fill-sm btn-gradient-yellow text-white">
                                    {{-- @else --}}
                                    {{-- <input type="submit" value="Save" class="btn-fill-sm btn-gradient-yellow text-white">
                                    @endif --}}
                                @endif
                            </div>
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
$('#allCheckPresent').on('click', function () {
if ($(this).prop('checked')) {
} else {
$('input[name="spouse_name"]').hide();
$('input[name="spouse_amount"]').hide();
}
});
</script>
<script>
$(document).ready(function(){
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[data-id='" + $box.attr("data-id") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
$("#allCheckPresent").click(function(){
if(this.checked){
var absent = $('input:checkbox[id^="allCheckAbsent"]').prop('checked', false);
if(absent){
$('input:checkbox[id^="checkAbsent"]').each(function(){
this.checked = false;
});
}else{
$('input:checkbox[id^="checkAbsent"]').each(function(){
this.checked = true;
});
}
$('input:checkbox[id^="checkPresent"]').each(function(){
this.checked = true;
});
}else{
$('input:checkbox[id^="checkPresent"]').each(function(){
this.checked = false;
});
}
});
$("#allCheckAbsent").click(function(){
if(this.checked){
var present = $('input:checkbox[id^="allCheckPresent"]').prop('checked', false);
if(present){
$('input:checkbox[id^="checkPresent"]').each(function(){
this.checked = false;
});
}else{
$('input:checkbox[id^="checkPresent"]').each(function(){
this.checked = true;
});
}
$('input:checkbox[id^="checkAbsent"]').each(function(){
this.checked = true;
});
}else{
$('input:checkbox[id^="checkAbsent"]').each(function(){
this.checked = false;
});
}
});
$("#currentClass").html("{{ $rqclass_name }}");
$("#currentSection").html("{{ \App\Models\Section::find($section)->section_name }}");
$("#currentDate").html("{{ $date }}");
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function(){
$('#className').change(function(){
let classId = $(this).val();
$.ajax({
type:"POST",
url:"{{ route('admin.dailyAttendance.classSection') }}",
data:{
class_id : classId,
},
success:function(data) {
let td = '';
$.each(data, function(key, value){
td += "<option value="+value.id+">"+value.section_name+"</option>";
});
$("#sectionId").html(td);
}
});
});
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
url:"delete/gradedelete/"+emp_id,
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
