<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_shops', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('order_id');
            $table->mediumInteger('shop_id');
            $table->tinyInteger('stamp');
            $table->string('name',100);
            $table->string('maker',70)->nullable();
            $table->string('brand',70)->nullable();
            $table->string('model',60)->nullable();
            $table->string('price',12);
            $table->string('vahed',60);
            $table->string('num',7)->nullable();
            $table->string('vazn',8)->nullable();
            $table->string('vaznPost',8)->nullable();
            $table->string('pakat',12)->nullable();
            $table->text('dis')->nullable();
            $table->string('dateMake',12)->nullable();
            $table->string('dateExpiration',12)->nullable();
            $table->text('term')->nullable();
            $table->date('date_ad');
            $table->date('date_up');
            $table->tinyInteger('stage');
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
        Schema::dropIfExists('pro_shops');
    }
}
