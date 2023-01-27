<?php

namespace App\Http\Controllers\Backend;

use App\Models\ExamGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class ExamGradeController extends Controller
{
    public function index()
    {
        Gate::authorize('app.exam.index');
        return view('Backend.Admin.ExamGrade.index');
    }

    public function store(Request $request)
    {
        Gate::authorize('app.exam.create');
        $request->validate([
            "grade_name"       => "required",
            "grade_point"      => "required",
            "mark_from"        => "required",
            "mark_upto"        => "required",
            "grade_point_from" => "required",
            "grade_point_upto" => "required",
        ]);

        ExamGrade::create([
            "grade_name"         => $request->grade_name,
            "grade_point"        => $request->grade_point,
            "mark_from"          => $request->mark_from,
            "mark_upto"          => $request->mark_upto,
            "grade_point_from"   => $request->grade_point_from,
            "grade_point_upto"   => $request->grade_point_upto,
            "description"        => $request->description,
            "status"             => $request->status,
            "created_at"         => Carbon::now(),
        ]);

        Toastr::success('Exam Grade Insert Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function update(Request $request)
    {
        Gate::authorize('app.exam.update');
        ExamGrade::where('id',$request->id)->update([
            "grade_name"         => $request->grade_name,
            "grade_point"        => $request->grade_point,
            "mark_from"          => $request->mark_from,
            "mark_upto"          => $request->mark_upto,
            "grade_point_from"   => $request->grade_point_from,
            "grade_point_upto"   => $request->grade_point_upto,
            "description"        => $request->description,
            "status"             => $request->status,
            "updated_at"         => Carbon::now(),
        ]);

        Toastr::success('Exam grade update Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function delete($id)
    {
        Gate::authorize('app.exam.delete');
        $grade = ExamGrade::find($id);

        $grade->delete();


        return response()->json([
            "status" => 200,
        ]);
    }
}
