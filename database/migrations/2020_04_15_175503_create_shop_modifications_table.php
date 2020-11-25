<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_modifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('code', 20)->unique();
            $table->unsignedBigInteger('characteristic_id')->nullable();
            $table->integer('price_uzs');
            $table->float('price_usd')->nullable();
            $table->tinyInteger('type');
            $table->string('value', 50)->nullable();
            $table->string('color', 15)->nullable();
            $table->string('photo', 50)->nullable();
            $table->integer('sort');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
        });

        Schema::table('shop_modifications', function (Blueprint $table) {
            $table->foreign('characteristic_id')->references('id')->on('shop_characteristics')->onDelete('restrict');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_modifications');
    }
}
