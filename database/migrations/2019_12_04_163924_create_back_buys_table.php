<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('back_buys', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('buyer_id');
          $table->string('code_rahgiry',70)->unique()->nullable()->comment('کد رهگیری پستی که توسط مشتری اعلام می شود');
          $table->string('date_back',13)->nullable()->comment('تاریخ پست ارجاعی کالا');
          $table->string('undertake_ersal',60)->nullable()->comment('مشخص می کند چه کسی باید هزینه ارسال اولیه کالا را بپردازد');
          $table->string('undertake_back',60)->nullable()->comment('مشخص می کند چه کسی باید هزینه پستی ارجاع کالا را بپردازد');
          $table->string('price_back',13)->nullable()->comment('هزینه پست ارجاعی کالا');
          $table->text('buyer_dis')->nullable()->comment('نظر خریدار در مورد ارجاع کالا');
          $table->text('master_dis')->nullable()->comment('نظر کارشناس ارجاع');
          $table->text('infoBackPro')->nullable()->comment('مشخصات کالا و یا کالاهای برگشتی');
          $table->text('loss_dis')->nullable()->comment('نظر کارشناس در مورد ضرر و زیان احتمالی بوجود آمده و اینکه چه کسی باید زیان را بپردازد');
          $table->string('undertake_loss',60)->nullable()->comment('پرداخت کننده زیان احتمالی');
          $table->string('loss_price',13)->nullable()->comment('مبلغ زیان احتمالی');
          $table->integer('date_ad')->nullable();
          $table->integer('date_up')->nullable();
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
        Schema::dropIfExists('back_buys');
    }
}
