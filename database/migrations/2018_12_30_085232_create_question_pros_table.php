<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionProsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_pros', function (Blueprint $table) {
          $table->increments('id');
          $table->mediumInteger('pro_id')->index()->unsigned();
          $table->foreign('pro_id')->references('id')->on('pros')->onDelete('cascade')->onUpdate('cascade');
          $table->string('name' , 50);
          $table->text('question');
          $table->date('date');
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
        Schema::dropIfExists('question_pros');
    }
}
