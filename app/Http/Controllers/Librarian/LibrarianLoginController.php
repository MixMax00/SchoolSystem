<?php

namespace App\Http\Controllers\Librarian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LibrarianLoginController extends Controller
{
    public function login()
    {
        return view('Librarian.login');
    }

    public function check(Request $request)
    {

        $request->validate([
            "email" => "required|exists:librarians,email",
            "password" => "required",
        ]);
        // $login = Teacher::where('email',$request->email)->where('password',$request->password)->first();

        $login = $request->only('email','password');

        // return $login;

        if(Auth::guard('librarian')->attempt($login)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('librarian.index');
        }
    }
}
