<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryIdentitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_identities', function (Blueprint $table) {
            $table->id();
            $table->string('school_id')->nullable();
            $table->foreignId('category_Id');
            $table->foreignId('product_id');
            $table->string('identity_name');
            $table->string('slug');
            $table->double('price',10,2)->nullable();
            $table->date('starting_date')->nullable();
            $table->integer('quantity');
            $table->mediumText('description')->nullable();
            $table->tinyInteger('status')->nullable(1);
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
        Schema::dropIfExists('inventory_identities');
    }
}
