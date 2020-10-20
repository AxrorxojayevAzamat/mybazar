<?php

use App\Entity\User\User;
use App\Entity\User\Profile;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
    {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->text('address')->nullable();
            $table->string('avatar')->nullable();
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->primary('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        DB::table('users')->insert([
            'name'              => 'admin',
            'email'             => 'admin@gmail.com',
            'password'          => bcrypt('1q2w3e4r5t6y'),
            'role'              => User::ROLE_ADMIN,
            'status'            => User::STATUS_ACTIVE,
            'email_verified_at' => Carbon::now()->addSeconds(300),
            'remember_token'    => Str::random(10),
        ]);

        DB::table('profiles')->insert([
            'user_id'     => 1,
            'first_name'  => 'Admin',
            'last_name'   => 'Adminov',
            'birth_date'  => '1988-04-21 00:00:00',
            'gender'      => Profile::MALE,
            'address'     => 'Address uz adress uz address address uz',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }

    }
