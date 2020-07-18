<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if (!Schema::hasTable('users')){ 
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('user_type',50)->default('user');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->integer('phone');
            $table->integer('phone2')->nullable();
            $table->string('state');
            $table->string('city');
            $table->string('unit');
            $table->integer('home_no');
            $table->string('image')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }
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
