<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStampPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stamp_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('shop_id');
            $table->integer('pro_id')->unique();
            $table->boolean('hzoory');
            $table->string('public1',20)->nullable();
            $table->string('public2',20)->nullable();
            $table->string('public3',20)->nullable();
            $table->string('public4',20)->nullable();
            $table->string('public5',20)->nullable();
            $table->string('public6',20)->nullable();
            $table->string('company1',50)->nullable();
            $table->string('company2',50)->nullable();
            $table->string('company3',50)->nullable();
            $table->string('company4',50)->nullable();
            $table->string('company5',50)->nullable();
            $table->string('company6',50)->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stamp_posts');
    }
}
