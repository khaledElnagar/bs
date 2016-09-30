<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('university_flag');
            $table->tinyInteger('approved_university');
            $table->string('address',255);
            $table->string('country',255);
            $table->string('city',255);
            $table->string('phone',255);
            $table->string('image',255);
            $table->string('discount',255);
            $table->integer('age');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
