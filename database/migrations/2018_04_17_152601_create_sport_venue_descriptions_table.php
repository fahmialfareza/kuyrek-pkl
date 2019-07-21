<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportVenueDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_venue_descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sportvenue_id');
            $table->double('lat', 20, 10)->nullable();
            $table->double('lng', 20, 10)->nullable();
            $table->longText('address')->nullable();
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
        Schema::dropIfExists('sport_venue_descriptions');
    }
}
