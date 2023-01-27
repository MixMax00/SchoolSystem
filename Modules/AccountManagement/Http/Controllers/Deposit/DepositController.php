<?php

namespace Modules\AccountManagement\Http\Controllers\Deposit;

use App\Models\Deposit;
use App\Models\Fund;
use App\Models\MainHead;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
Use Alert;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function add()
    {
        return view('accountmanagement::Accounting.Deposit.add');
    }


    public  function getSubHead(Request $request)
    {

       $main_heads = MainHead::find($request->main_head_id);
       $table_name = str_replace(' ', '', $main_heads->main_head);
       $sub_heads = DB::table($table_name)->where('main_head_id',$main_heads->id)->get();

        $output =   '<option selected>Select</option>';
        foreach ($sub_heads as $sub_head) {
            echo $output = '<option value="'.$sub_head->id.'">'.$sub_head->head_name.'</option>';
        }


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
        //return $request->date_of_deposit;
        $request->validate([
            "date_of_deposit" => "required",
            "giver_name" => "required",
            "particular" => "required",
            "amount" => "required",
            "fund_id" => "required",
        ]);




        if ($request->file('attach_file')){
            $file = $request->file('attach_file');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = time()."-deposit-".".".$file_ext;
            $db_url = "assets/account/";
            $db = $db_url.$file_name;
            $file->move($db_url,$file_name);

            $deposit = Deposit::create([
                "date_of_deposit" => $request->date_of_deposit,
                "main_id" => $request->main_id,
                "sub_head_id" => $request->sub_head_id,
                "giver_name" => $request->giver_name,
                "voucher_no" => $request->voucher_no ? $request->voucher_no : $request->sub_head_id.uniqid(),
                "particular" => $request->particular,
                "amount" => $request->amount,
                "fund_id" => $request->fund_id,
                "payment_note" => $request->payment_note,
                "attach" => $db,
                "created_at"   => $request->date_of_deposit,
            ]);

            $lastorderId = Deposit::find($deposit->id);

            // Get last 3 digits of last order id
            $lastIncreament = substr($lastorderId->id, -5);

            // Make a new order id with appending last increment + 1
            $newOrderId = 'Txrd_' . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);

            $deposit->trx_id = $newOrderId;
            $deposit->save();



            $funds = Fund::find($deposit->fund_id);
            $funds->account_balance = $funds->account_balance + $deposit->amount;
            $funds->save();
        }else{
           $deposit = Deposit::create([
                "date_of_deposit" => $request->date_of_deposit,
                "main_id" => $request->main_id,
                "sub_head_id" => $request->sub_head_id,
                "giver_name" => $request->giver_name,
                "voucher_no" => $request->voucher_no ? $request->voucher_no : $request->sub_head_id.uniqid(),
                "particular" => $request->particular,
                "amount" => $request->amount,
                "fund_id" => $request->fund_id,
                "payment_note" => $request->payment_note,
                "created_at"   => $request->date_of_deposit,
            ]);

            // Get the last order id
            $lastorderId = Deposit::find($deposit->id);

            // Get last 3 digits of last order id
            $lastIncreament = substr($lastorderId->id, -5);

            // Make a new order id with appending last increment + 1
            $newOrderId = 'Txrd_' . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);

            $deposit->trx_id = $newOrderId;
            $deposit->save();


          $funds = Fund::find($deposit->fund_id);
          $funds->account_balance = $funds->account_balance + $deposit->amount;
          $funds->save();

        }


        Alert::success('Your Transiction Id. '.$deposit->trx_id, 'Success Message');
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
