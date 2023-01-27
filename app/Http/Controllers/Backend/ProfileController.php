<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function profile()
    {
    	$profile = User::find(auth()->user()->id);
    	return view('Backend.Admin.Profile.profile', compact('profile'));
    }

    public function changePassword()
    {
    	return view('Backend.Admin.Profile.password');
    }

    public function changePasswordSave(Request $request)
    {
    	$request->validate([
    		"password" => "required|string|confirmed"
    	]);

    	if (auth()->user()->school_id) {
    		User::where('school_id', auth()->user()->school_id)->update([
    			"password"  => Hash::make($request->password),
    		]);

    		Toastr::success('Password Change Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
    	}else{
    		return back();
    	}
    }
}
