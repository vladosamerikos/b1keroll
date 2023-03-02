<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunnerNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runner_number', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('race_id');
            $table->foreign('race_id')->references('id')->on('races');

            $table->unsignedInteger('insurance_id');
            $table->foreign('insurance_id')->references('id')->on('insurances');
            
            $table->integer('runner_number')->nullable();
            $table->time('elapsed_time')->nullable();
            $table->boolean('is_paid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('runner_number');
    }
}
