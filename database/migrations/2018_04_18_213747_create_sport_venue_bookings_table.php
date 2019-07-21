<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportVenueBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_venue_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('sportvenue_id');
            $table->integer('sportvenueprice_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->double('total_payment', 20, 10);
            $table->datetime('expired');
            $table->boolean('transfer')->default(0);
            $table->string('payment')->nullable();
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
        Schema::dropIfExists('sport_venue_bookings');
    }
}
