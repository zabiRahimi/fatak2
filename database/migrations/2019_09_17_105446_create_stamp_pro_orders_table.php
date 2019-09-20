<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStampProOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stamp_pro_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('order_id');
            $table->mediumInteger('proShop_id');
            $table->mediumInteger('shop_id');
            $table->boolean('stamp');
            $table->integer('price')->nullable();
            $table->text('disSeller')->nullable();
            $table->string('code_rahgiry',70)->unique()->nullable();
            $table->date('date_ad');
            $table->date('date_up');
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
        Schema::dropIfExists('stamp_pro_orders');
    }
}
