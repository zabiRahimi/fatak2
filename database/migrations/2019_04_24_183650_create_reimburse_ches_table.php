<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReimburseChesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reimburse_ches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('channel_id');
            $table->integer('price');
            $table->string('num_reimburse',60)->nullable();
            $table->date('date');
            $table->string('object');
            $table->boolean('species');
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
        Schema::dropIfExists('reimburse_ches');
    }
}
