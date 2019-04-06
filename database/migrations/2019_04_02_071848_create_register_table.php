<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',25);
            $table->string('karbary',10)->unique();
            $table->string('pas',60);
            $table->string('mobail',13)->unique();
            $table->string('email',100)->unique()->nullable();
            $table->string('email_verified')->nullable();
            $table->rememberToken()->nullable();
            $table->string('created_at',17);
            $table->string('updated_at',17);
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
        Schema::dropIfExists('Registers');
    }
}
