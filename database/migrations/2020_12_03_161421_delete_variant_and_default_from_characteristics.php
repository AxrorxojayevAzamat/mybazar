<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteVariantAndDefaultFromCharacteristics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_characteristics', function (Blueprint $table) {
            if (Schema::hasColumn('shop_characteristics', 'default'))
            {
                Schema::table('shop_characteristics', function (Blueprint $table)
                {
                    $table->dropColumn('default');
                });
            }
            if (Schema::hasColumn('shop_characteristics', 'variants'))
            {
                Schema::table('shop_characteristics', function (Blueprint $table)
                {
                    $table->dropColumn('variants');
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
        Schema::table('shop_characteristics', function (Blueprint $table) {
            //
        });
    }
}
