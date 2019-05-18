<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture_shops', function (Blueprint $table) {
          $table->increments('id');
          $table->mediumInteger('pro_shop_id')->index()->unsigned();
          $table->foreign('pro_shop_id')->references('id')->on('pro_shops')->onDelete('cascade')->onUpdate('cascade');
          $table->string('pic_b1' , 35)->nullable();
          $table->string('pic_b2' , 35)->nullable();
          $table->string('pic_b3' , 35)->nullable();
          $table->string('pic_b4' , 35)->nullable();
          $table->string('pic_b5' , 35)->nullable();
          $table->string('pic_b6' , 35)->nullable();
          $table->string('pic_s1' , 35)->nullable();
          $table->string('pic_s2' , 35)->nullable();
          $table->string('pic_s3' , 35)->nullable();
          $table->string('pic_s4' , 35)->nullable();
          $table->string('pic_s5' , 35)->nullable();
          $table->string('pic_s6' , 35)->nullable();
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
        Schema::dropIfExists('picture_shops');
    }
}
