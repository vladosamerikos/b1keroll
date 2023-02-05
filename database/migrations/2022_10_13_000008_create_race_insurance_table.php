<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceInsuranceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_insurance', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('insurance_id');
            $table->foreign('insurance_id')->references('id')->on('insurances');

            $table->unsignedInteger('race_id');
            $table->foreign('race_id')->references('id')->on('races');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('race_insurance');
    }
}
