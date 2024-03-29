<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('unevenness');
            $table->string('map_frame', 1000);
            $table->integer('number_of_competitors');
            $table->float('length');
            $table->date('start_date');
            $table->time('start_time');
            $table->string('start_point');
            $table->string('promotional_poster');
            $table->float('sponsor_price');
            $table->float('price');
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('races');
    }
}
