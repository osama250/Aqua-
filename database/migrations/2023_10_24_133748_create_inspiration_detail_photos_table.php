<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('inspiration_detail_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inspiration_detail_id');
            $table->string('photo');
            $table->timestamps();

            $table->foreign('inspiration_detail_id')->references('id')->on('inspiration_details')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('inspiration_detail_photos');
    }
};
