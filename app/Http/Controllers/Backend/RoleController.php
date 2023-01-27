<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        Gate::authorize('app.roles.index');
        return view('Backend.Admin.Role.index');
    }

    public function create()
    {
        Gate::authorize('app.roles.create');
        $modules = Module::all();
        return view('Backend.Admin.Role.create',compact('modules'));
    }

    public function store(Request $request)
    {
     //return $request->all();
        Gate::authorize('app.roles.create');

       $this->validate($request,[
            "name"          => "required|unique:roles",
            // "permissions"    => "required|array",
            // "permissions.*"  => "integer",
       ]);

       Role::create([
        "name"  => $request->name,
        "slug"  => Str::slug($request->name),
       ])->permission()->sync($request->input('permission'));


       Toastr::success('Role create Successfully!!', 'Title', ["positionClass" => "toast-top-right"]);
       return redirect()->route('role.view');
    }

    public function edit($id)
    {
        Gate::authorize('app.roles.update');
        $edit = Role::find($id);
        $modules = Module::all();
        return view("Backend.Admin.Role.edit",compact('edit','modules'));
    }

    public function update(Request $request)
    {
       Gate::authorize('app.roles.update');
       $role = Role::find($request->id);
       $role->update([
            "name"  => $request->name,
            "slug"  => Str::slug($request->name),
       ]);
        $role->permission()->sync($request->input('permission'));
        return redirect()->route('role.view');
    }

    public function delete($id)
    {
       $role = Role::find($id);
       if($role->deletable){
        $role->delete();
       }

       Toastr::success('Role Delete Successfully!!', 'Title', ["positionClass" => "toast-top-right"]);

       return response([
          "status" => 200,
          "message" => "Role Delete"
       ]);

    }
}
