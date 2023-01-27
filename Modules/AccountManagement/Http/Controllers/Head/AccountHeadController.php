<?php

namespace Modules\AccountManagement\Http\Controllers\Head;

use App\Models\MainHead;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AccountHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function list()
    {
        return view('accountmanagement::Accounting.AccountHead.list');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function add($id)
    {
        $head = MainHead::find($id);

        return view('accountmanagement::Accounting.AccountHead.add',[
            'head'=>$head
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $table_name = strtolower(str_replace(' ', '', $request->main_head));

        if ($request->isActive == 1){
            $fund = DB::table($table_name)->insert([
                'main_head_id'=>$request->head_id,
                'main_head'=>$request->main_head,
                'head_name'=>$request->head,
                'details'=>$request->details,
                'status'=>$request->isActive,
            ]);

            $sub_head_id = DB::getPdo()->lastInsertId();
            $code = $request->head_id.".".$sub_head_id;


            DB::table($table_name)->where('id', $sub_head_id)->update([
                "code"  => $code,
            ]);

        }else{
            $fund = DB::table($table_name)->insert([
                'main_head_id'=>$request->head_id,
                'main_head'=>$request->main_head,
                'head_name'=>$request->head,
                'details'=>$request->details,
                'status'=>0,
            ]);

            $sub_head_id = DB::getPdo()->lastInsertId();
            $code = $request->head_id.".".$sub_head_id;


            DB::table($table_name)->where('id', $sub_head_id)->update([
               "code"  => $code,
            ]);

        }





        Toastr::success($request->main_head.' sub head added successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.accountmanagement.head.list');





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
    public function edit($id,$table)
    {
        $edit = DB::table($table)->find($id);
        $table_name = $table;
        return view('accountmanagement::Accounting.AccountHead.edit', compact('edit','table_name'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {

        DB::table($request->table_name)->where('id',$request->sub_head_id)->update([
            "head_name" => $request->sub_head,
            "details"     => $request->details,
            "status"      => $request->isActive,
        ]);

        Toastr::success('sub head updated successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.accountmanagement.head.list');
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
}
