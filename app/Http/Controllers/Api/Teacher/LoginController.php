<?php

namespace App\Http\Controllers\Api\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // TEACHER LOGIN  -POST

    public function login(Request $request){
        // Validation Teacher Info

        $data = $request->validate([
            "email"      => "required",
            "password"   => "required",
        ]);


        // Validate Check

        if(!Auth::guard('teacher')->attempt($data)){

            return response()->json([
                "status"   => false,
                "message"  => "Invalid Credentials",
            ]);
        }

        $token = Auth::guard('teacher')->user()->createToken("auth_token")->accessToken;

        return response()->json([
            "status"        => 200,
            "message"       => "Teacher Login Successfully",
            "access_token"  => $token
        ]);


    }
}
