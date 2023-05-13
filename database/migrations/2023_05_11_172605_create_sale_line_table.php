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
        Schema::create('sale_line', function (Blueprint $table) {
            $table->increments('id_sale_line');
            $table->integer('sale_id')->unsigned()->nullable();
            $table->foreign('sale_id')->references('id_sale')->on('sales')->onDelete('cascade');
            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id_product')->on('products')->onDelete('cascade');
            $table->integer('selling_price');
            $table->integer('qty');
            $table->integer('grand_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_line');
    }
};
