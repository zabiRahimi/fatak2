<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNazarproTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nazar_pros', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('pro_id')->index()->unsigned();
          $table->foreign('pro_id')->references('id')->on('pros');
          $table->string('name' , 50);
          $table->string('mobail' , 13)->nullable();
          $table->string('email' , 150)->nullable();
          $table->text('nazar');
          $table->date('date');
          $table->mediumInteger('like')->nullable();
          $table->mediumInteger('unlike')->nullable();
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
        Schema::dropIfExists('nazar_pros');
    }
}
