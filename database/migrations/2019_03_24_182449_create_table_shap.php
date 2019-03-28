<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop',60)->unique()->nullable();
            $table->string('seller',60);
            $table->string('id_ostan',2);
            $table->string('id_city',3);
            $table->string('ostan',32);
            $table->string('city' , 32);
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
        Schema::dropIfExists('Shops');
    }
}
