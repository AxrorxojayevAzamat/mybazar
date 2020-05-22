<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreDeliveryMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_delivery_methods', function (Blueprint $table) {
            $table->unsignedBigInteger('store_id');
            $table->unsignedInteger('delivery_method_id');
            $table->integer('sort');
        });

        Schema::table('store_delivery_methods', function (Blueprint $table) {
            $table->primary(['store_id', 'delivery_method_id']);
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('restrict');
            $table->foreign('delivery_method_id')->references('id')->on('delivery_methods')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_delivery_methods');
    }
}
