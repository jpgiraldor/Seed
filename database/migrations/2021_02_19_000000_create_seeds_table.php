
<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

class CreateSeedsTable extends Migration{

    public function up(){
        Schema::create('seeds', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('brand');
            $table->double('weight',15,4);
            $table->text('water');
            $table->text('ground');
            $table->text('drought');
            $table->double('germination',15,4);
            $table->text('type');
            $table->text('keywords');
            $table->text('category');
            $table->double('price',15,4);
            $table->timestamps();
        });
    }


    public function down(){
        Schema::dropIfExists('seeds');
    }
}
