<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookOrderCountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_order_count', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id');
            $table->string('isbn',255);
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('book_order_count');
    }
}
