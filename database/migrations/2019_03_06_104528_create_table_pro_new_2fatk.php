<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProNew2fatk extends Migration
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
            $table->string('price' , 13);
            $table->string('old_price' , 13)->nullable();
            $table->string('gram' , 13);
            $table->string('gram_post', 13);
            $table->string('pakat_price', 13);
            $table->string('made', 60)->nullable();
            $table->string('model', 13)->nullable();
            $table->string('dimension' ,13)->nullable();
            $table->json('mavad')->nullable();
            $table->date('date_m')->nullable();
            $table->date('date_n')->nullable();
            $table->text('term')->nullable();
            $table->text('bake')->nullable();
            $table->string('sponsor' , 50)->nullable();
            $table->mediumInteger('views');
            $table->string('seller' , 70);
            $table->index('seller');
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
        Schema::dropIfExists('=Pros');
    }
}
