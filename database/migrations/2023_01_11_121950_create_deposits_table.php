<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_deposit');
            $table->foreignId('main_id')->nullable();
            $table->string('sub_head_id')->nullable();
            $table->string('giver_name','255');
            $table->string('voucher_no','255')->nullable();
            $table->string('trx_id')->nullable();
            $table->string('particular','255');
            $table->double('amount',10,2);
            $table->foreignId('fund_id');
            $table->text('payment_note')->nullable();
            $table->string('attach')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
}
