<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('income');
            $table->integer('proceeds');
            $table->integer('spent');
            $table->integer('scot')->nullable();
            $table->integer('post')->nullable();
            $table->date('date_ad');
            $table->date('date_up');
            $table->integer('channel')->nullable();
            $table->boolean('stage');
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
        Schema::dropIfExists('incomes');
    }
}
