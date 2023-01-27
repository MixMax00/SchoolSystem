<?php

namespace App\Http\Controllers\Backend;

use App\Models\StaffManage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class StaffController extends Controller
{
    public function index()
    {
        return view('Backend.Admin.Staff.index');
    }

    public function store(Request $request)
    {
       $request->validate([

       ]);

       if ($request->file('image')) {
            $width = 417;
            $height = 458;
            $directory = "assets/backend/teacher/";
            $db_url = image_upload($request->image,$directory,$width,$height);

            StaffManage::create([
                    "name"          => $request->name,
                    "dob"           => $request->dob,
                    "gender"        => $request->gender,
                    "address"       => $request->address,
                    "qualification" => $request->qualification,
                    "phone"         => $request->phone,
                    "department"    => $request->department,
                    "salary"        => $request->salary,
                    "image"         => $db_url,
            ]);

            Toastr::success('Staff Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
    	    return back();
       }else{
            Toastr::info('Please give a picture', 'Success', ["positionClass" => "toast-top-right"]);
    	    return back();
       }


    }


    public function update(Request $request)
    {


        if ($request->file('image')) {
             $width = 417;
             $height = 458;
             $directory = "assets/backend/teacher/";
             $db_url = image_upload($request->image,$directory,$width,$height);

             StaffManage::where('id', $request->id)->update([
                     "name"          => $request->name,
                     "dob"           => $request->dob,
                     "gender"        => $request->gender,
                     "address"       => $request->address,
                     "qualification" => $request->qualification,
                     "phone"         => $request->phone,
                     "department"    => $request->department,
                     "salary"        => $request->salary,
                     "image"         => $db_url,
             ]);

             Toastr::success('Staff Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);
             return back();
        }else{
            StaffManage::where('id', $request->id)->update([
                "name"          => $request->name,
                "dob"           => $request->dob,
                "gender"        => $request->gender,
                "address"       => $request->address,
                "qualification" => $request->qualification,
                "phone"         => $request->phone,
                "department"    => $request->department,
                "salary"        => $request->salary,
            ]);
             Toastr::info('Staff Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);
             return back();
        }
    }



    public function status($id)
    {
        $staff = StaffManage::find($id);

        if($staff->status == "1"){
            StaffManage::where('id', $staff->id)->update([
                "status"          => 0,
            ]);
            Toastr::info('Staff Inactive Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            StaffManage::where('id', $staff->id)->update([
                "status"          => 1,
            ]);
            Toastr::info('Staff Active Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function delete($id)

    {
        $staff = StaffManage::find($id);

        if($staff){
            $staff->delete();

            Toastr::success('Staff Delete Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return response()->json([
                "status"  => 200,
            ]);
        }
    }
}
