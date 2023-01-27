<?php

namespace App\Http\Controllers\Backend;

use App\Models\SessionYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class SessionController extends Controller
{
    public function index(){
        Gate::authorize('app.session.index');
        return view('Backend.Admin.Session.session');
    }

    public function add(Request $request){
        Gate::authorize('app.session.create');
        $request->validate([
           'session_name'=>'required'
        ]);

//        $session = SessionYear::where('session','=',$request->session)
        $session = new SessionYear();
        $session->session = $request->session_name;
        $session->save();


        Toastr::success('Session  Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function update(Request $request){
        Gate::authorize('app.session.update');
        $session = SessionYear::find($request->id);

        $session->session = $request->session_name;
        $session->save();

        Toastr::success('Session Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);


        return back();
    }

    public function delete($id){
        Gate::authorize('app.session.delete');
        $sec = SessionYear::find($id);
        $sec->delete();

        Toastr::success('Session Delete Successfully', 'Success', ["positionClass" => "toast-top-right"]);


        return response()->json([
            'status'=>200
        ]);
    }
}
