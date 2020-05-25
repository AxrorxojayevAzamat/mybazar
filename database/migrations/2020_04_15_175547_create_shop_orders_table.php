<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('delivery_method_id');
            $table->string('delivery_method_name_uz');
            $table->string('delivery_method_name_ru');
            $table->string('delivery_method_name_en');
            $table->integer('delivery_cost');
            $table->unsignedInteger('payment_type_id');
            $table->integer('cost');
            $table->string('note');
            $table->tinyInteger('status');
            $table->string('cancel_reason');
            $table->json('statuses_json');
            $table->string('phone');
            $table->string('name');
            $table->string('delivery_index');
            $table->string('delivery_address');
            $table->timestamps();
        });

        Schema::table('shop_orders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('delivery_method_id')->references('id')->on('delivery_methods')->onDelete('restrict');
            $table->foreign('payment_type_id')->references('id')->on('payments')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_orders');
    }
}
