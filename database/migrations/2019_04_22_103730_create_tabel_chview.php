<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelChview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ch_views', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('channel_id')->index();
            $table->date('date')->index();
            $table->integer('buy')->nullable();
            $table->integer('lot_ch')->nullable();
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
        Schema::dropIfExists('Ch_views');
    }
}
