<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNetworksAuth extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->nullable()->change();
        });

        Schema::create('user_networks', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('network');
            $table->string('identity');
            $table->json('emails_json')->nullable();
            $table->json('phones_json')->nullable();
            $table->primary(['user_id', 'identity']);
        });

        Schema::table('user_networks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_networks');

        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->change();
        });
    }
}
