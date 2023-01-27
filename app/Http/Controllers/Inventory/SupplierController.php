<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Models\InventSupplier;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SupplierController extends Controller
{
    public function index()
    {
        return view('Backend.Inventory.Supplier.index');
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"    => "required",
            "email"   => "required",
            "address" => "required",
            "phone"   =>  "required",
        ]);

        InventSupplier::create([
            "name"     => $request->name,
            "email"    => $request->email,
            "phone"    =>  $request->phone,
            "address"  => $request->address,
        ]);

        Toastr::success('Supplier Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return back();

    }

    public function update(Request $request)
    {
        InventSupplier::where('id',$request->id)->update([
            "name"     => $request->name,
            "email"    => $request->email,
            "phone"    =>  $request->phone,
            "address"  => $request->address,
        ]);

        Toastr::success('Supplier Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function status($id)
    {
        $supplier = InventSupplier::find($id);

        if($supplier->status == 1 ){
            InventSupplier::where('id',$supplier->id)->update([
               "status"  => 0,
            ]);

            Toastr::success('Supplier Inactive Successfully', 'Success', ["positionClass" => "toast-top-right"]);

            return back();
        }else{
            InventSupplier::where('id',$supplier->id)->update([
                "status"  => 1,
             ]);

             Toastr::success('Supplier Active Successfully', 'Success', ["positionClass" => "toast-top-right"]);

             return back();
        }
    }

    public function delete($id)
    {
        $supplier = InventSupplier::find($id);

        if($supplier){
            $supplier->delete();
            Toastr::error('Supplier Deleted Successfully', 'Delete', ["positionClass" => "toast-top-right"]);
            return response()->json([
                "status" => 200,
            ]);
        }
    }
}
