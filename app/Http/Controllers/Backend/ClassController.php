<?php

namespace App\Http\Controllers\Backend;

use App\Models\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class ClassController extends Controller
{
    public function index(){
        Gate::authorize('app.class.index');
        return view('Backend.Admin.Class.class');
    }
    public function add(Request $request){
        Gate::authorize('app.class.create');
        $request->validate([
           'class_name'=>'required',
            'class_name_numeric'=>'required',
            'class_teacher'=>'required'
        ]);

        $class = new Classes();
        $class->class_name = $request->class_name;
        $class->class_name_numeric = $request->class_name_numeric;
        $class->teacher_id = $request->class_teacher;
        $class->save();

        Toastr::success('Class Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);


        return back();

    }

    public function update(Request $request){
        Gate::authorize('app.class.update');
        $request->validate([
           'class_name'=>'required',
           'class_name_numeric'=>'required',
           'class_teacher'=>'required',
        ]);

        $class = Classes::find($request->id);

        $class->class_name = $request->class_name;
        $class->class_name_numeric = $request->class_name_numeric;
        $class->teacher_id = $request->class_teacher;
        $class->save();

        Toastr::success('Class Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);


        return back();



    }

    public function delete($id){
        Gate::authorize('app.class.delete');
//        return $id;

        $class = Classes::find($id);
        $class->delete();

        Toastr::error('Class Delete Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return response()->json([
            'status'=>200,
        ]);
    }
}
