<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('invoice_no');
            $table->date('date');
            $table->integer('supplier_id');
            $table->integer('sub_total');
            $table->integer('total_cgst');
            $table->integer('total_sgst');
            $table->integer('total_tax');
            $table->integer('tax_amount');
            $table->integer('grand_total');
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
        Schema::dropIfExists('purchases');
    }
}
