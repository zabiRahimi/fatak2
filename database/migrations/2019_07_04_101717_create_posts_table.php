<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
          $table->increments('id');
          $table->string('stamp',20);
          $table->string('javar',20);
          $table->string('500',10)->nullable();
          $table->string('1000',10)->nullable();
          $table->string('2000',10)->nullable();
          $table->string('3000',10)->nullable();
          $table->string('4000',10)->nullable();
          $table->string('5000',10)->nullable();
          $table->string('6000',10)->nullable();
          $table->string('7000',10)->nullable();
          $table->string('8000',10)->nullable();
          $table->string('9000',10)->nullable();
          $table->string('10000',10)->nullable();
          $table->string('11000',10)->nullable();
          $table->string('12000',10)->nullable();
          $table->string('13000',10)->nullable();
          $table->string('14000',10)->nullable();
          $table->string('15000',10)->nullable();
          $table->string('16000',10)->nullable();
          $table->string('17000',10)->nullable();
          $table->string('18000',10)->nullable();
          $table->string('19000',10)->nullable();
          $table->string('20000',10)->nullable();
          $table->string('21000',10)->nullable();
          $table->string('22000',10)->nullable();
          $table->string('23000',10)->nullable();
          $table->string('24000',10)->nullable();
          $table->string('25000',10)->nullable();
          $table->string('26000',10)->nullable();
          $table->string('27000',10)->nullable();
          $table->string('28000',10)->nullable();
          $table->string('29000',10)->nullable();
          $table->string('30000',10)->nullable();
          $table->string('31000',10)->nullable();
          $table->string('32000',10)->nullable();
          $table->string('33000',10)->nullable();
          $table->string('34000',10)->nullable();
          $table->string('35000',10)->nullable();
          $table->string('36000',10)->nullable();
          $table->string('37000',10)->nullable();
          $table->string('38000',10)->nullable();
          $table->string('39000',10)->nullable();
          $table->string('40000',10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
