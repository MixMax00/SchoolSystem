<?php

namespace App\Http\Controllers\Backend;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class NoticeController extends Controller
{
    public function  index(){
        Gate::authorize('app.web.index');
        return view('Backend.Admin.FrontEnd.Notice.notice');
    }
    public function save(Request $request){
        $notice = new Notice();

        $file = $request->file('notice');
        $directory = 'assets/backend/notice/';

        $fileUrl = file_upload($file,$directory);
        $notice->title = $request->title;
        $notice->notice = $fileUrl;
        $notice->save();

        Toastr::success('New Notice Added', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function download($id){
        $d = Notice::find($id);
//        $path = storage_path($d->notice);
        return response()->download($d->notice);

    }

    public function update(Request $request){
        Gate::authorize('app.web.update');
        $notice = Notice::find($request->id);
        $file = $request->file('notice');
        $directory = 'assets/backend/notice/';

        if ($file){
            if ($notice->notice){
                unlink($notice->notice);
            }
            $fileUrl = file_upload($file,$directory);
            $notice->title = $request->title;
            $notice->notice = $fileUrl;
            $notice->save();

        }else{
            $notice->title = $request->title;
            $notice->save();

        }

        Toastr::success('Notice Updated', 'Success', ["positionClass" => "toast-top-right"]);

        return back();

    }

    public function inactive($id){
        Gate::authorize('app.web.update');
        $n = Notice::find($id);
        $n->status = 0;
        $n->save();

        Toastr::error('Notice inactive successfully', 'Inactive', ["positionClass" => "toast-top-right"]);

        return back();


    }
    public function active($id){
        Gate::authorize('app.web.update');
        $n = Notice::find($id);
        $n->status = 1;
        $n->save();

        Toastr::success('Notice active successfully', 'Active', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function delete($id){
        Gate::authorize('app.web.delete');
        $n = Notice::find($id);
        if ($n->notice){
            unlink($n->notice);
        }
        $n->delete();
        Toastr::error('Notice deleted successfully', 'Delete', ["positionClass" => "toast-top-right"]);
        return response()->json([
            'status'=>200
        ]);
    }
}
