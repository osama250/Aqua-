<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('escapade_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('escapade_id');
            $table->string('photo');
            $table->timestamps();
            $table->foreign('escapade_id')->references('id')->on('escapades')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('escapade_photos');
    }
};
