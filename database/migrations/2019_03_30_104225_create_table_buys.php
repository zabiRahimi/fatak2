<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBuys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Buys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('mobail' , 13);
            $table->string('tel' , 13)->nullable();
            $table->string('email',200)->nullable();
            $table->string('ostan',33);
            $table->string('city',33);
            $table->string('codepost',11);
            $table->text('address');
            $table->string('post',25);
            $table->integer('pro_id');
            $table->smallInteger('num_pro');
            $table->integer('shop_id');
            $table->smallInteger('other_pro')->nullable();
            $table->text('dis')->nullable();
            $table->mediumInteger('price_post');
            $table->mediumInteger('scot')->nullable();
            $table->mediumInteger('paywork')->nullable();
            $table->mediumInteger('amount')->nullable();
            $table->string('authority',36)->nullable();
            $table->string('refid',36)->nullable();
            $table->string('date',15)->nullable();
            $table->string('stage',3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Buys');
    }
}
