<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

class AttendanceController extends Controller
{
    // get method

    public function index()
    {
        Gate::authorize('app.attendance.index');
        return view('Backend.Admin.DailyAttendance.index');
    }

    public function classSection(Request $request)
    {
       $sections = Section::where('class_id',$request->class_id)->get();

       return $sections;
    }

    public function manageAttendance(Request $request)
    {

        // return $request->all();
        $section = Section::find($request->section);

        $atten_table = $request->session.'_'.$request->class_name.'_'.'attandence';

        // return $atten_table;

        //return $atten_table;
        if(Schema::hasTable($atten_table)){


             $exists = DB::table($atten_table)->where('date',$request->date)->where('class_name',$request->class_name)->where('section',$request->section)->get();

             // return $exists;

            if(!empty($exists)) {
                $table_name = $request->session. '_' . $request->class_name . '_students';
                if(Schema::hasTable($table_name)){
                    $attendances = DB::table($table_name)->where('section', $request->section)->get();
                    return redirect()->route('admin.dailyAttendance.edit',[
                        // "attendances"   => $attendances,
                        "rqsession"     => $request->session,
                        "rqclass_name"  => $request->class_name,
                        "section"       => $request->section,
                        "date"          => $request->date,
                        "attendances"    => $exists,
                    ]);
                }

                // return "attendances";
             }else{
                $table_name = $request->session. '_' . $request->class_name . '_students';


                if(Schema::hasTable($table_name)){
                    $attendances = DB::table($table_name)->where('section', $request->section)->get();
                    // return $attendances; 
                    return view('Backend.Admin.DailyAttendance.create',[
                        "attendances"   => $attendances,
                        "rqsession"     => $request->session,
                        "rqclass_name"  => $request->class_name,
                        "section"       => $section,
                        "date"          => $request->date,
                    ]);
                }else{
                    Toastr::error('Student Not Found.', 'Delete', ["positionClass" => "toast-top-right"]);
                    return back();
                }
             }
        }else{
            $table_name = $request->session. '_' . $request->class_name . '_students';
            if(Schema::hasTable($table_name)){
                $attendances = DB::table($table_name)->where('section', $request->section)->get();
                return view('Backend.Admin.DailyAttendance.create',[
                    "attendances" => $attendances,
                    "rqsession"     => $request->session,
                    "rqclass_name"  => $request->class_name,
                    "section"     => $section,
                    "date"          => $request->date,
                ]);
            }else{
                Toastr::error('Student Not Found.', 'Delete', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }
       

    }

    public function store(Request $request)
    {
        // Gate::authorize('app.attendance.create');

        // return $request->all();

        $tablename = $request->session_year.'_'.$request->class_name.'_'.'attandence';
        if (Schema::hasTable($tablename)) {
            if ($request->has('roll')){
                $exists = DB::table($atten_table)->where('date',$request->date)->where('class_name',$request->class_name)->where('section',$request->section)->get();
                if ($exists) {
                    Toastr::error('This day attendances all ready save successfully ', 'Success', ["positionClass" => "toast-top-right"]);
                    return back();
                }else{

                    for ($a = 0; $a < count($request->roll); $a++) {
                        if ($request->roll[$a] && $request->stu_name[$a] && $request->attendance[$a]){
                            DB::table($tablename)->insert([
                                'student_name' => $request->stu_name[$a],
                                'roll'       => $request->roll[$a],
                                'attendance'      =>  $request->attendance[$a],
                                'session_year'   => $request->session_year,
                                'class_name'      => $request->class_name,
                                'section'    => $request->section,
                                'date'    => $request->date,
                            ]);
                        }

                    }
                }    
            } 
        }else{
            Schema::create($tablename, function ($table) {
                $table->increments('id');
                $table->string('roll')->nullable();
                $table->string('session_year')->nullable();
                $table->string('class_name')->nullable();
                $table->string('section')->nullable();
                $table->string('student_name')->nullable();
                $table->string('attendance')->default('absent');
                $table->string('date')->nullable();

            });

             if ($request->has('roll')){
                $exists = DB::table($atten_table)->where('date',$request->date)->where('class_name',$request->class_name)->where('section',$request->section)->get();
                if ($exists) {
                     Toastr::error('This day attendances all ready save successfully ', 'Success', ["positionClass" => "toast-top-right"]);
                    return back();
                }else{

                    for ($a = 0; $a < count($request->roll); $a++) {
                        if ($request->roll[$a] && $request->stu_name[$a] && $request->attendance[$a]){
                            DB::table($tablename)->insert([
                                'student_name' => $request->stu_name[$a],
                                'roll'       => $request->roll[$a],
                                'attendance'      =>  $request->attendance[$a],
                                'session_year'   => $request->session_year,
                                'class_name'      => $request->class_name,
                                'section'    => $request->section,
                                'date'    => $request->date,
                            ]);
                        }

                    }
                }
            }

          

        }
        Toastr::success('Attendance save successfully ', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.dailyAttendance.index');  
    }

    public function update(Request $request)
    {
        // return $request->all();
       $tablename = $request->session_year.'_'.$request->class_name.'_'.'attandence';
        if (Schema::hasTable($tablename)) {
            if ($request->has('roll')){
                $exists = DB::table($tablename)->where('date',$request->date)->where('class_name',$request->class_name)->where('section',$request->section)->get();
                if ($exists) {
                    for ($a = 0; $a < count($request->roll); $a++) {
                        if ($request->roll[$a] && $request->stu_name[$a] && $request->attendance[$a]){
                            DB::table($tablename)->where('roll',$request->roll[$a])->where('class_name',$request->class_name)->where('date',$request->date)->update([
                                'attendance'      =>  $request->attendance[$a],
                                // 'session_year'   => $request->session_year,
                                // 'class_name'      => $request->class_name,
                                // 'section'    => $request->section,
                                // 'date'    => $request->date,
                            ]);
                        }

                        

                    }

                    Toastr::success('Attendance update successfully ', 'Success', ["positionClass" => "toast-top-right"]);
                   return view('Backend.Admin.',[
                        // "attendances"   => $attendances,
                        "rqsession"     => $request->session,
                        "rqclass_name"  => $request->class_name,
                        "section"       => $request->section,
                        "date"          => $request->date,
                        "attendances"    => $exists,
                    ]);

                    // return back();
                }else{

                   return "hi";
                }    
            } 
        }
    }
}
