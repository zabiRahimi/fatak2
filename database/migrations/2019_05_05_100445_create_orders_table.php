<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name' , 100);
            $table->string('squad',70)->nullable();
            $table->string('vahed',40);
            $table->string('num',3);
            $table->text('dis')->nullable();
            $table->string('mobail',12);
            $table->string('ostan',30);
            $table->string('city',30);
            $table->string('date_ad',14);
            $table->string('date_up',14);
            $table->json('id_proShop')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
