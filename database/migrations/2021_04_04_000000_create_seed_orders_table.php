<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

class CreateSeedOrdersTable extends Migration{

    public function up(){
        Schema::create('seed_orders', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('seed')->unsigned();
            $table->foreign('seed')->references('id')->on('seeds');
            $table->bigInteger('order')->unsigned();
            $table->foreign('order')->references('id')->on('orders');
            $table->timestamps();
        });
    }


    public function down(){
        Schema::dropIfExists('reviews');
    }
}
