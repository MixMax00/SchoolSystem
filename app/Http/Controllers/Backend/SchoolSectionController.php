<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\SchoolSection;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class SchoolSectionController extends Controller
{
    public function index(){
        Gate::authorize('app.web.index');
        return view('Backend.Admin.FrontEnd.school.school');
    }

    public function save(Request $request){
        Gate::authorize('app.web.update');
//        $request->validate([
//           'school_name'=>'required',
//           'short_description'=>'required',
//           'top_description'=>'required',
//           'bottom_description'=>'required',
//           'title_image'=>'required',
//           'middle_image'=>'required',
//        ]);

        $title_image = $request->file('title_image');
        $middle_image = $request->file('middle_image');
        $directory = 'assets/backend/img/school/';
        $school = SchoolSection::find(1);
        if ($school){
            if ($title_image){
                if ($school->title_image){
                    unlink($school->title_image);
                }
                $imageUrl1 = file_upload($title_image,$directory);
                $school->title_image = $imageUrl1;
            }

            if ($middle_image){
                // if ($school->middle_image){
                //     unlink($school->middle_image);
                // }
                $imageUrl2 = file_upload($middle_image,$directory);
                $school->middle_image = $imageUrl2;
            }
            $school->school_name = $request->school_name;
            $school->short_description = $request->short_description;
            $school->top_description = $request->top_description;
            $school->bottom_description = $request->bottom_description;
            $school->save();
        }else{
            $school= new SchoolSection();
            $school->id = 1;
            $school->school_name = $request->school_name;
            $school->short_description = $request->short_description;
            $school->top_description = $request->top_description;
            $school->bottom_description = $request->bottom_description;
            $imageUrl2 = file_upload($middle_image,$directory);
            $school->middle_image = $imageUrl2;
            $imageUrl1 = file_upload($title_image,$directory);
            $school->title_image = $imageUrl1;
            $school->save();

        }

        Toastr::success('School Section Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
