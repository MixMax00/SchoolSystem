<?php

namespace App\Http\Controllers\Backend;

use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class BookCategoryController extends Controller
{
    public function index()
    {
        Gate::authorize('app.library.index');
        return view('Backend.Admin.LibraryBook.category');
    }

    public function store(Request $request)
    {
        Gate::authorize('app.library.create');
        $request->validate([
            "category_name" => "required",
        ]);

        BookCategory::create([
            "category_name"   => $request->category_name,
            "description"     => $request->description,
        ]);

        Toastr::success('Book Category Added', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function status($id)
    {
        Gate::authorize('app.library.update');
        $libraryBookCat = BookCategory::find($id);
        if($libraryBookCat->status == "1"){
            BookCategory::where('id',$libraryBookCat->id)->update([
                "status"  => 0,
            ]);
            Toastr::success('Book Inactive Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            BookCategory::where('id',$libraryBookCat->id)->update([
                "status"  => 1,
            ]);
            Toastr::success('Book Active Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function delete($id){
        Gate::authorize('app.library.delete');
        $libraryBookCat = BookCategory::find($id);
        $libraryBookCat->delete();

        Toastr::error('Book Delete Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return response()->json([
            'status'=>200
        ]);
    }
}
