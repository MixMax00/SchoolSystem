<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_expense');
            $table->foreignId('main_head_id')->nullable();
            $table->string('sub_head_id')->nullable();
            $table->string('receiver',255);
            $table->string('voucher_no','255')->nullable();
            $table->string('trx_id')->nullable();
            $table->double('total_amount',10,2);
            $table->foreignId('fund_id');
            $table->text('payment_note')->nullable();
            $table->string('attach',255)->nullable();
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
        Schema::dropIfExists('expenses');
    }
}
