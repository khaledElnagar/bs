<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category',255);
            $table->string('parent_category',255);
            $table->string('name',255);
            $table->string('isbn',255);
            $table->string('code',255);
            $table->string('publish_year',255);
            $table->string('image',255);
            $table->text('author');
            $table->text('description');
            $table->string('price',255);
            $table->tinyInteger('amazon_flag');
            $table->tinyInteger('update_flag');
            $table->tinyInteger('highlight');
            $table->tinyInteger('featured_book'); 
            $table->integer('views');
            $table->timestamps();

            $table->foreign('category')->references('code')->on('categories');
            $table->foreign('parent_category')->references('parent_code')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }
}
