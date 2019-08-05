<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackProsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('back_pros', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('buy_id')->unique();
            $table->mediumInteger('pro_id');
            $table->mediumInteger('shop_id')->nullable();
            $table->string('code_rahgiry',70)->unique()->nullable();
            $table->string('date_post',13)->nullable();
            $table->mediumInteger('price_post')->nullable();
            $table->text('buyer_dis')->nullable();//توضیح مشتری
            $table->text('technician_dis')->nullable();//توضیح کارشناس
            $table->mediumInteger('pay_buyer')->nullable();//`پرداختی به مشتری`
            $table->string('date_ad',13)->nullable();
            $table->string('date_up',13)->nullable();
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
        Schema::dropIfExists('back_pros');
    }
}
