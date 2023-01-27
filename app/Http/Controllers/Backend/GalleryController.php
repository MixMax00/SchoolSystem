<?php

namespace App\Http\Controllers\Backend;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class GalleryController extends Controller
{
    public function index(){
        Gate::authorize('app.web.index');
        return view('Backend.Admin.FrontEnd.Gallery.gallery');
    }

    public function save(Request $request){
        Gate::authorize('app.web.create');
        $g = new Gallery();
        $g->title = $request->title;
        $image = $request->file('title_image');
        $directory = 'assets/backend/img/gallery/';
        $imageUrl = image_upload($image,$directory,586 ,586);
        $g->title_image = $imageUrl;
        $g->save();
        $gs = $request->file('gallery_image');
        $count = 0;
        foreach ($gs as $gi){
            $imageUrl1 = image_upload($gi,$directory,586 ,586);
            $gallerys = new GalleryImage();
            $gallerys->gallery_id = $g->id;
            $gallerys->gallery_image = $imageUrl1;
            $gallerys->save();
            $count ++;

        }

        $gall = Gallery::find($g->id);
        $gall->total_image = $count;
        $gall->save();
        Toastr::success('Gallery Image Added', 'Success', ["positionClass" => "toast-top-right"]);

        return back();

    }

    public function active($id){
        Gate::authorize('app.web.update');
        $g = Gallery::find($id);
        $g->status = 1;
        $g->save();
        Toastr::success('Gallery Image Active', 'Active', ["positionClass" => "toast-top-right"]);
        return back();
    }

     public function inactive($id){
        Gate::authorize('app.web.update');
         $g = Gallery::find($id);
         $g->status = 0;
         $g->save();
         Toastr::error('Gallery Image Inactive', 'Inactive', ["positionClass" => "toast-top-right"]);
         return back();
    }

     public function update(Request $request){
        Gate::authorize('app.web.update');
        if($request->file('title_image')){
            $g = Gallery::find($request->id);
            $g->title = $request->title;
            $image = $request->file('title_image');
            $directory = 'assets/backend/img/gallery/';
            $imageUrl = image_upload($image,$directory,586 ,586);
            $g->title_image = $imageUrl;
            $g->save();

            Toastr::success('Gallery Image Update', 'Success', ["positionClass" => "toast-top-right"]);

            return back();
        }

        $g = Gallery::find($request->id);
        $g->title = $request->title;
        Toastr::success('Gallery Image Update', 'Success', ["positionClass" => "toast-top-right"]);

        return back();

    }

    public function delete($id){
        Gate::authorize('app.web.delete');
        $g = Gallery::find($id);
        if ($g->title_image){
            unlink($g->title_image);
        }
        $g->delete();
        Toastr::error('Gallery deleted successfully', 'Delete', ["positionClass" => "toast-top-right"]);
        return response()->json([
            'status'=>200
        ]);
    }

    // single image delete

    public function single_delete($id)
    {
        Gate::authorize('app.web.delete');
        $sngle_gallery = GalleryImage::find($id);
            if ($sngle_gallery->gallery_image){
            unlink($sngle_gallery->gallery_image);
        }

        $deletes = $sngle_gallery->delete();

        if($deletes){
            $gallery = Gallery::find($sngle_gallery->gallery_id);
            Gallery::where('id',$sngle_gallery->gallery_id)->update([
                "total_image" => $gallery->total_image - 1,
            ]);

        }
        Toastr::error('One Gallery Image deleted successfully', 'Delete', ["positionClass" => "toast-top-right"]);
        return response()->json([
            'status'=>200
        ]);
    }


    public function add(Request $request)
    {
        Gate::authorize('app.web.create');
        $request->validate([
            "gallery_image" => "required"
        ]);

        $g = Gallery::find($request->id);

        $directory = 'assets/backend/img/gallery/';
        $gs = $request->file('gallery_image');
        $count = 0;
        foreach ($gs as $gi){
            $imageUrl1 = image_upload($gi,$directory,586 ,586);
            $gallerys = new GalleryImage();
            $gallerys->gallery_id = $request->id;
            $gallerys->gallery_image = $imageUrl1;
            $gallerys->save();
            $count ++;

        }
        Gallery::where('id',$g->id)->update([
            "total_image" => $g->total_image + $count,
        ]);

        Toastr::success('Gallery Image Add', 'Success', ["positionClass" => "toast-top-right"]);

        return back();

    }


}
