<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class BackendController extends Controller
{
    public function dashboard(){
        Gate::authorize('app.dashboard');
        return view('Backend.Admin.Dashboard.Dashboard');
    }
}
