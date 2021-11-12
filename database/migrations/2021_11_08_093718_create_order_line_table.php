<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_line', function (Blueprint $table) {
            $table->integer('line_id')->primary();
            $table->integer('order_id');
            $table->integer('book_id');
            $table->integer('price');

            $table->foreign('book_id')
                ->references('book_id')
                ->on('book')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign('order_id')
                ->references('order_id')
                ->on('cust_order')
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
        Schema::dropIfExists('order_line');
    }
}
