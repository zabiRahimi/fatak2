<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNazarPro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Nazar_pros', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('pro_id')->index()->unsigned();
            $table->foreign('pro_id')->references('id')->on('pros')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name' , 50);
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
        Schema::dropIfExists('Nazar_pros');
    }
}
