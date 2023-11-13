<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('itineraries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trip_category_id')->unsigned();
            $table->tinyInteger('day');
            $table->timestamps();

            $table->foreign('trip_category_id')->references('id')->on('trip_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('itineraries');
    }
};
