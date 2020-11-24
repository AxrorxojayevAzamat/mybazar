<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->text('description_uz');
            $table->text('description_ru');
            $table->text('description_en');
            $table->text('body_uz');
            $table->text('body_ru');
            $table->text('body_en');
            $table->unsignedBigInteger('category_id');
            $table->tinyInteger('status');
            $table->string('poster')->nullable();
            $table->string('video')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
        });

        Schema::table('blog_videos', function (Blueprint $table) {
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
        Schema::dropIfExists('blog_videos');
    }
}
