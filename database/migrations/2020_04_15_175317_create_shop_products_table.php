<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_uz');
            $table->string('name_uz_ki');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('description_uz');
            $table->string('description_uz_ki');
            $table->string('description_ru');
            $table->string('description_en');
            $table->string('slug');
            $table->integer('prize_uzs');
            $table->float('prize_usd')->nullable();
            $table->float('discount')->default(0);
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('brand_id');
            $table->tinyInteger('status');
            $table->float('wright');
            $table->integer('quantity');
            $table->boolean('guarantee');
            $table->boolean('bestseller');
            $table->boolean('new');
            $table->float('rating');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
        });

        Schema::table('shop_products', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('restrict');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('restrict');
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
        Schema::dropIfExists('shop_products');
    }
}
