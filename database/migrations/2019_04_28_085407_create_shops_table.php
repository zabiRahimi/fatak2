<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop',30)->unique()->nullable();
            $table->string('seller',30);
            $table->string('pas',60);
            $table->string('mobail',12);
            $table->string('tel',12)->nullable();
            $table->string('email',100)->nullable();
            $table->string('img',60)->nullable();
            $table->string('codemly',11)->unique()->nullable();
            $table->string('id_ostan',2)->nullable();
            $table->string('id_city',3)->nullable();
            $table->string('ostan',32)->nullable();
            $table->string('city' , 32)->nullable();
            $table->text('address')->nullable();
            $table->string('codepost' , 11)->nullable();
            $table->string('accountNumber' , 20)->nullable();
            $table->string('cart' , 20)->nullable();
            $table->string('shabab' , 100)->nullable();
            $table->string('master' , 32)->nullable();
            $table->string('bank' , 32)->nullable();
            $table->date('date_ad');
            $table->date('date_up');
            $table->string('rank' , 12)->nullable();
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
        Schema::dropIfExists('shops');
    }
}
