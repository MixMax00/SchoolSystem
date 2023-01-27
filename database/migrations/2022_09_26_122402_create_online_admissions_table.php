<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_admissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('birth_certificate')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('phone');
            $table->date('date');
            $table->string('nationality');
            $table->string('father_name');
            $table->string('father_phone')->nullable();
            $table->string('father_nid')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('mother_nid')->nullable();
            $table->string('local_guardian_name')->nullable();
            $table->string('local_guardian_email')->nullable();
            $table->string('local_guardian_phone')->nullable();
            $table->string('local_guardian_nid')->nullable();
            $table->string('division');
            $table->string('thana');
            $table->string('village');
            $table->string('district');
            $table->string('union');
            $table->string('per_division')->nullable();
            $table->string('per_thana')->nullable();
            $table->string('per_village')->nullable();
            $table->string('per_district')->nullable();
            $table->string('per_union')->nullable();
            $table->string('ssc_roll');
            $table->string('ssc_gpa');
            $table->string('ssc_depertment');
            $table->string('ssc_registation');
            $table->string('ssc_borad');
            $table->string('trade_id');
            $table->string('image');
            $table->string('course_id');
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
        Schema::dropIfExists('online_admissions');
    }
}
