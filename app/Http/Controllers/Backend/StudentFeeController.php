<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Schema;

class StudentFeeController extends Controller
{
    // STUDENT FEE - GET
    public function index()
    {
        return view('Backend.Admin.Accounting.StudentFee.index');
    }

    //GET STUDENT NAME -- POST

    public function getStudent(Request $request)
    {
        $table_name = $request->session_year . '_' . $request->class_id . '_students';

        if (Schema::hasTable($table_name)) {
           $students = DB::table($table_name)->get();

        //    return $students;

           foreach($students as $student){
                echo $output = '<option value="' .$student->roll . '">' . $student->stu_name. '</option>';
           }

        }else{
            echo $output = '<option value="">No student found</option>';
        }
    }

    public function storeStudentFee(Request $request)
    {
        // return $request->all();

        $table_name = $request->session."_".$request->class."_fees";
        if(Schema::hasTable($table_name)){
            DB::table($table_name)->insert([
                "session_year"  => $request->session,
                "class"         => $request->class,
                "stu_roll"      => $request->stu_roll,
                "amount"        => $request->amount,
                "fee_type"      => $request->fee_type,
                "date"          => $request->date,
                "status"        => $request->status,
            ]);

            Toastr::success('Payment Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            Schema::create($table_name, function ($table) {
                $table->increments('id');
                $table->string('session_year')->nullable();
                $table->string('class')->nullable();
                $table->string('stu_roll')->nullable();
                $table->string('amount')->nullable();
                $table->string('fee_type')->nullable();
                $table->date('date')->nullable();
                $table->tinyInteger('status')->nullable();
            });

            DB::table($table_name)->insert([
                "session_year"  => $request->session,
                "class"         => $request->class,
                "stu_roll"      => $request->stu_roll,
                "amount"        => $request->amount,
                "fee_type"      => $request->fee_type,
                "date"          => $request->date,
                "status"        => $request->status,
            ]);

            Toastr::success('Payment Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }

    }


}
