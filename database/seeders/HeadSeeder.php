<?php

namespace Database\Seeders;

use App\Models\MainHead;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class HeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $table_name = str_replace(' ', '', "জমার খাত সমূহ");
        // $main_head = new MainHead();
        // $main_head->main_head = "জমার খাত সমূহ";
        // $main_head->code = "deposit";
        // $main_head->status = 1;
        // $main_head->save();

        // Schema::create($table_name, function ($table){
        //     $table->id();
        //     $table->integer('main_head_id')->nullable();
        //     $table->string('main_head')->nullable();
        //     $table->string('code')->nullable();
        //     $table->string('head_name')->nullable();
        //     $table->string('applicable')->nullable();
        //     $table->text('details')->nullable();
        //     $table->boolean('status')->default(true);
        //     $table->timestamps();
        // });

        // $table_name = str_replace(' ', '', "ব্যায়ের খাত সমূহ");
        // $main_head = new MainHead();
        // $main_head->main_head = "ব্যায়ের খাত সমূহ";
        // $main_head->code = "expense";
        // $main_head->status = 1;
        // $main_head->save();

        // Schema::create($table_name, function ($table){
        //     $table->id();
        //     $table->integer('main_head_id')->nullable();
        //     $table->string('main_head')->nullable();
        //     $table->string('code')->nullable();
        //     $table->string('head_name')->nullable();
        //     $table->string('applicable')->nullable();
        //     $table->text('details')->nullable();
        //     $table->boolean('status')->default(true);
        //     $table->timestamps();
        // });
    }
}
