<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerProsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_pros', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('question_pro_id')->index()->unsigned();
          $table->foreign('question_pro_id')->references('id')->on('question_pros')->onDelete('cascade')->onUpdate('cascade');
          $table->integer('pro_id');
          $table->string('name' , 50);
          $table->string('mobail' , 13)->nullable();
          $table->string('email' , 150)->nullable();
          $table->text('answer');
          $table->integer('date');
          $table->mediumInteger('like')->nullable();
          $table->mediumInteger('unlike')->nullable();
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
        Schema::dropIfExists('answer_pros');
    }
}
