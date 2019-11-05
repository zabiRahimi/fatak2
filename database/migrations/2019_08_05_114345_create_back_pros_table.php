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
          $table->mediumInteger('order_id')->unique()->nullable();
          $table->mediumInteger('pro_id')->nullable();
          $table->mediumInteger('shop_id')->nullable();
          $table->string('code_rahgiry',70)->unique()->nullable();
          $table->string('undertake_ersal',60)->nullable();
          $table->string('date_back',13)->nullable();
          $table->string('undertake_back',60)->nullable();
          $table->string('price_back',13)->nullable();
          $table->text('buyer_dis')->nullable();
          $table->text('master_dis')->nullable();
          $table->text('loss_dis')->nullable();
          $table->string('undertake_loss',60)->nullable();
          $table->string('loss_price',13)->nullable();
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
        Schema::dropIfExists('back_pros');
    }
}
