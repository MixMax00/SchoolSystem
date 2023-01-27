<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{
    public function login()
    {
        return view('Student.Student.login');
    }

    public function check(Request $request)
    {

        $request->validate([
            "email" => "required|exists:students,email",
            "password" => "required",
        ]);

        $login = $request->only('email','password');


        if(Auth::guard('student')->attempt($login)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('sms.login');
        }
    }
}
