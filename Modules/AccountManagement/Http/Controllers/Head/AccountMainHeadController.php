<?php

namespace Modules\AccountManagement\Http\Controllers\Head;

use App\Models\MainHead;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Schema;

class AccountMainHeadController extends Controller
{


    public function add()
    {
        return view('accountmanagement::Accounting.MainHead.add');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */

    
    public function store(Request $request)
    {


        

       
        // VALIDATION MAIN HEAD

        $data = $request->validate([
            "main_head" => "required",
            "head_type"  => "required",
            "status" => "required",
        ]);


        $type = round(10);



        // STORE MAIN HEAD STORE
        $table_name = strtolower(str_replace(' ', '', $request->main_head));
//        return $table_name;

        if (Schema::hasTable($table_name)) {
            Toastr::warning('This Account Head Already Exists', 'Warning', ["positionClass" => "toast-top-right"]);
            return back();
        }

       

        $main_head = new MainHead();
        $main_head->main_head = $request->main_head;
        $main_head->code = $request->head_type;
        $main_head->type = $type;
        $main_head->status = $request->status;
        $main_head->save();

        Schema::create($table_name, function ($table){
            $table->id();
            $table->integer('main_head_id')->nullable();
            $table->string('main_head')->nullable();
            $table->string('code')->nullable();
            $table->string('head_name')->nullable();
            $table->string('applicable')->nullable();
            $table->text('details')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });


        Toastr::success('Main head add successfully', 'Success', ["positionClass" => "toast-top-right"]);
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
    public function update(Request $request, $id)
    {
        //
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
