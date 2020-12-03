<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterModificationsNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_modifications', function (Blueprint $table) {
            $table->string('name_uz')->nullable()->change();
            $table->string('name_ru')->nullable()->change();
            $table->string('name_en')->nullable()->change();
            $table->string('code')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shop_modifications', function (Blueprint $table) {
            //
        });
    }
}
