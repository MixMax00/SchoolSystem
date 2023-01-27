<?php

namespace Modules\AccountManagement\Http\Controllers\Cashbook;

use App\Models\Deposit;
use App\Models\Expense;
use App\Models\Fund;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CashbookController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function list(Request $request)
    {
        if ($request->date){

            $toDay = $request->date;
            $date =  Carbon::parse($request->date)->format('Y-m-d');

            $fund = Fund::where('isDefault', 1)->first();

            $date = isset($request->date) ? $request->date : date('Y-m-d');
            $prev_date = date('Y-m-d', strtotime($date .' -1 day'));

            // $prev = $date->yesterday();
            // $prev_date = $prev->format('Y-m-d');

            // return $prev_date;


            $deposit_lists =  Deposit::where('date_of_deposit', $date)->get();
            $expense_lists =  Expense::where('date_of_expense', $date)->get();
            $prev_total_amount =  Deposit::where('date_of_deposit', $prev_date)->sum('amount');


            $total_amount =  Expense::where('date_of_expense', $date)->sum('total_amount');

            return view('accountmanagement::Accounting.Cashbook.list',[
                'deposit_lists' => $deposit_lists,
                'fund'     =>  $fund,
                'expense_lists' => $expense_lists,
                'total_amount'  => $total_amount,
                'prev_total_amount' => $prev_total_amount,
                'toDay'   => $toDay,
                'prev_date' => $prev_date,

            ]);
        }else{
            $curren_date = Carbon::now();
            $date = $curren_date->format('Y-m-d');

            // return $date;

            $toDay = Carbon::now()->format('Y-m-d');

            $prev = Carbon::yesterday();
            $prev_date = $prev->format('Y-m-d');

            $fund = Fund::where('isDefault', 1)->first();

            $deposit_lists =  Deposit::where('date_of_deposit', $date)->get();
            $expense_lists =  Expense::where('date_of_expense', $date)->get();
            $total_amount =  Expense::where('date_of_expense', $date)->sum('total_amount');
            $prev_total_amount =  Deposit::where('date_of_deposit', $prev_date)->sum('amount');

            return view('accountmanagement::Accounting.Cashbook.list',[
                'deposit_lists' => $deposit_lists,
                'fund'     =>  $fund,
                'expense_lists' => $expense_lists,
                'total_amount'  => $total_amount,
                'prev_total_amount' => $prev_total_amount,
                'toDay'   => $toDay,
                'prev_date' => $prev_date,
            ]);
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
        //
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
