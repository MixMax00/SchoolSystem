<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trade;
use App\Models\Course;
use App\Models\Division;
use App\Models\District;
use App\Models\Thana;
use App\Models\Union;
use App\Models\OnlineAdmission;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;


class AdmissionController extends Controller
{


	public function onlineAdmission()
    {
    	$courses = Course::where('status', 1)->get();
    	$divisions = Division::all();
    	return view('Frontend.Admission.online-admission', [
    		"courses"   => $courses,
    		"divisions"   => $divisions,
    	]);
    }


    public function get_district(Request $request)
    {
        $districts = District::where('division_id', $request->div_id)->get();
        $output =   '<option selected>Select</option>';
          foreach ($districts as $district) {
            echo $output = '<option value="'.$district->id.'">'.$district->name.'</option>';
          }
    }


    public function get_thana(Request $request)
    {
        $thanas = Thana::where('district_id', $request->dis_id)->get();
        $output =   '<option selected>Select</option>';
          foreach ($thanas as $thana) {
            echo $output = '<option value="'.$thana->id.'">'.$thana->name.'</option>';
          }
    }

    public function get_union(Request $request)
    {
        $unions = Union::where('upazila_id', $request->thana_id)->get();
        $output =   '<option selected>Select</option>';
          foreach ($unions as $union) {
            echo $output = '<option value="'.$union->id.'">'.$union->name.'</option>';
          }
    }

    public function get_district_per(Request $request)
    {
        $districts = District::where('division_id', $request->div_id)->get();
        $output =   '<option selected>Select</option>';
          foreach ($districts as $district) {
            echo $output = '<option value="'.$district->id.'">'.$district->name.'</option>';
          }
    }


    public function get_thana_per(Request $request)
    {
        $thanas = Thana::where('district_id', $request->dis_id)->get();
        $output =   '<option selected>Select</option>';
          foreach ($thanas as $thana) {
            echo $output = '<option value="'.$thana->id.'">'.$thana->name.'</option>';
          }
    }
    public function get_union_per(Request $request)
    {
        $unions = Union::where('upazila_id', $request->thana_id)->get();
        $output =   '<option selected>Select</option>';
          foreach ($unions as $union) {
            echo $output = '<option value="'.$union->id.'">'.$union->name.'</option>';
          }
    }

    public function get_trade(Request $request)
    {
        $trades = Trade::where('course_id', $request->course_id)->get();
        $output =   '<option selected>Select</option>';
          foreach ($trades as $trade) {
            echo $output = '<option value="'.$trade->id.'">'.$trade->trade_title.'</option>';
          }
    }


    public function save(Request $request)
    {
    	//return $request->all();

    	// validation

    	$request->validate([
    		"name"         => "required",
    		"email"        => "required",
    		"gender"       => "required",
    		"religion"     => "required",
    		"phone"        => "required",
    		"date"         => "required",
    		"nationality"  => "required",
    		"father_name"  => "required",
    		"father_phone" => "required",
    		"father_nid"   => "required",
    		"mother_name"  => "required",
    		"mother_nid"   => "required",
    		"division"     => "required",
    		"thana"        => "required",
    		"village"      => "required",
    		"district"     => "required",
    		"union"        => "required",
    		"ssc_roll"     => "required",
    		"ssc_gpa"      => "required",
    		"ssc_depertment" => "required",
    		"ssc_registation"=> "required",
    		"ssc_borad"    => "required",
    		"trade_id"     => "required",
    		"image"        => "required",

    	]);


    	if ($request->file("image")) {
    		$width = 417;
    		$height = 458;
    		$directory = "assets/backend/student/";
    		$db_url = image_upload($request->image,$directory,$width,$height);


    		OnlineAdmission::create([
    			"name"             => $request->name,
	    		"email"            => $request->email,
	    		"birth_certificate" => $request->birth_certificate,
	    		"gender"           => $request->gender,
	    		"religion"         => $request->religion,
	    		"blood_group"      => $request->blood_group,
	    		"phone"            => $request->phone,
	    		"date"             => $request->date,
	    		"nationality"      => $request->nationality,
	    		"father_name"      => $request->father_name,
	    		"father_email"     => $request->father_email,
	    		"father_phone"     => $request->father_phone,
	    		"father_nid"       => $request->father_nid,
	    		"mother_name"      => $request->mother_name,
                "mother_phone"     => $request->mother_phone,
	    		"mother_nid"       => $request->mother_nid,
	    		"local_guardian_name"   => $request->local_guardian_name,
	    		"local_guardian_email"  => $request->local_guardian_email,
	    		"local_guardian_phone"  => $request->local_guardian_phone,
	    		"local_guardian_name"   => $request->local_guardian_name,
	    		"local_guardian_nid"    => $request->local_guardian_nid,
	    		"division"         => $request->division,
	    		"thana"            => $request->thana,
	    		"village"          => $request->village,
	    		"district"         => $request->district,
	    		"union"            => $request->union,
	    		"per_division"         => $request->division,
	    		"per_thana"            => $request->thana,
	    		"per_village"          => $request->village,
	    		"per_district"         => $request->district,
	    		"per_union"            => $request->union,
	    		"ssc_roll"         => $request->ssc_roll,
	    		"ssc_gpa"          => $request->ssc_gpa,
	    		"ssc_depertment"   => $request->ssc_depertment,
	    		"ssc_registation"  => $request->ssc_registation,
	    		"ssc_borad"        => $request->ssc_borad,
	    		"trade_id"         => $request->trade_id,
	    		"image"            => $db_url,
	    		"course_id"        => $request->course_id,
	    		"created_at"       => Carbon::now()
    		]);

        }

    	Toastr::success('Registation Successfully', 'Success', ["positionClass" => "toast-top-right"]);
    	return back()->with('success','Registation Successfully!!');
    }
}
