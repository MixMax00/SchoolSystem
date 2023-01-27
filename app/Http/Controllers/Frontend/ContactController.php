<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function contact_save(Request $request)
    {
    	// validation

    	$request->validate([
    		"name"    => "required",
    		"email"   => "required",
    		"phone"   => "required",
    		"subject" => "required",
    		"message" => "required",
    	]);

    	//return $request->all();

    	Contact::create([
            "school_id" =>  "ins-39405",
    		"name"      =>  $request->name,
    		"email"     =>  $request->email,
    		"phone"     =>  $request->phone,
    		"subject"   =>  $request->subject,
    		"message"   =>  $request->message,
    	]);

    	Toastr::info('Message Send Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }
    public function showMessage()
    {
        return view("Backend.Admin.Message.message");
    }

    public function delete($id)
    {

        $message = Contact::find($id);
         if ($message) {
             $message->delete();
        }

        Toastr::success('Course Deleted Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return response()->json([
           'status'=>200
        ]);


    }
}
