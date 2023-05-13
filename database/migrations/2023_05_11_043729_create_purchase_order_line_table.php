<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_order_line', function (Blueprint $table) {
            $table->increments('id_po_line');
            $table->integer('purchase_order_id')->unsigned();
            $table->foreign('purchase_order_id')->references('id_purchase')->on('purchase_orders')->onDelete('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id_product')->on('products')->onDelete('cascade');
            $table->integer('buy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_line');
    }
};
