<?php

namespace App\Http\Controllers\Backend;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    public function index(){
        Gate::authorize('app.web.index');
        return view('Backend.Admin.FrontEnd.Event.event');
    }

    public function save(Request $request){
        $request->validate([
           'title'=>'required',
           'event_details'=>'required',
           'event_date'=>'required',
           'image'=>'required',
        ]);

        $image = $request->file('image');
        $directory = 'assets/backend/img/event/';
        $imageUrl = file_upload($image,$directory);

        $event = new Event();

        $event->title = $request->title;
        $event->details = $request->event_details;
        $event->event_date = $request->event_date;
        $event->image = $imageUrl;

        $event->save();
        Toastr::success('New Event Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();

    }

    public function inactive($id){
        Gate::authorize('app.web.update');
        $e = Event::find($id);
        $e->status = 0;
        $e->save();

        Toastr::error('Event Inactive Successfully', 'Inactive', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function active($id){
        Gate::authorize('app.web.update');
        $e = Event::find($id);
        $e->status = 1;
        $e->save();

        Toastr::success('Event Active Successfully', 'Active', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function update(Request $request){
        Gate::authorize('app.web.update');
        $event = Event::find($request->id);
        $image = $request->file('image');
        $directory = 'assets/backend/img/event/';


        if ($image){
            if ($event->image){
                unlink($event->image);
            }
            $imageUrl = file_upload($image,$directory);
            $event->title = $request->title;
            $event->details = $request->event_details;
            $event->event_date = $request->event_date;
            $event->image = $imageUrl;
            $event->save();

        }else{
            $event->title = $request->title;
            $event->details = $request->event_details;
            $event->event_date = $request->event_date;
//            $event->image = $imageUrl;
            $event->save();
        }
        Toastr::success('Event Updated Successfully', 'Update', ["positionClass" => "toast-top-right"]);
        return back();

    }

    public function delete($id){
        Gate::authorize('app.web.delete');
        $event = Event::find($id);
        if($event->iamge){
            unlink($event->image);
        }
        $event->delete();
        Toastr::error('Event Deleted ', 'Delete', ["positionClass" => "toast-top-right"]);
        return response()->json([
           'status'=>200
        ]);

    }
}
