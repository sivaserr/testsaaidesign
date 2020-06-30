<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_products', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('description');
            $table->integer('material_id');
            $table->integer('hsn');
            $table->string('size');
            $table->integer('qty');
            $table->string('total_sqrft_copies');
            $table->string('price');
            $table->integer('cgst');
            $table->integer('sgst');
            $table->integer('netvalue');
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
        Schema::dropIfExists('purchase_products');
    }
}
