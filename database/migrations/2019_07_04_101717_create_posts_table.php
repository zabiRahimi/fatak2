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
          $table->string('g500',10)->nullable();
          $table->string('g1000',10)->nullable();
          $table->string('g2000',10)->nullable();
          $table->string('g3000',10)->nullable();
          $table->string('g4000',10)->nullable();
          $table->string('g5000',10)->nullable();
          $table->string('g6000',10)->nullable();
          $table->string('g7000',10)->nullable();
          $table->string('g8000',10)->nullable();
          $table->string('g9000',10)->nullable();
          $table->string('g10000',10)->nullable();
          $table->string('g11000',10)->nullable();
          $table->string('g12000',10)->nullable();
          $table->string('g13000',10)->nullable();
          $table->string('g14000',10)->nullable();
          $table->string('g15000',10)->nullable();
          $table->string('g16000',10)->nullable();
          $table->string('g17000',10)->nullable();
          $table->string('g18000',10)->nullable();
          $table->string('g19000',10)->nullable();
          $table->string('g20000',10)->nullable();
          $table->string('g21000',10)->nullable();
          $table->string('g22000',10)->nullable();
          $table->string('g23000',10)->nullable();
          $table->string('g24000',10)->nullable();
          $table->string('g25000',10)->nullable();
          $table->string('g26000',10)->nullable();
          $table->string('g27000',10)->nullable();
          $table->string('g28000',10)->nullable();
          $table->string('g29000',10)->nullable();
          $table->string('g30000',10)->nullable();
          $table->string('g31000',10)->nullable();
          $table->string('g32000',10)->nullable();
          $table->string('g33000',10)->nullable();
          $table->string('g34000',10)->nullable();
          $table->string('g35000',10)->nullable();
          $table->string('g36000',10)->nullable();
          $table->string('g37000',10)->nullable();
          $table->string('g38000',10)->nullable();
          $table->string('g39000',10)->nullable();
          $table->string('g40000',10)->nullable();
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
