<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBuys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Buys', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('buyer_id');
            $table->mediumInteger('pro_id');
            $table->smallInteger('shop_id');
            $table->tinyInteger('num_buy')->comment('تعداد خرید');
            $table->mediumInteger('price_pro')->comment('قیمت واحد کالا در زمان درج ستون ، ممکن است بعد از خرید کالا قیمت محصول تغییر کند ، نباید مقدار این ستون تغییر کند');
            $table->integer('date_up');
            $table->boolean('stage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Buys');
    }
}
