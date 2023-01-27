<?php

namespace Database\Seeders;

use App\Models\Fund;
use Illuminate\Database\Seeder;

class FundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fund = new Fund();
        $fund->account_name = "Cash";
        $fund->description = "Cash fund.";
        $fund->account_balance = 0;
        $fund->isDefault = 1;
        $fund->save();

        $f = Fund::find($fund->id);
        $f->fund_id = 'fnd-'.$f->id;
        $f->save();
    }
}
