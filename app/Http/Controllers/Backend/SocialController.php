<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\SocialSettings;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class SocialController extends Controller
{
    public function index()
    {
        Gate::authorize('app.web.index');
    	return view('Backend.Admin.FrontEnd.Social.social');
    }


    public function save(Request $request)
    {
        Gate::authorize('app.web.create');
    	// validation
    	$request->validate([
    		"title"      => "required",
    		"icon"       => "required",
    		"social_url" => "required"
    	]);

    	// store social info

    	$social_settings = new SocialSettings();
    	$social_settings->title       = $request->title;
    	$social_settings->icon        = $request->icon;
    	$social_settings->url         = $request->social_url;
    	$social_settings->save();

    	Toastr::success('Social Icon Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();

    }

    public function update(Request $request)
    {
        Gate::authorize('app.web.create');
    	// $social_setting = SocialSettings::find($request->id);

    	// if ($social_setting){
 		// 	$social_settings->title  =  $request->title;
 		// 	$social_settings->icon  =  $request->icon;
 		// 	$social_settings->url   =  $request->social_url;
 		// 	$social_settings->save();
    	// }

        SocialSettings::where('id',$request->id)->update([
            "title" => $request->title,
            "icon" => $request->icon,
            "url" => $request->social_url,
        ]);

    	Toastr::success('Social Icon Updated Successfully', 'Update', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function active($id){
        Gate::authorize('app.web.update');
    	$social_setting = SocialSettings::find($id);
       	if ($social_setting) {
       		$s = SocialSettings::find($id);
	        $s->status = 1;
	        $s->save();
	    }
        Toastr::success('Social Icon Active', 'Active', ["positionClass" => "toast-top-right"]);
        return back();
    }

     public function inactive($id){
        Gate::authorize('app.web.update');
     	$social_setting = SocialSettings::find($id);
        if ($social_setting) {
       		$s = SocialSettings::find($id);
	        $s->status = 0;
	        $s->save();
	    }
        Toastr::error('Social Icon Inactive', 'Inactive', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function delete($id){
        Gate::authorize('app.web.delete');
    	$social_setting = SocialSettings::find($id);
       	if ($social_setting) {
       		$s = SocialSettings::find($id);
	        $s->delete();
	        Toastr::error('Icon Deleted ', 'Delete', ["positionClass" => "toast-top-right"]);
	        return response()->json([
	           'status'=>200
	        ]);
       	}

    }
}
