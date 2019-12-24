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
            $table->integer('order_id');
            $table->integer('pro_id');
            $table->integer('shop_id');
            $table->boolean('stamp');
            $table->integer('price')->nullable();
            $table->text('disSeller')->nullable();
            $table->string('code_rahgiry',70)->unique()->nullable();
            $table->integer('date_ad');
            $table->integer('date_up');
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
