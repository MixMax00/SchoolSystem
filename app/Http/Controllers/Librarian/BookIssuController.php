<?php

namespace App\Http\Controllers\Librarian;

use App\Models\IssuBook;
use App\Models\LibraryBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;

class BookIssuController extends Controller
{
    public function index()
    {
        Gate::authorize('app.library.index');
        return view('Librarian.BookIssue.index');
    }

    public function store(Request $request)
    {
        Gate::authorize('app.library.create');
        $library_book = LibraryBook::find($request->book_name);

        if($library_book->quantity < $request->num_of_copy){
            Toastr::error('Book does not ablable', 'Success', ["positionClass" => "toast-top-right"]);
    	    return back();
        }
        $new_book_copy = ($library_book->quantity)-($request->num_of_copy);

        LibraryBook::where('id',$library_book->id)->update([
            "quantity" => $new_book_copy,
        ]);

        IssuBook::create([
            "book_name"     => $request->book_name,
            "num_of_copy"   => $request->num_of_copy,
            "name"          => $request->name,
            "phone"         => $request->phone,
            "address"       => $request->address,
            "issue_date"    => $request->issue_date,
        ]);

        Toastr::success('Book Issue Successfully', 'Success', ["positionClass" => "toast-top-right"]);
    	return back();
    }

    public function show($id)
    {
        Gate::authorize('app.library.index');
        $detail = IssuBook::find($id);
        return view('Librarian.BookIssue.view', compact('detail'));
    }

    public function return(Request $request)
    {
        Gate::authorize('app.library.update');
        IssuBook::where('id',$request->id)->update([
            "num_of_copy" => $request->num_of_copy,
        ]);

        $libraries = LibraryBook::find($request->book_id);
        $sum = $libraries->quantity + $request->num_of_copy;

        $libraries->quantity = $sum;
        $libraries->save();

        Toastr::success('Book Return Successfully', 'Success', ["positionClass" => "toast-top-right"]);
    	return back();
    }
}
