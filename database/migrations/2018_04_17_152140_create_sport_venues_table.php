<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_venues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('sportvenuecategory_id');
            $table->integer('see')->default(0);
            $table->integer('star')->nullable();
            $table->string('tags')->nullable();
            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->integer('sportvenuevendor_id');
            $table->integer('province_id');
            $table->integer('regency_id');
            $table->integer('district_id');
            $table->boolean('official');
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
        Schema::dropIfExists('sport_venues');
    }
}
