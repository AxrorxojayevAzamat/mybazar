<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateShopOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_order_items', function (Blueprint $table){
            $table->string('modification_name_uz')->nullable()->change();
            $table->string('modification_name_ru')->nullable()->change();
            $table->string('modification_name_en')->nullable()->change();
            $table->string('modification_code')->nullable()->change();
            $table->unsignedBigInteger('modification_id')->nullable()->change();
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
