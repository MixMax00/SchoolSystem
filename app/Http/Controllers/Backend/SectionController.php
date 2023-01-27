<?php

namespace App\Http\Controllers\Backend;

use App\Models\Classes;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class SectionController extends Controller
{
    public function index($id=''){
        Gate::authorize('app.section.index');
        if(empty($id)){
            $class = Classes::first();
            $sections = Section::where('class_id',$class->id)->get();
            return view('Backend.Admin.Class.section', compact('sections','class'));
        }else{
            $class = Classes::find($id);
            $sections = Section::where('class_id',$class->id)->get();
            return view('Backend.Admin.Class.section', compact('sections','class'));
        }

    }

    public function add(Request $request){
         Gate::authorize('app.section.create');
        $request->validate([
           'section_name'=>'required',
           'class_id'=>'required',
        ]);

        $sec = new Section();

        $sec->section_name = $request->section_name;
        $sec->class_id = $request->class_id;
        $sec->save();

        Toastr::success('Section Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);


        return back();
    }
    public function update(Request $request){
        Gate::authorize('app.section.update');
        // $request->validate([
        //    'section_name'=>'required',
        //    'class_id'=>'required',
        // ]);

        $sec = Section::find($request->id);

        $sec->section_name = $request->section_name;
        $sec->class_id = $request->class_id;
        $sec->save();

        Toastr::success('Section Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);


        return back();
    }

    public function delete($id){
        Gate::authorize('app.section.delete');
        $sec = Section::find($id);
        $sec->delete();

        Toastr::error('Section Delete Successfully', 'Success', ["positionClass" => "toast-top-right"]);


        return response()->json([
            'status'=>200
        ]);
    }
}
