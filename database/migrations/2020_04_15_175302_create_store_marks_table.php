<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_marks', function (Blueprint $table) {
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('mark_id');
        });

        Schema::table('store_marks', function (Blueprint $table) {
            $table->primary(['store_id', 'mark_id']);
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('restrict');
            $table->foreign('mark_id')->references('id')->on('shop_marks')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_marks');
    }
}
