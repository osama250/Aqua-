<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('itinerary_detail_translations', function (Blueprint $table) {
            $table->increments('trans_id');
            $table->integer('itinerary_detail_id')->unsigned();
            $table->string('locale', 2)->index();
            $table->string('text');

            $table->unique(['itinerary_detail_id', 'locale']);
            $table->foreign('itinerary_detail_id')->references('id')->on('itinerary_details')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('itinerary_detail_translations');
    }
};
