<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration{

    public function up(){
        Schema::create('addresses', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('region');
            $table->string('city');
            $table->string('street');
            $table->string('phone');
            $table->string('additional_info');
            $table->bigInteger('user')->unsigned();
            $table->foreign('user')->references('id')->on('users');
            $table->timestamps();
        });
    }


    public function down(){
        Schema::dropIfExists('reviews');
    }
}