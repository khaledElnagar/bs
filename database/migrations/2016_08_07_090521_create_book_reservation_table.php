<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('book_id');
            $table->string('isbn',255);
            $table->integer('quantity');
            $table->text('comment');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('book_reservation');
    }
}
