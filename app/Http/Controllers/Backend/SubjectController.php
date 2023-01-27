<?php

namespace App\Http\Controllers\Backend;

use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class SubjectController extends Controller
{
    public function index($id)
    {
        Gate::authorize('app.subject.index');
        $class = Classes::find($id);
        return view('Backend.Admin.Subject.index',[
            "class" => $class,
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('app.subject.create');
       $request->validate([
            "sub_name"    => "required",
            "class_id"    => "required",
            "teacher_id"  => "required",
       ]);

       Subject::create([
            "sub_name"     => $request->sub_name,
            "class_id"     => $request->class_id,
            "teacher_id"   => $request->teacher_id,
            "created_at"   => Carbon::now(),
       ]);

       Toastr::success('Subject Insert Successfully', 'Success', ["positionClass" => "toast-top-right"]);
       return back();
    }

    public function update(Request $request)
    {
        Gate::authorize('app.subject.update');
        Subject::where('id',$request->id)->update([
            "sub_name"     => $request->sub_name,
            "class_id"     => $request->class_id,
            "teacher_id"   => $request->teacher_id,
            "updated_at"   => Carbon::now(),
       ]);

       Toastr::success('Subject Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);
       return back();
    }

    public function delete($id){
        Gate::authorize('app.subject.delete');
        $sec = Subject::find($id);
        $sec->delete();

        Toastr::error('Subject Delete Successfully', 'Success', ["positionClass" => "toast-top-right"]);


        return response()->json([
            'status'=>200
        ]);
    }
}
