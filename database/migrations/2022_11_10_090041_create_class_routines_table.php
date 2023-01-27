<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_routines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_name');
            $table->foreignId('section');
            $table->foreignId('subject');
            $table->string('teacher');
            $table->string('day');
            $table->string('starting_hour');
            $table->string('starting_minute');
            $table->string('starting');
            $table->string('ending_hour');
            $table->string('ending_minute');
            $table->string('ending');
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
        Schema::dropIfExists('class_routines');
    }
}
