<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cabin_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('cabin_id');
            $table->string('locale',2)->index();
            $table->string('title');
            $table->longText('description');
            $table->timestamps();

            $table->unique(['cabin_id', 'locale']);
            $table->foreign('cabin_id')->references('id')->on('cabins')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('cabin_translations');
    }
};
