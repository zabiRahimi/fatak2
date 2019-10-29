<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturePros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Picture_pros', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('pro_id')->index()->unique()->unsigned();
            $table->foreign('pro_id')->references('id')->on('pros')->onDelete('cascade')->onUpdate('cascade');
            $table->string('pic_b1' , 65)->nullable();
            $table->string('pic_b2' , 65)->nullable();
            $table->string('pic_b3' , 65)->nullable();
            $table->string('pic_b4' , 65)->nullable();
            $table->string('pic_b5' , 65)->nullable();
            $table->string('pic_b6' , 65)->nullable();
            $table->string('pic_s1' , 65)->nullable();
            $table->string('pic_s2' , 65)->nullable();
            $table->string('pic_s3' , 65)->nullable();
            $table->string('pic_s4' , 65)->nullable();
            $table->string('pic_s5' , 65)->nullable();
            $table->string('pic_s6' , 65)->nullable();
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
        Schema::dropIfExists('Picture_pros');
    }
}
