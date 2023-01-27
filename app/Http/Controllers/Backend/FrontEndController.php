<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class FrontEndController extends Controller
{
    public function general_settings(){
        Gate::authorize('app.web.index');
        return view('Backend.Admin.FrontEnd.GeneralSettings.GeneralSettings');
    }

    public function general_settings_save(Request $request){
        Gate::authorize('app.exam.update');
        $request->validate([
           'website_name' => 'required',
           'footer' => 'required',
           'email' => 'required',
        //    'phone' => 'required',
        //    'fax' => 'required',
        //    'address' => 'required',
        //    'latitude' => 'required',
        //    'longitude' => 'required',
//           'logo' => 'required|image',
//           'favicon' => 'required|image',
        ]);


        $general = GeneralSettings::find(1);
        $directory = 'assets/backend/img/general_settings/';
        $logo = $request->file('logo');
        $favicon = $request->file('favicon');

        if ($general){
            if ($logo){
                if($general->logo){
                    unlink($general->logo);
                    $imageurl = file_upload($logo,$directory);
                    $general->logo = $imageurl;

                }else{
                    $imageurl = file_upload($logo,$directory);
                    $general->logo = $imageurl;
                }
            }
            if ($favicon){
                if($general->favicon){
                    unlink($general->favicon);
                    $imageurl2 = file_upload($favicon,$directory);
                    $general->favicon = $imageurl2;

                }else{
                    $imageurl2 = file_upload($favicon,$directory);
                    $general->favicon = $imageurl2;
                }
            }
            $general->website_name = $request->website_name;
            $general->email = $request->email;
            $general->phone = $request->phone;
            $general->fax = $request->fax;
            $general->address = $request->address;
            $general->latitude = $request->latitude;
            $general->longitude = $request->longitude;
            $general->footer = $request->footer;

            $general->save();
            Toastr::success('General Settings Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);


        }else{

            $general_settings = new GeneralSettings();
            $imageurl1=file_upload($logo,$directory);
            $imageurl2=file_upload($favicon,$directory);

            $general_settings->id = 1;
            $general_settings->website_name = $request->website_name;

            $general_settings->email = $request->email;
            $general_settings->phone = $request->phone;
            $general_settings->fax = $request->fax;
            $general_settings->address = $request->address;
            $general_settings->latitude = $request->latitude;
            $general_settings->longitude = $request->longitude;

            $general_settings->footer = $request->footer;
            $general_settings->logo =$imageurl1;
            $general_settings->favicon = $imageurl2;

            $general_settings -> save();
            Toastr::success('General Settings Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);


        }

        return back();

    }


    public function banner(){
        Gate::authorize('app.web.index');
        return view('Backend.Admin.FrontEnd.Banner.banner');

    }

    public function banner_save(Request $request){
        Gate::authorize('app.web.create');
        $request->validate([
            'headings'=>'required',
            // 'short_description'=>'required',
            // 'email'=>'required',
            // 'phone'=>'required',
            'image'=>'required',
        ]);

        $image =  $request->file('image');
//        return $logo;

        $directory = 'assets/backend/img/banner/';
        $maxwidth = 1920 ;
        $maxheight = 515;

        $imageUrl = image_upload($image,$directory,$maxwidth,$maxheight);

        $banner = new Banner();
        $banner->headings=$request->headings;
        $banner->email=$request->email;
        $banner->phone=$request->phone;
        $banner->image=$imageUrl;
        $banner->save();
        Toastr::success('Banner Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();

    }


    public function active_banner($id){
        Gate::authorize('app.web.update');
        $banner = Banner::find($id);
        $banner->status = 1;
        $banner->save();
        Toastr::success('Banner Active Successfully', 'Active', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function inactive_banner($id){
        Gate::authorize('app.web.update');
        $banner = Banner::find($id);
        $banner->status = 0;
        $banner->save();
        Toastr::error('Banner Inactive Successfully', 'Inactive', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function banner_update(Request $request){
        Gate::authorize('app.web.update');
        $banners = Banner::find($request->id);
//        return $banners;

//        $request->validate([
//            'headings'=>'required',
//            'short_description'=>'required',
//            'email'=>'required',
//            'phone'=>'required',
//            'image'=>'required',
//        ]);




        $image =  $request->file('image');
        if ($image){
            // if ($banners->image){
            //     unlink($banners->image);
            // }
            $directory = 'assets/backend/img/banner/';

            $maxwidth = 1920 ;
            $maxheight = 515;

            $imageUrl = image_upload($image,$directory,$maxwidth,$maxheight);

//            $banner = new Banner();
            $banners->headings=$request->headings;
            $banners->email=$request->email;
            $banners->phone=$request->phone;
            $banners->image=$imageUrl;
            $banners->save();
        }
        else{
            $banners->headings=$request->headings;
            $banners->email=$request->email;
            $banners->phone=$request->phone;
            $banners->save();
        }

//        return $logo;

        Toastr::success('Banner Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }


    public function delete_banner($id){
        $employee = Banner::find($id);
        if ($employee->image){
            unlink($employee->image);
        }
        $employee->delete();
        Toastr::error('Banner Deleted Successfully', 'Danger', ["positionClass" => "toast-top-right"]);

        return response()->json([
            'status'=>200,
        ]);
    }
}
