<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_history', function (Blueprint $table) {
            $table->integer('history_id')->primary();
            $table->integer('order_id');
            $table->integer('status_id');
            $table->date('status_date');

            $table->foreign('status_id')
                ->references('status_id')
                ->on('order_status')
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
        Schema::dropIfExists('order_history');
    }
}
