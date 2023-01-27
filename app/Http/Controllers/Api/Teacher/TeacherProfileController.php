<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherProfileController extends Controller
{
    // PROFILE - GET

    public function profile()
    {
        $profile = Auth::guard('teacherApi')->user();

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
            "message"   => "Teacher Logged Out Successfully",
        ]);
    }
}
