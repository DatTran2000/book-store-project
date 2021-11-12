<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_address', function (Blueprint $table) {
            $table->integer('customer_id');
            $table->integer('address_id');
            $table->integer('status_id');
            $table->primary(['customer_id','address_id']);

            $table->foreign('status_id')
                ->references('status_id')
                ->on('address_status')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            $table->foreign('address_id')
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
        Schema::dropIfExists('customer_address');
    }
}
