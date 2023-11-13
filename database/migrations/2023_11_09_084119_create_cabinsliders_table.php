<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cabin_sliders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cabin_id');
            $table->string('photo');
            $table->timestamps();

            $table->foreign('cabin_id')->references('id')->on('cabins')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('cabinsliders');
    }
};
