<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('modification_id');
            $table->string('product_name_uz');
            $table->string('product_name_ru');
            $table->string('product_name_en');
            $table->string('product_code');
            $table->string('modification_name_uz');
            $table->string('modification_name_ru');
            $table->string('modification_name_en');
            $table->string('modification_code');
            $table->integer('price');
            $table->integer('quantity');
            $table->float('discount')->default(0);
            $table->timestamps();
        });

        Schema::table('shop_order_items', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('shop_orders')->onDelete('restrict');
            $table->foreign('product_id')->references('id')->on('shop_products')->onDelete('restrict');
            $table->foreign('modification_id')->references('id')->on('shop_modifications')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_order_items');
    }
}
