<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Trade;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class TradeController extends Controller
{
    // index method --GET

    public function index()
    {
        Gate::authorize('app.trade.index');
        $courses = Course::where('status',1)->get();
    	$trades = Trade::all();
    	return view('Backend.Admin.Trade.trade', compact('trades','courses'));
    }


    // store method -- POST
    public function store(Request $request)
    {
        Gate::authorize('app.trade.create');
    	// validation
    	$request->validate([
    		"trade_title"    => "required",
    		"trade_code"     => "required",
    		"total_sit"      => "required",
            "ablable_sit"    => "required",
            "fillup_sit"     => "required",
    		"status"         => "required"
    	]);

    	// store trade info

    	Trade::create([
            "course_id"     => $request->course_id,
    		"trade_title"   => $request->trade_title,
    		"trade_code"    => $request->trade_code,
            "total_sit"     => $request->total_sit,
            "ablable_sit"   => $request->ablable_sit,
            "fillup_sit"    => $request->fillup_sit,
    		"status"        => $request->status,
    		"created_at"    => Carbon::now()
    	]);

        Toastr::success('Trade Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
    	return back();


    }

     // Edit method -- GET

    public function edit($id)
    {
        Gate::authorize('app.trade.update');
    	$edit = Trade::find($id);
    	return view('admin.trade.edit', compact('edit'));
    }

    // single view methode --GET

    public function single($id)
    {

    }

    // update method --POST

    public function update(Request $request)
    {
        Gate::authorize('app.trade.update');
        $trades = Trade::where('id',$request->id)->first();
        if($trades){
            Trade::where('id', $request->id)->update([
                "trade_title"   => $request->trade_title,
                "trade_code"    => $request->trade_code,
                "total_sit"     => $request->total_sit,
                "ablable_sit"   => $request->ablable_sit,
                "fillup_sit"    => $request->fillup_sit,
                "status"        => $request->status,
                "status"        => $request->status,
                "updated_at"    => Carbon::now()
            ]);
        }
        Toastr::success('Trade Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    // status methode --GET

    public function status($id)
    {
        Gate::authorize('app.trade.update');
    	$trade_status = Trade::find($id);

    	if ($trade_status->status == '1') {
    		Trade::where('id', $trade_status->id)->update([
	    		"status"        => "0",
	    	]);
	    	Toastr::success('Trade Inactive Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
    	}else{
    		Trade::where('id', $trade_status->id)->update([
	    		"status"        => "1",
	    	]);
	    	Toastr::success('Trade Active Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
    	}
    }

    // delete methode  --GET

    public function destroy($id)
    {
        Gate::authorize('app.trade.delete');
        $trade_delete = Trade::find($id);


        $trade_delete->delete();


        Toastr::error('Trade Deleted Successfully', 'Danger', ["positionClass" => "toast-top-right"]);

        return response()->json([
            'status'=>200,
        ]);
    }
}
