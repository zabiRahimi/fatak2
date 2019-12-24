<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unique()->nullable();
            $table->integer('pro_id')->nullable();
            $table->integer('shop_id')->nullable();
            $table->string('price',13)->nullable();
            $table->string('numPay',60)->unique()->nullable();
            $table->string('sortPay',50)->nullable();
            $table->string('date_ad',13)->nullable();
            $table->string('date_up',13)->nullable();
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
        Schema::dropIfExists('pay_shops');
    }
}
