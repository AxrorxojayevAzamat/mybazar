<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_characteristics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->unsignedInteger('group_id');
            $table->tinyInteger('status');
            $table->string('type');
            $table->string('default')->nullable();
            $table->boolean('required');
            $table->json('variants')->nullable();
            $table->boolean('hide_in_filters');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
        });

        Schema::table('shop_characteristics', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('shop_characteristic_groups')->onDelete('restrict');
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
        Schema::dropIfExists('shop_characteristics');
    }
}
