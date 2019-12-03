<?php

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
            $table->integer('catalogueid')->nullable();
            $table->string('account', 100)->unique();
            $table->string('fullname', 100)->nullable();
            $table->string('email',100)->unique();
            $table->string('phone', 30)->nullable();
            $table->string('address',100)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->tinyInteger('married')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('avatar')->nullable();
            $table->string('description')->nullable();
            $table->integer('remote_addr')->nullable();
            $table->string('user_agent')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->integer('userid_created')->nullable();
            $table->integer('userid_updated')->nullable();
            $table->integer('otp')->nullable();
            $table->dateTime('otp_time_live')->nullable();
            $table->tinyInteger('trash')->nullable();
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
        Schema::dropIfExists('users');
    }
}
