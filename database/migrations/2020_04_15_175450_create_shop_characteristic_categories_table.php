<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopCharacteristicCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_characteristic_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('characteristic_id');
            $table->unsignedBigInteger('category_id');
        });

        Schema::table('shop_characteristic_categories', function (Blueprint $table) {
            $table->foreign('characteristic_id')->references('id')->on('shop_characteristics')->onDelete('restrict');
            $table->foreign('category_id')->references('id')->on('shop_categories')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_characteristic_categories');
    }
}
