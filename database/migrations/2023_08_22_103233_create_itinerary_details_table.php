<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('itinerary_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('itinerary_id')->unsigned();
            $table->timestamps();
            $table->foreign('itinerary_id')->references('id')->on('itineraries')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('itinerary_details');
    }
};
