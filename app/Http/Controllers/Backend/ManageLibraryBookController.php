<?php

namespace App\Http\Controllers\Backend;

use App\Models\LibraryBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class ManageLibraryBookController extends Controller
{
    public function index()
    {
        Gate::authorize('app.library.index');
        return view("Backend.Admin.LibraryBook.index");
    }

    public function store(Request $request)
    {
        Gate::authorize('app.library.create');
        $request->validate([
            "book_category" => "required",
            "book_name"     => "required",
            "author"        => "required",
            "price"         => "required",
            "quantity"      => "required",
        ]);

        LibraryBook::create([
            "self_no"           => $request->self_no,
            "book_category"      => $request->book_category,
            "book_name"          => $request->book_name,
            "author"             => $request->author,
            "description"        => $request->description,
            "price"              => $request->price,
            "quantity"           => $request->quantity,
        ]);

        Toastr::success('Book Added', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function update(Request $request)
    {
        Gate::authorize('app.library.update');
        LibraryBook::where('id',$request->id)->update([
            "self_no"             => $request->self_no,
            "book_category"      => $request->book_category,
            "book_name"          => $request->book_name,
            "author"             => $request->author,
            "description"        => $request->description,
            "price"              => $request->price,
            "quantity"           => $request->quantity,
        ]);

        Toastr::success('Book Updated', 'Success', ["positionClass" => "toast-top-right"]);

        return back();
    }

    public function status($id)
    {
        Gate::authorize('app.library.update');
        $libraryBook = LibraryBook::find($id);
        if($libraryBook->status == "1"){
            LibraryBook::where('id',$libraryBook->id)->update([
                "status"  => 0,
            ]);
            Toastr::success('Book Inactive Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }else{
            LibraryBook::where('id',$libraryBook->id)->update([
                "status"  => 1,
            ]);
            Toastr::success('Book Active Successfully', 'Success', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public function delete($id){
        Gate::authorize('app.library.delete');
        $libraryBook = LibraryBook::find($id);
        $libraryBook->delete();

        Toastr::error('Book Delete Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return response()->json([
            'status'=>200
        ]);
    }
}
