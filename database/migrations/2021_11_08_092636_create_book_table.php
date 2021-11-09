<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->integer('book_id')->primary();
            $table->string('title');
            $table->string('isbn13');
            $table->integer('language_id');
            $table->integer('num_pages');
            $table->date('publication_date');
            $table->integer('publisher_id');

            $table->foreign('publisher_id')
                ->references('publisher_id')
                ->on('publisher')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign('language_id')
                ->references('language_id')
                ->on('book_language')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
}
