<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('school_id')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('course')->nullable();
            $table->string('trade')->nullable();
            $table->string('image')->nullable();
            $table->string('class_roll')->nullable();
            $table->string('class')->nullable();
            $table->string('group')->nullable();
            $table->string('technology')->nullable();
            $table->string('semester')->nullable();
            $table->string('session')->nullable();
            $table->string('student_name_eng')->nullable();
            $table->string('student_name_ban')->nullable();
            $table->string('student_phone_1')->nullable();
            $table->string('student_phone_2')->nullable();
            $table->string('father_name_eng')->nullable();
            $table->string('father_name_ban')->nullable();
            $table->string('father_phone_1')->nullable();
            $table->string('father_phone_2')->nullable();
            $table->string('mother_name_eng')->nullable();
            $table->string('mother_name_ban')->nullable();
            $table->string('mother_phone_1')->nullable();
            $table->string('mother_phone_2')->nullable();
            $table->string('zila')->nullable();
            $table->string('upzila')->nullable();
            $table->string('union')->nullable();
            $table->string('post')->nullable();
            $table->string('ward')->nullable();
            $table->string('village')->nullable();
            $table->string('para')->nullable();
            $table->string('g_zila')->nullable();
            $table->string('g_upzila')->nullable();
            $table->string('g_union')->nullable();
            $table->string('g_post')->nullable();
            $table->string('g_ward')->nullable();
            $table->string('g_village')->nullable();
            $table->string('g_para')->nullable();
            $table->string('loc_name')->nullable();
            $table->string('loc_relation')->nullable();
            $table->string('loc_phone')->nullable();
            $table->string('loc_zila')->nullable();
            $table->string('loc_upzila')->nullable();
            $table->string('loc_union')->nullable();
            $table->string('loc_post')->nullable();
            $table->string('loc_ward')->nullable();
            $table->string('loc_village')->nullable();
            $table->string('loc_para')->nullable();
            $table->tinyInteger('hostel')->default(0);
            $table->float('full_course_fee',10,2)->default(0.0);
            $table->float('semester_fee',10,2)->default(0.0);
            $table->float('internship_fee',10,2)->default(0.0);
            $table->text('agreement')->nullable();
            $table->text('doc1')->nullable();
            $table->text('doc2')->nullable();
            $table->text('doc3')->nullable();
            $table->text('doc4')->nullable();
            $table->text('remarks')->nullable();
            $table->foreignId('role_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('other_activities')->nullable();
            $table->text('student_sign')->nullable();
            $table->text('guardian_sign')->nullable();
            $table->text('admitted_by_sign')->nullable();

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
        Schema::dropIfExists('students');
    }
}
