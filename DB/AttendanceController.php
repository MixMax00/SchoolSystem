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
        $section = Section::find($request->section);
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

    public function store(Request $request)
    {
        Gate::authorize('app.attendance.create');

        $tablename = $request->session_year.'_'.$request->class_name.'_'.'attandence';
        if (Schema::hasTable($tablename)) {
//            return $tablename;
            if ($request->has('roll')){
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

//        return $tablename;
        Toastr::success('Attendance store successfully ', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.dailyAttendance.index');

//        return $request->all();
    }
}
