<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use App\Models\ExamList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class ManageMarkController extends Controller
{
    public function index()
    {
        return view('Backend.Admin.ManageMark.index');
    }

    public function manageStudentMark(Request $request)
    {
        $section = Section::find($request->section);

        $table_name = $request->session. '_' . $request->class_name . '_students';
        if(Schema::hasTable($table_name)){
            $exam_marks = DB::table($table_name)->where('section', $request->section)->get();
            return view('Backend.Admin.ManageMark.create',[
                "exam_marks"   => $exam_marks,
                "rqsession"     => $request->session,
                "rqclass_name"  => $request->class_name,
                "section"       => $section->id,
                "rqeaxm_name"   => $request->exam_name,
            ]);



        }else{
            Toastr::error('Student Not Found.', 'Delete', ["positionClass" => "toast-top-right"]);
            return back();
        }

    }

    public function create($exam_info)
    {
        return view('Backend.Admin.ManageMark.create',[
            ""
        ]);
    }

    public function StudentMarkStore(Request $request)
    {

        $exam = ExamList::find($request->exam_name);

        // return $request->all;
        $table_name = "create_marks_".$exam->id."_students";

        if(Schema::hasTable($table_name)){
            if($request->has('student_name')){
                for ($a = 0; $a < count($request->student_name); $a++) {
                    $total_mark[$a] = $request->theory[$a] + $request->mcq[$a] + $request->practical[$a];
                    DB::table($table_name)->insert([
                        'student_id'        =>$request->student_id[$a],
                        'roll'              => $request->stu_roll[$a],
                        'stu_name'          => $request->student_name[$a],
                        'session'           => $request->session,
                        'class_name'        => $request->class_name,
                        'section'           => $request->section,
                        'subject_name'      => $request->subject_name,
                        'theory'            => $request->theory[$a],
                        'mcq'               => $request->mcq[$a],
                        'practical'         => $request->practical[$a],
                        'total'             => $total_mark[$a],

                    ]);
                }

            }

            Toastr::success('Mark Save Successfully.', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.manageMark.index');
        }else{
            Schema::create($table_name, function ($table) {
                $table->increments('id');
                $table->string('school_id')->nullable();
                $table->unsignedBigInteger('student_id')->nullable();
                $table->string('roll')->nullable();
                $table->string('stu_name')->nullable();
                $table->string('session')->nullable();
                $table->string('class_name')->nullable();
                $table->string('section')->nullable();
                $table->string('subject_name')->nullable();
                $table->string('theory')->nullable();
                $table->string('mcq')->nullable();
                $table->string('practical')->nullable();
                $table->string('total')->nullable();
                $table->string('assignment')->nullable();
                $table->string('remarks')->nullable();
                $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            });

            if($request->has('student_name')){
                for($a = 0; $a < count($request->student_name); $a++) {
                    $total_mark[$a] = $request->theory[$a] + $request->mcq[$a] + $request->practical[$a];

                    // return $total_mark[$a];
                    DB::table($table_name)->insert([
                        'student_id'        => $request->student_id[$a],
                        'roll'              => $request->stu_roll[$a],
                        'stu_name'          => $request->student_name[$a],
                        'session'           => $request->session,
                        'class_name'        => $request->class_name,
                        'section'           => $request->section,
                        'subject_name'      => $request->subject_name,
                        'theory'            => $request->theory[$a],
                        'mcq'               => $request->mcq[$a],
                        'practical'         => $request->practical[$a],
                        'total'             => $total_mark[$a],
                    ]);
                }
            }
            Toastr::success('Mark Save Successfully.', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.manageMark.index');

        }




    }

    public function StudentMarkEdit(){
        return view('Backend.Admin.ManageMark.edit');
    }

    public function StudentEditMark(Request $request)
    {


        $table_name = "create_marks_".$request->exam_name."_students";

        if(Schema::hasTable($table_name)){
            $update_table = DB::table($table_name)
                                ->where('session',$request->session)
                                ->where('class_name', $request->class_name)
                                ->where('section', $request->section)
                                ->where('subject_name', $request->subject_name)
                                ->where('roll', $request->class_roll)
                                ->first();

            if($update_table){
                return view('Backend.Admin.ManageMark.mark_edit',[
                    "exam_mark"   =>  $update_table,
                    "rqsession"     => $request->session,
                    "rqclass_name"  => $request->class_name,
                    "section"       => $request->section,
                    "rqeaxm_name"   => $request->exam_name,
                ]);
            }else{
                return redirect()->route('admin.manageMark.edit');
            }
        }else{
            return redirect()->route('admin.manageMark.edit');
        }

    }

    public function markUpdate(Request $request){
        $table_name = "create_marks_".$request->exam."_students";
        if(Schema::hasTable($table_name)){
            DB::table($table_name)->where('id', $request->id)->update([
                "theory" => $request->theory,
                "mcq" => $request->mcq,
                "practical" => $request->practical,
            ]);

            Toastr::success('Mark Update Successfully.', 'success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.manageMark.edit');
        }else{
            return redirect()->route('admin.manageMark.edit');
        }
    }

    public function result()
    {
        return view('Backend.Admin.ManageMark.result');
    }

    public function getResult(Request $request)
    {
        $table_name = "create_marks_".$request->examination."_students";
        if(Schema::hasTable($table_name)){
            if($request->type == "individual"){
                $results = DB::table($table_name)->where('session',$request->session)->where('class_name',$request->class)->where('roll',$request->roll)->get();

                if($results){
                    $student_info = Student::find($results[0]->student_id);

                    return view("Backend.Admin.ManageMark.result_sheet", compact('student_info','results'));
                }else{
                    Toastr::error('Result Not Found.', 'success', ["positionClass" => "toast-top-right"]);
                    return back();
                }
            }else{
                $gruops = DB::table($table_name)->where('session',$request->session)->where('class_name',$request->class)->orderBy('roll')->get()->groupBy('roll');

                // return $gruops;

                if($gruops){

                    foreach($gruops as $group => $results){
                        $total = 0;
                        foreach($results as $result){
                            $total +=  $result->total;
                        }
                    }
                    return view("Backend.Admin.ManageMark.all_result", compact('gruops'));
                }else{
                    Toastr::error('Result Not Found.', 'success', ["positionClass" => "toast-top-right"]);
                    return back();
                }

            }


        }else{
            Toastr::error('Result Not Found.', 'success', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
}
