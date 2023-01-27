<?php

namespace App\Http\Controllers\Backend;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Notification;

class SendMailController extends Controller
{
    public function index()
    {
        return view('Backend.Admin.SendMail.index');
    }

    public function store(Request $request)
    {
        // return $request->all();

        $request->validate([
            "type"    => "required",
            "title"   => "required",
            "message" => "required",
        ]);
        $type = $request->type;
        if($type == "student"){
               $email = Student::pluck('email');
           $sms = [
                "title"   => $request->title,
                "message" => $request->message,
            ];
            Notification::route('mail',$email)->notify(new AdminNotification($sms));
            Toastr::error('Not Found Student Table', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }elseif($type == "guardian"){
            // $email = Guardian::pluck('email');
            $sms = [
                "title"   => $request->title,
                "message" => $request->message,
            ];

            Toastr::error('Not Found Student Table', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }elseif($type == "teacher"){
            $email = Teacher::pluck('email');

            $sms = [
                "title"   => $request->title,
                "message" => $request->message,
            ];

            Notification::route('mail',$email)->notify(new AdminNotification($sms));
            Toastr::success('Email Send Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function sms()
    {
        return view('Backend.Admin.SendMail.sms');
    }
}
