<?php

use App\Entity\User\User;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable()->unique();
            $table->boolean('phone_verified')->default(false);
            $table->string('password');
            $table->bigInteger('balance')->default(0);
            $table->string('verify_token')->nullable();
            $table->string('phone_verify_token')->nullable();
            $table->timestamp('phone_verify_token_expire')->nullable();
            $table->boolean('phone_auth')->default(false);
            $table->string('role');
            $table->integer('status');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$6Lwc.e9C9tOaSBimWKuMfO4GnNpTYjCOggwwl56rjEHzo4frI0V6m',
            'role' => User::ROLE_ADMIN,
            'status' => User::STATUS_ACTIVE,
            'email_verified_at' => Carbon::now()->addSeconds(300),
            'remember_token' => Str::random(10),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
