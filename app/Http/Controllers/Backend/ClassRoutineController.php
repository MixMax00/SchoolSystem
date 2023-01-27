<?php

namespace App\Http\Controllers\Backend;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassRoutine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class ClassRoutineController extends Controller
{
    public function index($id = '')
    {
        Gate::authorize('app.classroutine.index');
        if($id == ''){
            $class =  Classes::first();
            $all_subject = ClassRoutine::where('class_name',$class->id)->get();
            return view('Backend.Admin.ClassRoutine.index',compact('all_subject','class'));
        }else{
            $class = Classes::find($id);
            $all_subject = ClassRoutine::where('class_name',$id)->with('subjects')->get();
            return view('Backend.Admin.ClassRoutine.index', compact('all_subject','class'));
        }
    }

    public function add(){
        Gate::authorize('app.classroutine.create');
        return view('Backend.Admin.ClassRoutine.create');
    }

    public function group(Request $request)
    {
        // return $request->class_id;

        $sections = Section::where('class_id',$request->class_id)->get();

        $output = "<option selected>-- select section --</option>";
        foreach($sections as $section){
          echo  $output = '<option value="'.$section->id.'">'.$section->section_name .'</option>';
        }
    }

    public function subject(Request $request)
    {
        $subjects = Subject::where('class_id',$request->subject_id)->get();

        $output = "<option selected>-- select section --</option>";
        foreach($subjects as $subject){
          echo  $output = '<option value="'.$subject->id.'">'.$subject->sub_name .'</option>';
        }


    }

    public function teacher(Request $request)
    {
        $sub_teacher = Subject::find($request->sub_id);
        $teacher = Teacher::find($sub_teacher->teacher_id);
        return $teacher;

    }

    public function save(Request $request)
    {
        Gate::authorize('app.classroutine.create');
        $exsits = ClassRoutine::where('class_name',$request->class_name)
        ->where('day',$request->day)
        ->where('starting_hour',$request->starting_hour)
        ->where('starting_minute',$request->starting_minute)
        ->where('starting',$request->starting)
        ->first();

        // $stating_time = $exsits->starting_hour .":".$exsits->starting_minute.":".$exsits->starting;
        // $ending_time = $exsits->ending_hour .":".$exsits->ending_minute.":".$exsits->ending;
        // $insert_stating_time = $request->starting_hour .":".$request->starting_minute.":".$request->starting;
        // $insert_ending_time = $request->ending_hour .":".$request->ending_minute.":".$request->ending;
        if($exsits){

            // return $ending_time;
            Toastr::error('All ready add this time', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            ClassRoutine::create([
                "class_name"       => $request->class_name,
                "section"          => $request->section,
                "subject"          => $request->subject,
                "teacher"          => $request->teacher,
                "day"              => $request->day,
                "starting_hour"    => $request->starting_hour,
                "starting_minute"  => $request->starting_minute,
                "starting"         => $request->starting,
                "ending_hour"      => $request->ending_hour,
                "ending_minute"    => $request->ending_minute,
                "ending"           => $request->ending,
            ]);
            Toastr::success('Class Routine Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function edit($id)
    {
        $edit = ClassRoutine::find($id);
        return view('Backend.Admin.ClassRoutine.edit',compact('edit'));
    }

    public function update(Request $request)
    {
        Gate::authorize('app.classroutine.update');



        $exsits = ClassRoutine::where('class_name',$request->class_name)
            ->where('day',$request->day)
            ->where('starting_hour',$request->starting_hour)
            ->where('starting_minute',$request->starting_minute)
            ->where('starting',$request->starting)
            ->first();

        if($exsits){
            Toastr::error('All ready add this time', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            ClassRoutine::where('id',$request->id)->update([
                "class_name"       => $request->class_name,
                "section"          => $request->section,
                "subject"          => $request->subject,
                "teacher"          => $request->teacher,
                "day"              => $request->day,
                "starting_hour"    => $request->starting_hour,
                "starting_minute"  => $request->starting_minute,
                "starting"         => $request->starting,
                "ending_hour"      => $request->ending_hour,
                "ending_minute"    => $request->ending_minute,
                "ending"           => $request->ending,
            ]);

            Toastr::success('Class Routine Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }

    }

    public function delete($id){
        Gate::authorize('app.classroutine.delete');
        $clsrtn = ClassRoutine::find($id);
        $clsrtn->delete();

        Toastr::error('Subject Delete Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return response()->json([
            'status'=>200
        ]);
    }
}
