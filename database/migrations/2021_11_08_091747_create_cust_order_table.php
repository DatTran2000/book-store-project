<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cust_order', function (Blueprint $table) {
            $table->integer('order_id')->primary();
            $table->dateTime('order_date');
            $table->integer('customer_id');
            $table->integer('shipping_method_id');
            $table->integer('dest_address_id');

            $table->foreign('shipping_method_id')
                ->references('method_id')
                ->on('shipping_method')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign('dest_address_id')
                ->references('address_id')
                ->on('address')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign('customer_id')
                ->references('customer_id')
                ->on('customer')
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
        Schema::dropIfExists('cust_order');
    }
}
