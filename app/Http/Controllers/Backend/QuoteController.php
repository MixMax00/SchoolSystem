<?php

namespace App\Http\Controllers\Backend;

use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class QuoteController extends Controller
{
    public function index(){
        Gate::authorize('app.web.index');
        return view('Backend.Admin.FrontEnd.Quotes.Quotes');
    }

    public function save(Request $request){
        Gate::authorize('app.web.create');
        $request->validate([
           'name'=>'required',
           'message'=>'required',
           'designation'=>'required',
           'education_details'=>'required',
           'image'=>'required',
        ]);

        $image = $request->file('image');
        $directory = 'assets/backend/img/message_img/';
        $width =253;
        $height =310;
        $imageUrl = image_upload($image,$directory,$width,$height);


        $message = new Quote();

        $message->name = $request->name;
        $message->quotes = $request->message;
        $message->designation = $request->designation;
        $message->education = $request->education_details;
        $message->image = $imageUrl;
        $message->save();

        Toastr::success('New Message Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return back();

    }
    public function update(Request $request){
        Gate::authorize('app.web.update');
        $message = Quote::find($request->id);
        $image = $request->file('image');
        $directory = 'assets/backend/img/message_img/';
        $width =253;
        $height =310;
        if ($image){
            // if ($message->image){
            //     unlink($message->image);
            // }
            $imageUrl = image_upload($image,$directory,$width,$height);
            $message->name = $request->name;
            $message->quotes = $request->message;
            $message->designation = $request->designation;
            $message->education = $request->education_details;
            $message->image = $imageUrl;
            $message->save();

        }else{
            $message->name = $request->name;
            $message->quotes = $request->message;
            $message->designation = $request->designation;
            $message->education = $request->education_details;
            $message->save();
        }

        Toastr::success('New Message Updated Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return back();

    }

    public function delete_message($id){
        Gate::authorize('app.web.delete');
        $m = Quote::find($id);
        if ($m->image){
            unlink($m->image);
        }
        $m->delete();
        Toastr::error('Message Delete Successfully', 'Delete', ["positionClass" => "toast-top-right"]);

        return response()->json([
            'status' => 200
        ]);

    }

    public function inactive($id){
        $m = Quote::find($id);
        $m->status = 0;
        $m->save();

        Toastr::error('Message Inactive Successfully', 'Inactive', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function active($id){
        $m = Quote::find($id);
        $m->status = 1;
        $m->save();

        Toastr::success('Message Active Successfully', 'Active', ["positionClass" => "toast-top-right"]);
        return back();
    }


}
