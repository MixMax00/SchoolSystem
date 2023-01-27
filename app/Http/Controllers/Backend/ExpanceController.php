<?php

namespace App\Http\Controllers\Backend;

use App\Models\Expance;
use Illuminate\Http\Request;
use App\Models\ExpancesiveList;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class ExpanceController extends Controller
{
    public function index()
    {
        return view('Backend.Admin.Accounting.Expanse.index');
    }

    //  expance store

    public function expanceStore(Request $request)
    {
        // validate expance rule

        $request->validate([
            "expanse_name"  => "required",
        ]);

        Expance::create([
            "expance_name"    => $request->expanse_name,
            "description"     => $request->description,
        ]);

        Toastr::success('Expanse save Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    // Expanse Update Methode -- POST

    public function expanceUpdate(Request $request)
    {
        Expance::where("id", $request->id)->update([
            "expance_name"     => $request->expanse_name,
            "description"      => $request->description,
        ]);

        Toastr::success('Expanse update Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }



    //  DELETE EXPANCE METHOD --GET

    public function deleteExpance($id)
    {

        // AUTHORIZATION
        Gate::authorize('app.exam.delete');
        $expance = Expance::find($id);

        if($expance){
            $expance->delete();

            Toastr::success('Expanse Delete Successfully', 'Success', ["positionClass" => "toast-top-right"]);

            return response()->json([
                "status" => 200,
            ]);
        }
    }



    // All Expance Methode --GET

    public function allExpance()
    {
        return view('Backend.Admin.Accounting.Expanse.allExpance');
    }

    //  EXPANCE METHOD -- POST

    public function allExpanceStore(Request $request)
    {

        // AUTHORIZATION
        // Gate::authorize('app.exam.delete');
        // VALIDATION RULE EXPANCE LIST

        //return $request->all();

        $request->validate([

        ]);

        // STORE EXPANCE LIST



        $month = $request->month."_".$request->year;

        ExpancesiveList::create([
            "session_year"  => $request->session_year,
            "expance_type"  => $request->expanse_type,
            "user_name"     => $request->user_name,
            "email"         => $request->email,
            "phone"         => $request->phone,
            "pay"           => $request->pay,
            "month"         => $month,
            "date"          => $request->date,
            "description"   => $request->description,
            "pay_status"    => $request->pay_status,
        ]);


        Toastr::success('Expanse Pay Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return back();

    }

    public function allExpanceUpdate(Request $request)
    {
        $month = $request->month."_".$request->year;

        ExpancesiveList::where("id", $request->id)->update([
            "session_year"  => $request->session_year,
            "expance_type"  => $request->expanse_type,
            "user_name"     => $request->user_name,
            "email"         => $request->email,
            "phone"         => $request->phone,
            "pay"           => $request->pay,
            "month"         => $month,
            "date"          => $request->date,
            "discription"   => $request->discription,
            "pay_status"    => $request->pay_status,
        ]);


        Toastr::success('Expanse Pay Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }
}
