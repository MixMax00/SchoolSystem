<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherLoginController extends Controller
{
    public function index()
    {
        return view('Teacher.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            "email" => "required|email|exists:teachers,email",
            "password" => "required",
        ]);

        $login = $request->only('email','password');


        if(Auth::guard('teacher')->attempt($login)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('teacher.index');
        }
    }
}
