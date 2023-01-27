<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use App\Models\Librarian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class LibrarianController extends Controller
{
    public function index()
    {
        Gate::authorize('app.librarian.index');
        return view('Backend.Admin.Librarian.index');
    }

    public function store(Request $request)
    {
        Gate::authorize('app.librarian.create');
        $request->validate([
            "name"     => "required|string",
            "email"    => "required|string|unique:users",
            "password" => "required|string|confirmed",
        ]);

        $role = Role::where('slug','teacher')->first();

        Librarian::create([
            "name"    => $request->name,
            "email"   => $request->email,
            "salary"  => $request->salary,
            "role_id" => $role->id,
            "password"=> Hash::make($request->password),
        ]);

        Toastr::success('Librarian Add Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function status($id)
    {
        Gate::authorize('app.librarian.update');
        $librarian = User::find($id);
        if($librarian->status == "1"){
            Librarian::where('id',$librarian->id)->update([
                "status"  => 0,
            ]);
            Toastr::success('Librarian Inactive Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            Librarian::where('id',$librarian->id)->update([
                "status"  => 1,
            ]);
            Toastr::success('Librarian Active Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function delete($id){
        Gate::authorize('app.librarian.delete');
        $librarian = Librarian::find($id);
        $librarian->delete();

        Toastr::error('Librarian Delete Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return response()->json([
            'status'=>200
        ]);
    }
}
