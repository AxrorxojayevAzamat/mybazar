<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteFromModifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_modifications', function (Blueprint $table) {
            if (Schema::hasColumn('shop_modifications', 'color'))
            {
                Schema::table('shop_modifications', function (Blueprint $table)
                {
                    $table->dropColumn('color');
                });
            }
            if (Schema::hasColumn('shop_modifications', 'type'))
            {
                Schema::table('shop_modifications', function (Blueprint $table)
                {
                    $table->dropColumn('type');
                });
            }
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
