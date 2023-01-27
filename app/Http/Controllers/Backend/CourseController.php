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


class CourseController extends Controller
{
    
     // index method --GET

    public function index()
    {
        Gate::authorize('app.course.index');
        //return $trades;
        $courses = Course::all();
       // return $courses;
    	return view('Backend.Admin.Course.course', compact('courses'));
    }


    // store method -- POST
    public function store(Request $request)
    {
        Gate::authorize('app.course.create');
        $request->validate([
            "course_name"   => "required",
            "course_code"   => "required",
            "status"        => "required"
        ]);

        // store course

        Course::create([
            "course_name"   => $request->course_name,
            "course_code"   => $request->course_code,
            "status"        => $request->status,
            "created_at"    => Carbon::now()
        ]);

        Toastr::success('Course Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

     // Edit method -- GET

    public function edit($id)
    {
        Gate::authorize('app.course.update');
        $trades = Trade::all();
        $edit = Course::find($id);
        return view('admin.course.edit', compact('trades','edit'));
    }

    // single view methode --GET

    public function single($id)
    {

    }

    // update method --POST

    public function update(Request $request)
    {
        Gate::authorize('app.course.update');
        // updated course

        Course::where('id', $request->id)->update([
            "course_name"   => $request->course_name,
            "course_code"   => $request->course_code,
            "status"        => $request->status,
            "updated_at"    => Carbon::now()
        ]);

        Toastr::success('Course Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    // status methode --GET

    public function status($id)
    {

        Gate::authorize('app.course.update');
        $course = Course::find($id);
        if ($course->status == "1") {
            Course::where('id', $course->id)->update([
                "status"  => "0",
            ]);

            Toastr::success('Course inactive Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            Course::where('id', $course->id)->update([
                "status"  => "1"
            ]);
            Toastr::success('Course Active Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    // delete methode  --GET

    public function delete($id)
    {
        Gate::authorize('app.course.delete');
         $course = Course::find($id);
         if ($course) {
             $course->delete();
         }

        Toastr::error('Course Deleted Successfully', 'Danger', ["positionClass" => "toast-top-right"]);

        return response()->json([
            'status'=>200,
        ]);
    }
}
