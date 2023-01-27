<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpancesiveListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expancesive_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('user_name')->nullable();
            $table->foreignId('expance_type')->nullable();
            $table->double('salary',10,2)->nullable();
            $table->double('adv_salary',10,2)->nullable();
            $table->double('due_salary',10,2)->nullable();
            $table->double('pay',10,2)->nullable();
            $table->double('adv_pay',10,2)->nullable();
            $table->double('due_pay',10,2)->nullable();
            $table->string('session_year')->nullable();
            $table->string('month')->nullable();
            $table->date('date')->nullable();
            $table->mediumText('discription')->nullable();
            $table->enum('pay_status',['paid','unpaid'])->default('unpaid');
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
        Schema::dropIfExists('expancesive_lists');
    }
}
