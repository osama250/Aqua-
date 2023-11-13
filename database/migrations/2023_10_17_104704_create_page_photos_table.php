<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('page_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('page_id');
            $table->text('photo');
            $table->integer('Witdh');
            $table->integer('height');
            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_photos');
    }
};
