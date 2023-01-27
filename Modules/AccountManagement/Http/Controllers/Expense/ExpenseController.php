<?php

namespace Modules\AccountManagement\Http\Controllers\Expense;

use App\Models\Deposit;
use App\Models\Expense;
use App\Models\ExpensePartculer;
use App\Models\Fund;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
Use Alert;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function add()
    {
        return view('accountmanagement::Accounting.Expense.add');
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



    public function getAllTeacher(Request $request)
    {

        $all_teachers = DB::table('teachers_info')->get();

        $output =   '<option selected>Select</option>';
        foreach ($all_teachers as $teacher) {
            echo $output = '<option value="'.$teacher->id.'">'.$teacher->fullname.'</option>';
        }
    }

    public function store(Request $request)
    {


        $funds = Fund::find($request->fund_id);
        if ($funds->account_balance >= $request->total_amount){
            $funds->account_balance = $funds->account_balance - $request->total_amount;
            $funds->save();
        }else{
            Toastr::warning('Insufficient Balance', 'Warning', ["positionClass" => "toast-top-right"]);
            return back();
        }



        if ($request->file('attach')){
            $file = $request->file('attach');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = time()."-expense-".".".$file_ext;
            $db_url = "assets/account/";
            $db = $db_url.$file_name;
            $file->move($db_url,$file_name);

            $expense = Expense::create([
                "date_of_expense" => $request->date_of_expense,
                "main_head_id" => $request->main_head_id,
                "sub_head_id" => $request->sub_head_id,
                "receiver" => $request->receiver,
                "voucher_no" => $request->voucher_no ? $request->voucher_no : $request->sub_head_id.uniqid(),
                "total_amount" => $request->total_amount,
                "fund_id" => $request->fund_id,
                "payment_note" => $request->payment_note,
                "attach" => $db,
                "created_at"   => $request->date_of_expense,
            ]);

            // Get the last order id
            $lastorderId = Expense::find($expense->id);

            // Get last 3 digits of last order id
            $lastIncreament = substr($lastorderId->id, -5);

            // Make a new order id with appending last increment + 1
            $newOrderId = 'Txre_' . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);

            $expense->trx_id = $newOrderId;
            $expense->save();


            if($expense){

                for ($a = 0; $a < count($request->particuler_name); $a++) {
                    if ($request->particuler_name[$a] && $request->ammout[$a]) {
                        $particular =  new ExpensePartculer();
                        $particular->expense_id = $expense->id;
                        $particular->particuler_name = $request->particuler_name[$a];
                        $particular->ammout = $request->ammout[$a];
                        $particular->save();
                    }
                }

            }

        }else{
            $expense = Expense::create([
                "date_of_expense" => $request->date_of_expense,
                "main_head_id" => $request->main_head_id,
                "sub_head_id" => $request->sub_head_id,
                "receiver" => $request->receiver,
                "voucher_no" => $request->voucher_no ? $request->voucher_no : $request->sub_head_id.uniqid(),
                "fund_id" => $request->fund_id,
                "total_amount" => $request->total_amount,
                "payment_note" => $request->payment_note,
                "created_at"   => $request->date_of_expense,
            ]);

            // Get the last order id
            $lastorderId = Expense::find($expense->id);

            // Get last 3 digits of last order id
            $lastIncreament = substr($lastorderId->id, -1);

            // Make a new order id with appending last increment + 1
            $newOrderId = 'Txre_' . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);

            $expense->trx_id = $newOrderId;
            $expense->save();

            if($expense){

                for ($a = 0; $a < count($request->particuler_name); $a++) {
                    if ($request->particuler_name[$a] && $request->ammout[$a]) {
                        $particular =  new ExpensePartculer();
                        $particular->expense_id = $expense->id;
                        $particular->particuler_name = $request->particuler_name[$a];
                        $particular->ammout = $request->ammout[$a];
                        $particular->save();
                    }
                }

            }
        }


//        Toastr::success('Expense successfully', 'Success', ["positionClass" => "toast-top-right"]);

        Alert::success('Your Transiction Id. '.$expense->trx_id, 'Success Message');
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
