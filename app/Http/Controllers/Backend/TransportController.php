<?php

namespace App\Http\Controllers\Backend;

use App\Models\Transport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class TransportController extends Controller
{
    public function index()
    {
        return view('Backend.Admin.Transport.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'route_name'  => 'required',
            'vehicle_num' => 'required',
        ]);

        Transport::create([
            "route_name"  => $request->route_name,
            "vehicle_num" => $request->vehicle_num,
            "description" => $request->description,
            "route_fare"  => $request->route_fare
        ]);

        Toastr::success('Transport Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
    	return back();
    }

    public function update(Request $request)
    {

        Transport::where('id',$request->id)->update([
            "route_name"  => $request->route_name,
            "vehicle_num" => $request->vehicle_num,
            "description" => $request->description,
            "route_fare"  => $request->route_fare
        ]);

        Toastr::success('Transport Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);
    	return back();
    }

    public function delete($id)
    {
        Gate::authorize('app.trade.delete');
        $transport_delete = Transport::find($id);


        $transport_delete->delete();


        Toastr::error('Transport Deleted Successfully', 'Danger', ["positionClass" => "toast-top-right"]);

        return response()->json([
            'status'=>200,
        ]);
    }
}
