<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->nullable();
            $table->string('name',255)->nullable();
            $table->string('school_id',255)->nullable();
            $table->string('designation',255)->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('qualification',255)->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->double('salary',10,2)->nullable();
            $table->string('department')->nullable();
            $table->string('fb')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkden')->nullable();
            $table->string('subject',255)->nullable();
            $table->string('image',255)->nullable();
            $table->enum('status', [1, 0])->default(1);
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
        Schema::dropIfExists('teachers');
    }
}
