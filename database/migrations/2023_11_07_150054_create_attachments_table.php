<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('factsheet');
            $table->string('itinerary');
            $table->string('sightseeing');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('attachments');
    }
};
