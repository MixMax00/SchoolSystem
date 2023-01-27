<?php

namespace App\Http\Controllers\Api\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentProfileController extends Controller
{
    // PROFILE - GET

    public function profile()
    {
        $profile = Auth::guard('studentApi')->user();

        return response()->json([
            "status"   => 200,
            "data"     => $profile,
        ]);
    }



    //  LOGOUT METHODES - POST

    public function logout(Request $request)
    {
        $token = $request->user()->token();

        $token->revoke();

        return response()->json([
            "status"    => 200,
            "message"   => "Student Logged Out Successfully",
        ]);
    }
}
