<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dining_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('dining_id');
            $table->text('photo');
            $table->integer('Witdh');
            $table->integer('height');
            $table->timestamps();

            $table->foreign('dining_id')->references('id')->on('dinings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dining_photos');
    }
};
