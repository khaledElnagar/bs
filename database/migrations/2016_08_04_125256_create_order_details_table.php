<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('book_id');
            $table->integer('user_id');
            $table->string('isbn',255);
            $table->string('price',255);
            $table->string('quantity',255);
            $table->string('total',255);
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::drop('order_details');
    }
}
