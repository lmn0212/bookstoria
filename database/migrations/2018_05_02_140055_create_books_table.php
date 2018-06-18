<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('name');
            $table->string('author_name');
            $table->text('cover');
            $table->text('annotation');
            $table->integer('count_views');
            $table->text('booktailer');
            $table->integer('public');
            $table->string('price');
            $table->integer('author_id');
            $table->timestamps();
        });
        Schema::create('category_book', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('book_id');
            $table->timestamps();
        });
        Schema::create('collection_book', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collection_id');
            $table->integer('book_id');
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
        Schema::dropIfExists('books');
        Schema::dropIfExists('category_book');
        Schema::dropIfExists('collection_book');
    }
}
