<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Event;
use App\Models\Notice;
use App\Models\Teacher;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index(){
        return view('Frontend.Home.home');
    }
    // public function onlineAdmission(){
    //     return view('FrontEnd.Admission.admission');
    // }
    public function about(){
        return view('Frontend.About.about');
    }
    public function contact(){
        return view('FrontEnd.Contact.contact');
    }
    public function event(){
        return view('Frontend.Event.event');
    }

    public function eventDetail($id)
    {
        $event_details = Event::find($id);

       // return $event_details;
        return view('Frontend.Event.details',compact('event_details'));
    }

    public function teacher()
    {
        return view('Frontend.Teacher.teacher');
    }

    public function teacher_details($id,$name){
        $teacher_detail = Teacher::find($id);
        return view('Frontend.Teacher.details', compact('teacher_detail'));
    }


    public function gallery()
    {
        return view('Frontend.Gallery.gallery');
    }

    public function gallery_details($id)
    {
        $details_imgs = GalleryImage::where('gallery_id',$id)->get();
        return view('Frontend.Gallery.details', compact('details_imgs'));
    }

    public function notice(){
        return view('Frontend.Notice.notice');
    }
     public function download($id){
        $d = Notice::find($id);
//        $path = storage_path($d->notice);
        return response()->download($d->notice);

    }

}
