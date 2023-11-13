<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('facilite_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facilite_id');
            $table->text('photo');
            $table->timestamps();

            $table->foreign('facilite_id')->references('id')->on('facilites')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('facilite_photos');
    }
};
