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
            $table->string('name_ru');
            $table->string('name_en');
            $table->text('description_uz')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->string('slug')->unique();
            $table->integer('price_uzs');
            $table->float('price_usd')->nullable();
            $table->float('discount')->default(0);
            $table->unsignedBigInteger('main_category_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('brand_id');
            $table->tinyInteger('status');
            $table->float('weight')->nullable();
            $table->integer('quantity')->nullable();
            $table->boolean('guarantee');
            $table->boolean('bestseller');
            $table->boolean('new');
            $table->float('rating')->nullable();
            $table->integer('number_of_reviews')->default(0);
            $table->text('reject_reason')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
        });

        Schema::table('shop_products', function (Blueprint $table) {
            $table->foreign('main_category_id')->references('id')->on('shop_categories')->onDelete('restrict');
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
