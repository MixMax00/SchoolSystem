<?php

namespace App\Http\Controllers\Accountant;

use App\Models\Role;
use App\Models\Accountant;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AccountantController extends Controller
{
    public function index()
    {
        Gate::authorize('app.teacher.index');
    	return view('Backend.Admin.Accountant.index');
    }

    public function add(){
        return view('Backend.Admin.Accountant.create');
    }

    // store method -- POST
    public function store(Request $request)
    {
        Gate::authorize('app.teacher.create');
    	// validation

        $role = Role::where('slug','accountant')->first();
    	if ($request->file('image')) {
    		$width = 417;
    		$height = 458;
    		$directory = "assets/backend/teacher/";
    		$db_url = image_upload($request->image,$directory,$width,$height);
    		Accountant::create([
				"name"          => $request->name,
                "role_id"       => $role->id,
				"designation"   => $request->designation,
                "dob"           => $request->dob,
                "salary"        => $request->salary,
                "gender"        => $request->gender,
                "phone"         => $request->phone,
                "address"       => $request->address,
                "email"         => $request->email,
                "password"      => Hash::make($request->password),
                "department"    => $request->department,
                "fb"            => $request->fb,
                "twitter"       => $request->twitter,
                "linkden"       => $request->linkden,
				"qualification" => $request->qualification,
				"image"         => $db_url,
				"created_at"    => Carbon::now(),
			]);

    	}else{
    		Accountant::create([
				"name"          => $request->name,
				"designation"   => $request->designation,
                "dob"           => $request->dob,
                "gender"        => $request->gender,
                "phone"         => $request->phone,
                "salary"        => $request->salary,
                "address"       => $request->address,
                "email"         => $request->email,
                "password"      => Hash::make($request->password),
                "department"    => $request->department,
                "fb"            => $request->fb,
                "twitter"       => $request->twitter,
                "linkden"       => $request->linkden,
				"qualification" => $request->qualification,
				"created_at"    => Carbon::now(),
			]);
    	}

    	Toastr::success('Accountant Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
    	return back();
    }



    public function edit($id)
    {
        Gate::authorize('app.teacher.update');
        $edit = Accountant::find($id);
        return view('Backend.Admin.Accountant.edit', compact('edit'));
    }

    // update method --POST

    public function update(Request $request)
    {

        Gate::authorize('app.teacher.update');
    	$teachers = Accountant::find($request->id);
    	// teacher info save
    	if ($request->file('image')) {
    		if ($teachers->image){
                unlink($teachers->image);
            }
    		$width = 417;
    		$height = 458;
    		$directory = "assets/backend/teacher/";
    		$db_url = image_upload($request->image,$directory,$width,$height);
    		Accountant::where('id',$request->id)->update([
				"name"          => $request->name,
				"designation"   => $request->designation,
                "dob"           => $request->dob,
                "gender"        => $request->gender,
                "phone"         => $request->phone,
                "salary"        => $request->salary,
                "address"       => $request->address,
                "fb"            => $request->fb,
                "twitter"       => $request->twitter,
                "linkden"       => $request->linkden,
				"qualification" => $request->qualification,
                "image"         => $db_url,
			]);

    	}else{
    		Accountant::where('id',$request->id)->update([
				"name"          => $request->name,
				"designation"   => $request->designation,
                "dob"           => $request->dob,
                "gender"        => $request->gender,
                "phone"         => $request->phone,
                "salary"        => $request->salary,
                "address"       => $request->address,
                "department"    => $request->department,
                "fb"            => $request->fb,
                "twitter"       => $request->twitter,
                "linkden"       => $request->linkden,
				"qualification" => $request->qualification,
			]);
    	}

    	Toastr::success('Accountant Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);
    	return back();
    }

    // status methode --GET

    public function status($id)
    {
        Gate::authorize('app.teacher.update');
        $course = Accountant::find($id);
        if ($course->status == "1") {
            Accountant::where('id', $course->id)->update([
                "status"  => "0",
            ]);

            Toastr::success('Accountant inactive Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            Accountant::where('id', $course->id)->update([
                "status"  => "1"
            ]);
            Toastr::success('Accountant Active Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    // delete methode  --GET

    public function destroy($id){
        Gate::authorize('app.teacher.delete');
        $teacher = Accountant::find($id);
        if ($teacher->image){
            unlink($teacher->image);
        }
        $teacher->delete();
        Toastr::error('Accountant Deleted Successfully', 'Danger', ["positionClass" => "toast-top-right"]);

        return response()->json([
            'status'=>200,
        ]);
    }
}
