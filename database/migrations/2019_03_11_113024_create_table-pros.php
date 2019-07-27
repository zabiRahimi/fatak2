<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name' , 70);
            $table->text('dis');
            $table->string('price' , 8);
            $table->string('old_price' , 8)->nullable();
            $table->boolean('dimension_stamp');
            $table->string('gram' , 8);
            $table->string('gram_post' , 8);
            $table->string('pakat_price' , 8);
            $table->string('made' , 60)->nullable();
            $table->string('model' , 70)->nullable();
            $table->string('dimension' ,23)->nullable();
            $table->json('mavad')->nullable();
            $table->string('date_m' , 30)->nullable();
            $table->string('date_n' , 30)->nullable();
            $table->text('term')->nullable();
            $table->text('bake')->nullable();
            $table->string('sponsor' , 50)->nullable();
            $table->string('views' , 8);
            $table->string('seller' , 60);
            $table->boolean('show');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Pros');
    }
}
