<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLornBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lorn_buys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_id');
            $table->string('undertake_ersal',60)->nullable()->comment('مشخص می کند چه کسی باید هزینه ارسال اولیه کالا را بپردازد');
            $table->string('undertake_back',60)->nullable()->comment('مشخص می کند چه کسی باید هزینه پستی ارجاع کالا را بپردازد');
            $table->string('price_back',13)->nullable()->comment('هزینه احتمالی ارجاع کالا');
            $table->string('price_LornPro',13)->nullable()->comment('مبلغ کالای گم شده');
            $table->text('buyer_dis')->nullable()->comment('نظر خریدار در مورد گم شدن کالا');
            $table->text('master_dis')->nullable()->comment('نظر کارشناس');
            $table->text('infoLornPro')->nullable()->comment('مشخصات کالا و یا کالاهای مفقودی');
            $table->text('loss_dis')->nullable()->comment('نظر کارشناس در مورد ضرر و زیان احتمالی بوجود آمده و اینکه چه کسی باید زیان را بپردازد');
            $table->string('undertake_loss',60)->nullable()->comment('پرداخت کننده زیان احتمالی');
            $table->string('loss_price',13)->nullable()->comment('مبلغ زیان احتمالی');
            $table->string('date_ad',13)->nullable();
            $table->string('date_up',13)->nullable();
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
        Schema::dropIfExists('lorn_buys');
    }
}
