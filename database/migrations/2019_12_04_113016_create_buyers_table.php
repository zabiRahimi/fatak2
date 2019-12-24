<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('typeBuy',13)->comment('نوع خرید ، مستقیم یا سفارشی');
            $table->integer('order_id')->nullable()->comment('چنانچه ستون تایپ بای برابر با `سفارشی` بود باید مقدار داشته باشد');
            $table->string('backOrLornPro',13)->nullable()->comment('وضعیت مرجوعی یا مفقودی کالا ، چنانچه کالا ارجاع شود ، در ستون `مرجوعی` درج شود ، چنانچه کالا گم شود در ستون `مفقودی` درج شود');
            $table->string('name',70);
            $table->string('mobail',13);
            $table->string('tel',13)->nullable();
            $table->string('email',80)->nullable();
            $table->string('ostan',33);
            $table->string('city',33);
            $table->string('codepost',11);
            $table->text('address');
            $table->string('dis',200)->nullable();
            $table->string('post',25);
            $table->mediumInteger('price_post')->nullable();
            $table->mediumInteger('price_pro');
            $table->mediumInteger('scot')->nullable();
            $table->mediumInteger('paywork')->nullable();
            $table->mediumInteger('amount')->nullable();
            $table->string('authority',36)->nullable();
            $table->string('refid',36)->nullable();
            $table->integer('date_ad');
            $table->integer('date_up');
            $table->boolean('stage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyers');
    }
}
