<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('school_id')->nullable();
            $table->string('name');
            $table->foreignId('category_id');
            $table->foreignId('supplier_id');
            $table->double('price',10,2);
            $table->integer('quantity');
            $table->integer('total_quantity');
            $table->double('total_price',10,2);
            $table->string('image')->nullable();
            $table->mediumText('description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('reject')->default(0);
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
        Schema::dropIfExists('inventories');
    }
}
