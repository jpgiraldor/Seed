
<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration{

    public function up(){
        Schema::create('reviews', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user')->unsigned();
            $table->foreign('user')->references('id')->on('users');
            $table->bigInteger('seed')->unsigned();
            $table->foreign('seed')->references('id')->on('seeds');
            $table->double('score',15,4);
            $table->string('content');
            $table->timestamps();
        });
    }


    public function down(){
        Schema::dropIfExists('reviews');
    }
}
