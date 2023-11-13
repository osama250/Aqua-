<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('inspiration_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('inspiration_id');
            $table->text('photo');
            $table->integer('Witdh');
            $table->integer('height');
            $table->timestamps();

            $table->foreign('inspiration_id')->references('id')->on('inspirations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inspiration_photos');
    }
};
