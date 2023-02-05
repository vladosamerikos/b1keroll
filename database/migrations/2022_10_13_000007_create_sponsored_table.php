<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsoredTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsored', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('sponsor_id');
            $table->foreign('sponsor_id')->references('id')->on('sponsors');
            
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
        Schema::dropIfExists('sponsored');
    }
}
