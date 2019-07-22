<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managements', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name',25);
          $table->string('karbary',10)->unique();
          $table->string('pas',60);
          $table->smallInteger('access');
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
        Schema::dropIfExists('managements');
    }
}
