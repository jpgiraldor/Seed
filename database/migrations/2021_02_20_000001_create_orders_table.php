<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total');
            $table->bigInteger('user')->unsigned();
            $table->foreign('user')->references('id')->on('users');
            $table->date('date');
            $table->bigInteger('ship_addr')->unsigned();
            $table->foreign('ship_addr')->references('id')->on('addresses');
            $table->bigInteger('seed')->unsigned();
            $table->foreign('seed')->references('id')->on('seeds');
            
            $table->string('acc');
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
        Schema::dropIfExists('orders');
    }
}
