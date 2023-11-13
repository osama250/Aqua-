<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('escapade_detai_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('escapade_detail_id');
            $table->string('photo');
            $table->timestamps();

            $table->foreign('escapade_detail_id')->references('id')->on('escapade_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escapade_detai_photos');
    }
};
