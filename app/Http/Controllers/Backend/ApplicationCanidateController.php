<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\OnlineAdmission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ApplicationCanidateController extends Controller
{
    public function index()
    {
        Gate::authorize('app.application.index');
    	$application_canidates = OnlineAdmission::with('trades','courses','divisions','districts','thanas','unions','per_divisions','per_districts','per_thanas','per_unions')->orderBy('id','desc')->get();
    	return view('Backend.Admin.Application.application', compact('application_canidates'));
    }
}
