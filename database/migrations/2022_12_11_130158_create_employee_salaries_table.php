<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->double('salary',10,2)->nullable();
            $table->double('adv_salary',10,2)->nullable();
            $table->double('due_salary',10,2)->nullable();
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
        Schema::dropIfExists('employee_salaries');
    }
}
