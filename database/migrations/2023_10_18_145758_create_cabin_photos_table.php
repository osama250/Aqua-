<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cabin_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('cabin_id');
            $table->text('photo');
            $table->integer('Witdh');
            $table->integer('height');
            $table->timestamps();

            $table->foreign('cabin_id')->references('id')->on('cabins')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cabin_photos');
    }
};
