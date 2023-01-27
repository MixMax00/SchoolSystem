<?php

namespace App\Http\Controllers\Backend;

use App\Models\Teacher;
use App\Models\Librarian;
use App\Models\Accountant;
use App\Models\StaffManage;
use Illuminate\Http\Request;
use App\Models\EmployeeSalary;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class EmployeeSalaryController extends Controller
{
    public function index()
    {
        return view('Backend.Admin.Accounting.Salary.index');
    }

    // get all user

    public function getUser(Request $request)
    {

        if($request->employee_type == "teacher"){
            $teachers = Teacher::all();
            foreach($teachers as $teacher){
                echo $output = '<option value="'.$teacher->id.'-t'.'">'.$teacher->name.'</option>';
            }
        }elseif($request->employee_type == "accountant"){
            $accountants = Accountant::all();
            foreach($accountants as $accountant){
                echo $output = '<option value="'.$accountant->id.'-a'.'">'.$accountant->name.'</option>';
            }
        }elseif($request->employee_type == "librarian"){
            $librarians = Librarian::all();
            foreach($librarians as $librarian){
                echo $output = '<option value="'.$librarian->id.'-l'.'">'.$librarian->name.'</option>';
            }
        }elseif($request->employee_type == "staff"){
            $staffs = StaffManage::all();
            foreach($staffs as $staff){
                echo $output = '<option value="'.$staff->id.'-s'.'">'.$staff->name.'</option>';
            }
        }
    }


    public function store(Request $request)
    {
        // VALIDATION RULE

        // return $request->all();

        $request->validate([

        ]);

        $month = $request->month."-".$request->year;

        EmployeeSalary::create([
            "session_year"   => $request->session_year,
            "user_name"      => $request->user_name,
            "user_type"      => $request->user_name,
            "salary"         => $request->pay,
            "month"          => $month,
            "date"           => $request->date,
            "pay_status"     => $request->pay_status,
            "discription"    => $request->discription,
        ]);

        Toastr::success('Salary Pay Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
