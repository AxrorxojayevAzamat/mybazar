<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->text('description_uz');
            $table->text('description_ru');
            $table->text('description_en');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->unsignedInteger('category_id');
            $table->boolean('common')->default(false);
            $table->tinyInteger('status');
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
        });

        Schema::table('discounts', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
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
        Schema::dropIfExists('discounts');
    }
}
