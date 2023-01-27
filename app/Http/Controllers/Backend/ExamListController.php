<?php

namespace App\Http\Controllers\Backend;

use App\Models\ExamList;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class ExamListController extends Controller
{
    public function index()
    {
        Gate::authorize('app.exam.index');
        return view('Backend.Admin.ExamList.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            "exam_name"   => "required",
            "date"        => "required",
            "description" => "required",
        ]);

        ExamList::create([
            "exam_name"    => $request->exam_name,
            "date"         => $request->date,
            "description"  => $request->description,
            "status"       => $request->status,
            "created_at"   => Carbon::now(),
        ]);

        Toastr::success('Exam Insert Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function update(Request $request)
    {
        Gate::authorize('app.exam.update');
        ExamList::where('id',$request->id)->update([
            "exam_name"    => $request->exam_name,
            "date"         => $request->date,
            "description"  => $request->description,
            "status"       => $request->status,
            "updated_at"   => Carbon::now(),
        ]);

        Toastr::success('Exam update Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function delete($id)
    {
        Gate::authorize('app.exam.delete');
        $ex_list = ExamList::find($id);

        $ex_list->delete();


        return response()->json([
            "status" => 200,
        ]);
    }


}
