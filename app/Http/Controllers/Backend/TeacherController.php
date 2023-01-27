<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\Trade;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    public function index()
    {
        Gate::authorize('app.teacher.index');
    	$schools = Trade::all();
    	$teachers = Teacher::all();
    	return view('Backend.Admin.Teachers.Teacher', compact('schools','teachers'));
    }

    public function add(){
        return view('Backend.Admin.Teachers.add_teacher');
    }

    // store method -- POST
    public function store(Request $request)
    {
        Gate::authorize('app.teacher.create');
    	// validation

        $role = Role::where('slug','teacher')->first();
    	if ($request->file('image')) {
    		$width = 417;
    		$height = 458;
    		$directory = "assets/backend/teacher/";
    		$db_url = image_upload($request->image,$directory,$width,$height);
    		Teacher::create([
				"name"          => $request->name,
                "role_id"       => $role->id,
				"designation"   => $request->designation,
                "dob"           => $request->dob,
                "gender"        => $request->gender,
                "phone"         => $request->phone,
                "address"       => $request->address,
                "salary"        => $request->salary,
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
    		Teacher::create([
				"name"          => $request->name,
				"designation"   => $request->designation,
                "dob"           => $request->dob,
                "gender"        => $request->gender,
                "phone"         => $request->phone,
                "address"       => $request->address,
                "salary"        => $request->salary,
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

    	Toastr::success('Teacher Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
    	return back();
    }



    public function edit($id)
    {
        Gate::authorize('app.teacher.update');
        $edit = Teacher::find($id);
        return view('Backend.Admin.Teachers.edit', compact('edit'));
    }

    // update method --POST

    public function update(Request $request)
    {

        Gate::authorize('app.teacher.update');
    	$teachers = Teacher::find($request->id);
    	// teacher info save
    	if ($request->file('image')) {
    		if ($teachers->image){
                unlink($teachers->image);
            }
    		$width = 417;
    		$height = 458;
    		$directory = "assets/backend/teacher/";
    		$db_url = image_upload($request->image,$directory,$width,$height);
    		Teacher::where('id',$request->id)->update([
				"name"          => $request->name,
				"designation"   => $request->designation,
                "dob"           => $request->dob,
                "gender"        => $request->gender,
                "phone"         => $request->phone,
                "address"       => $request->address,
                "salary"        => $request->salary,
                "fb"            => $request->fb,
                "twitter"       => $request->twitter,
                "linkden"       => $request->linkden,
				"qualification" => $request->qualification,
                "image"         => $db_url,
			]);

    	}else{
    		Teacher::where('id',$request->id)->update([
				"name"          => $request->name,
				"designation"   => $request->designation,
                "dob"           => $request->dob,
                "gender"        => $request->gender,
                "phone"         => $request->phone,
                "address"       => $request->address,
                "department"    => $request->department,
                "salary"        => $request->salary,
                "fb"            => $request->fb,
                "twitter"       => $request->twitter,
                "linkden"       => $request->linkden,
				"qualification" => $request->qualification,
			]);
    	}

    	Toastr::success('Teacher Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);
    	return back();
    }

    // status methode --GET

    public function status($id)
    {
        Gate::authorize('app.teacher.update');
        $course = Teacher::find($id);
        if ($course->status == "1") {
            Teacher::where('id', $course->id)->update([
                "status"  => "0",
            ]);

            Toastr::success('Teacher inactive Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            Teacher::where('id', $course->id)->update([
                "status"  => "1"
            ]);
            Toastr::success('Teacher Active Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    // delete methode  --GET

    public function destroy($id){
        Gate::authorize('app.teacher.delete');
        $teacher = Teacher::find($id);
        if ($teacher->image){
            unlink($teacher->image);
        }
        $teacher->delete();
        Toastr::error('Teacher Deleted Successfully', 'Danger', ["positionClass" => "toast-top-right"]);

        return response()->json([
            'status'=>200,
        ]);
    }

}
