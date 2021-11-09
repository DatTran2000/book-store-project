<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_author', function (Blueprint $table) {
            $table->integer('book_id');
            $table->integer('author_id');
            $table->primary(['book_id','author_id']);

            $table->foreign('author_id')
                ->references('author_id')
                ->on('author')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign('book_id')
                ->references('book_id')
                ->on('book')
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
        Schema::dropIfExists('book_author');
    }
}
