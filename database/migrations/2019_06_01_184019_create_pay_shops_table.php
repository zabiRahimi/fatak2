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
            $table->mediumInteger('order_id')->unique()->nullable();
            $table->mediumInteger('pro_id')->nullable();
            $table->mediumInteger('shop_id')->nullable();
            $table->string('price')->nullable();
            $table->string('numPay')->unique()->nullable();
            $table->string('sortPay')->nullable();
            $table->string('date_ad')->nullable();
            $table->string('date_up')->nullable();
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
