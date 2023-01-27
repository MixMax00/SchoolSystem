<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issu_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_name');
            $table->string('name');
            $table->string('phone');
            $table->mediumText('address');
            $table->integer('num_of_copy');
            $table->date('issue_date');
            $table->date('return_date')->nullable();
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
        Schema::dropIfExists('issu_books');
    }
}
