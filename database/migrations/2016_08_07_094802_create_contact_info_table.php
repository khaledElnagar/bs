<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',255);
            $table->string('phone',255);
            $table->string('mobile',255);
            $table->string('fax',255);
            $table->string('address',255);
            $table->string('longitude',255);
            $table->string('latitude',255);
            $table->string('facebook',255);
            $table->string('twitter',255);
            $table->string('youtube',255);
            $table->string('linked_in',255);
            $table->string('google_plus',255);
            $table->string('wslny',255);
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
        Schema::drop('contacts');
    }
}
