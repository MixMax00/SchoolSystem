<?php

namespace Modules\AccountManagement\Http\Controllers;

use App\Models\Member;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $member = Member::all();

        return view('accountmanagement::Accounting.Memeber.member',[
            'members'=>$member
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('accountmanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
//        return $request;

        $member = new Member();
        $member->name = $request->name;
        $member->institute_name = $request->institute_name;
        $member->cell = $request->cell_number;
        $member->address = $request->address;
        $member->member_type = $request->member_type;
        $member->applicable = $request->applicable;
        $member->status = $request->status;
        $member->save();

        Toastr::success('New User Added', 'Success', ["positionClass" => "toast-top-right"]);

        return back();

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('accountmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('accountmanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
//        return $request;
        $member = Member::find($request->id);
        $member->name = $request->name;
        $member->cell = $request->cell_number;
        $member->member_type = $request->member_type;
        $member->status = $request->status;
        $member->save();


        Toastr::success('User Update Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return  back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function inactive($id){
        $member = Member::find($id);
        $member->status = 0;
        $member->save();

        Toastr::success('User Inactive Successfully', 'Success', ["positionClass" => "toast-top-right"]);


        return back();

    }
    public function active($id){
        $member = Member::find($id);
        $member->status = 1;
        $member->save();

        Toastr::success('User Active Successfully', 'Success', ["positionClass" => "toast-top-right"]);


        return back();

    }
}
