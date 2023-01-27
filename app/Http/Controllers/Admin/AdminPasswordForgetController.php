<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\AdminReset;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Notification;

class AdminPasswordForgetController extends Controller
{
    public function AdminReset()
    {
        return view('Admin.index');
    }

    public function AdminSend(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users,email",
        ]);

         // Check this email is registered or un registerd

         $user = User::where('email', $request->email)->first();

         if (!$user) {
             return  response()->json([
                'message'=>'U dont have registerd'
             ],422);

         }else{
             $token = AdminReset::where('user_id',$user->id)->delete();

             $token = AdminReset::create([
                 "user_id"=> $user->id,
                 "token"   => rand(0, 99999),
                 "created_at" => Carbon::now(),
             ]);

             Notification::send($user, new AdminNotification($token));
             Toastr::success('Password reset token send', 'Success', ["positionClass" => "toast-top-right"]);

             return redirect()->route('admin.otp');
         }

    }

    public function sendOTP()
    {
        return view('Admin.token');
    }

    public function checkOTP(Request $request)
    {
        $request->validate([
            "otp" => "required|exists:admin_resets,token",
        ]);

        $match_token = AdminReset::where('token',$request->otp)->first();

    	if (!$match_token) {
    		return back()->with('message', 'Please Valid OTP Here!!!');
    	}else{
    		return view('Admin.password', compact('match_token'));
    	}


    }

    public function chanagePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
       ]);


        $users = User::findOrFail($request->user_id);
        $users->password = Hash::make($request->password);
        $users->save();
        AdminReset::where('user_id',$request->user_id)->delete();
        return redirect()->route('login')->with('message','Password Cahnage Successfully!');
    }
}
