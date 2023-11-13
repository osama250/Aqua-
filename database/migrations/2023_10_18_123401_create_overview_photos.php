<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('overview_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('overview_id');
            $table->text('photo');
            $table->integer('Witdh');
            $table->integer('height');
            $table->timestamps();

            $table->foreign('overview_id')->references('id')->on('overviews')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('overview_photos');
    }
};
