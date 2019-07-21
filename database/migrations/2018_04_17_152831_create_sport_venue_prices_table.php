<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportVenuePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_venue_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sportvenue_id');
            $table->integer('from_day');
            $table->integer('to_day');
            $table->time('start_time');
            $table->time('end_time');
            $table->double('price', 20, 10);
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
        Schema::dropIfExists('sport_venue_prices');
    }
}
