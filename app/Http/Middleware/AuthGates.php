<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Librarian;
use App\Models\Accountant;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('web')->user();
        if($user){
            $permissions = Permission::all();
            foreach($permissions as $key =>$permission){
                Gate::define($permission->slug, function(User $user) use  ($permission){
                    return $user->hasPermission($permission->slug);
                });
            }
        }

        $librarian = Auth::guard('librarian')->user();

        if($librarian){
            $permissions = Permission::all();
            foreach($permissions as $key =>$permission){
                Gate::define($permission->slug, function(Librarian $librarian) use  ($permission){
                    return $librarian->hasPermission($permission->slug);
                });
            }
        }

        $teacher = Auth::guard('teacher')->user();

        if($teacher){
            $permissions = Permission::all();
            foreach($permissions as $key =>$permission){
                Gate::define($permission->slug, function(Teacher $teacher) use  ($permission){
                    return $teacher->hasPermission($permission->slug);
                });
            }
        }

        $accountant = Auth::guard('accountant')->user();

        if($accountant){
            $permissions = Permission::all();
            foreach($permissions as $key =>$permission){
                Gate::define($permission->slug, function(Accountant $accountant) use  ($permission){
                    return $accountant->hasPermission($permission->slug);
                });
            }
        }

        $student = Auth::guard('student')->user();

        if($student){
            $permissions = Permission::all();
            foreach($permissions as $key =>$permission){
                Gate::define($permission->slug, function(Student $student) use  ($permission){
                    return $student->hasPermission($permission->slug);
                });
            }
        }


        return $next($request);
    }
}
