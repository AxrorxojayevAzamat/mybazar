<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('menu_title_uz')->nullable();
            $table->string('menu_title_ru')->nullable();
            $table->string('menu_title_en')->nullable();
            $table->string('slug');
            $table->mediumText('description_uz');
            $table->mediumText('description_ru');
            $table->mediumText('description_en');
            $table->text('body_uz');
            $table->text('body_ru');
            $table->text('body_en');
            $table->unsignedInteger('parent_id')->nullable();
            $table->integer('left');
            $table->integer('right');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('pages')->onDelete('restrict');
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
        Schema::dropIfExists('pages');
    }
}
