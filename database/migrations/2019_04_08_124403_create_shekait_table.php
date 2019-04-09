<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShekaitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Shekaits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name' , 50);
            $table->string('mobail' , 13);
            $table->string('email' , 150)->nullable();
            $table->text('address')->nullable();
            $table->string('object',150)->nullable();
            $table->text('shekait');
            $table->date('date');
            $table->string('stage',120)->nullable();
            $table->string('responder',50)->nullable();
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
        Schema::dropIfExists('Shekaits');
    }
}
