<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('mobail',13)->index()->unique();
            $table->string('email')->unique()->nullable();
            $table->string('pas',60);
            $table->string('codemly',10)->index()->unique()->nullable();
            $table->string('ostan',30)->nullable();
            $table->string('city',30)->nullable();
            $table->text('address')->nullable();
            $table->string('codepost',11)->nullable();
            $table->string('accountNumber',20)->nullable();
            $table->string('cart',20)->nullable();
            $table->string('shabab')->nullable();
            $table->string('master',60)->nullable();
            $table->string('bank',50)->nullable();
            $table->integer('income')->nullable();
            $table->string('date_up_income',14)->nullable();
            $table->string('date_ad',14);
            $table->string('date_up',14);
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
        Schema::dropIfExists('channels');
    }
}
