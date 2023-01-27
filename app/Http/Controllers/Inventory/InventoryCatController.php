<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Models\InventoryCategory;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class InventoryCatController extends Controller
{
    public function index()
    {
        return view('Backend.Inventory.Category.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            "category_name" => "required",
        ]);

        InventoryCategory::create([
            "category_name"  => $request->category_name,
            "description"    => $request->description
        ]);

        Toastr::success('Category Added.', 'Success', ["positionClass" => "toast-top-right"]);

        return back();


    }

    public function update(Request $request)
    {
        InventoryCategory::where('id',$request->id)->update([
            "category_name"  => $request->category_name,
            "description"    => $request->description
        ]);

        Toastr::success('Category Update.', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function status($id)
    {
        $inventory = InventoryCategory::find($id);

        if($inventory->status == 1){
            InventoryCategory::where('id',$inventory->id)->update([
                "status"    => 0,
            ]);

            Toastr::success('Category  Inactive.', 'Success', ["positionClass" => "toast-top-right"]);

            return back();
        }else{
            InventoryCategory::where('id',$inventory->id)->update([
                "status"    => 1,
            ]);
            Toastr::success('Category  Active.', 'Success', ["positionClass" => "toast-top-right"]);

            return back();
        }
    }


    public function delete($id)
    {
        $inventory = InventoryCategory::find($id);

        if($inventory){
            $inventory->delete();
            Toastr::error('Category Deleted Successfully', 'Danger', ["positionClass" => "toast-top-right"]);
            return response()->json([
                "status" => 200,
            ]);
        }
    }
}
