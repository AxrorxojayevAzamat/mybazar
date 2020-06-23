<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('title_uz');
            $table->text('description_ru');
            $table->text('description_uz');
            $table->text('description_en');
            $table->text('body_uz');
            $table->text('body_en');
            $table->text('body_ru');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->boolean('is_published')->default(false);
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
