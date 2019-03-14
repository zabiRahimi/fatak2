<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShops extends Migration
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
            $table->string('shop' , 50)->unique();
            $table->string('seller' , 50)->unique();
            $table->string('id_ostan' , 3);
            $table->string('ostan' , 35);
            $table->string('city', 35);
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
