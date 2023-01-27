<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLostInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('school_id')->nullable();
            $table->foreignId('product_id');
            $table->string('product_name')->nullable();
            $table->string('identity_name')->nullable();
            $table->double('price',10,2)->nullable();
            $table->integer('qty');
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
        Schema::dropIfExists('lost_inventories');
    }
}
