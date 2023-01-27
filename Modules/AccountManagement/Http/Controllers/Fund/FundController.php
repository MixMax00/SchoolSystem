<?php

namespace Modules\AccountManagement\Http\Controllers\Fund;

use App\Models\CreditFund;
use App\Models\DebitFund;
use App\Models\Fund;
use App\Models\FundTransfer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function list()
    {
        $funds = Fund::all();
        return view('accountmanagement::Accounting.Fund.list',[
            'funds'=>$funds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('accountmanagement::Accounting.Fund.funds_add');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
//        return $request;
        $fund = new Fund();
        $fund->account_name = $request->account_name;
        $fund->description = $request->description;
        $fund->account_balance = $request->account_balance;
        if ($request->isDefault) {
            Fund::query()->update(['isDefault'=> 0]);
            $fund->isDefault = $request->isDefault;
        }
        else{
            $fund->isDefault = 0;

        }

        $fund->save();

        $f = Fund::find($fund->id);
        $f->fund_id = 'fnd-'.$f->id;
        $f->save();

        Toastr::success('Fund Added Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return  redirect()->route('admin.accountmanagement.fund.list');

    }

    public function details($id)
    {
//return $id;
            $balance = Fund::find($id);
            $current_balance = $balance->account_balance;

//        $trans = CreditFund::where( 'from_id',$id)->orwhere('to_id',$id)->orderBy('created_at','DESC')->get();
        $funds = CreditFund::with('fundTo','fundFrom')->where( function ($query) use ($id){
            $query->where('from_id',$id)->where('dr',0);
        })->orwhere(function ($query)use ($id){
            $query->where('to_id',$id)->where('cr',0);
        })->orderBy('created_at','DESC')->get();
//        return  $trans;

        return view('accountmanagement::Accounting.Fund.details', compact('funds','current_balance'));
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

    public function isDefault($id){
//        $fund = Fund::query();
    }

    public function default_not($id){
        Fund::query()->update(['isDefault'=>0]);
        $fund = Fund::find($id);
        $fund -> isDefault = 1;
        $fund->save();
        Toastr::success('Fund set as default successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return back();

    }

    public function transfer(Request $request){
//        return $request;

        $fund = Fund::find($request->transfer_from);
//        return $fund;
        if ($fund->account_balance < $request->transfer_amount){
            Toastr::warning('insufficient Balance', 'Warning', ["positionClass" => "toast-top-right"]);

            return back();
        }

        $fund->account_balance =  $fund->account_balance - $request->transfer_amount;
        $fund->save();



        $fund2 = Fund::find($request->transfer_to);
        $fund2->account_balance =  $fund2->account_balance+$request->transfer_amount;
        $fund2->save();
            $t=0;
        $trx = CreditFund::orderBy('id','desc')->first();
        if ($trx == null){
            $trx_id = 'Trx-'.str_pad($t+1,5,0,STR_PAD_LEFT);
        }else{
            $trx_id = 'Trx-'.str_pad($trx->id+1,5,0,STR_PAD_LEFT);

        }

//        $transfer = new DebitFund();
//        $transfer -> from_id = $request->transfer_from;
//        $transfer -> to_id = $request->transfer_to;
//        $transfer -> dr = $request->transfer_amount;
//        $transfer -> cr = 0.00;
//        $transfer -> balance = $request->transfer_amount;
//        $transfer -> trx_id = $trx_id;
//        $transfer->save();



        $credit = new CreditFund();
        $credit -> from_id = $request->transfer_from;
        $credit -> to_id = $request->transfer_to;
        $credit -> cr = $request->transfer_amount;

        $credit -> dr = 0.00;
        $credit -> balance = $fund->account_balance;
        $credit -> trx_id = $trx_id;

        $credit->save();

        $credit2 = new CreditFund();
        $credit2 -> from_id = $request->transfer_from;
        $credit2 -> to_id = $request->transfer_to;
        $credit2 -> cr = 0.00;

        $credit2 -> dr = $request->transfer_amount;
        $credit2 -> balance =  $fund2->account_balance;
        $credit2 -> trx_id = $trx_id;
        $credit2->save();




        Toastr::success('Fund Transfer Successfully', 'Success', ["positionClass" => "toast-top-right"]);

        return back();

    }


}
