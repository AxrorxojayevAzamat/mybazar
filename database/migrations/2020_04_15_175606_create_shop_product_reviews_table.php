<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->float('rating');
            $table->text('advantages')->nullable();
            $table->text('disadvantages')->nullable();
            $table->text('comment');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        Schema::table('shop_product_reviews', function (Blueprint $table) {
            $table->unique(['product_id', 'user_id']);
            $table->foreign('product_id')->references('id')->on('shop_products')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_reviews');
    }
}
