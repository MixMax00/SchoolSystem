<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\EmployeeSalary;
use App\Models\ExpancesiveList;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class AccountManageController extends Controller
{
    // All Accounting Dashborad

    public function index(Request $request)
    {
        if($request->session_year){
            $classes = \App\Models\Classes::all();
            $total_fee = 0;
            $total_salery = 0;
            $total_expanse = 0;
            foreach($classes as $class){
                $table_name = $request->session_year."_".$class->id."_fees";
                if(Schema::hasTable($table_name)){
                    $total =  DB::table($table_name)->sum('amount');
                    $total_fee = $total_fee + $total;
                }
            }

            $total_em_salery = EmployeeSalary::where('session_year',$request->session_year)->sum('salary');
            $total_salery = $total_salery + $total_em_salery;
            $total_exp = ExpancesiveList::where('session_year', $request->session_year)->sum('pay');
            $total_expanse = $total_expanse + $total_exp;

            return view('Backend.Admin.Accounting.ManageAccount.index', [
                "total_fee"  => $total_fee,
                "total_salery"  => $total_salery,
                "total_expanse" => $total_expanse,
            ]);
        }else{
            $sessions = \App\Models\SessionYear::all();
            $numItems = count($sessions);
            $i = 0;
            $total_fee = 0;
            $total_salery = 0;
            $total_expanse = 0;
            foreach($sessions as $sy) {
                if(++$i === $numItems) {
                    $classes = \App\Models\Classes::all();
                    foreach($classes as $class){
                        $table_name = $sy->session."_".$class->id."_fees";
                        if(Schema::hasTable($table_name)){
                            $total =  DB::table($table_name)->sum('amount');
                            $total_fee = $total_fee + $total;
                        }
                    }

                    $total_em_salery = EmployeeSalary::where('session_year',$sy->session)->sum('salary');
                    $total_salery = $total_salery + $total_em_salery;
                    $total_exp = ExpancesiveList::where('session_year', $sy->session)->sum('pay');
                    $total_expanse = $total_expanse + $total_exp;

                }
            }

            return view('Backend.Admin.Accounting.ManageAccount.index', [
                "total_fee"     => $total_fee,
                "total_salery"  => $total_salery,
                "total_expanse" => $total_expanse,
            ]);
        }

    }
}
