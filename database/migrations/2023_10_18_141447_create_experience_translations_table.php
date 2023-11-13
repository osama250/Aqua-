<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('experience_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('experience_id');
            $table->string('locale',2)->index();
            $table->string('title');
            $table->longText('description');
            $table->timestamps();

            $table->unique(['experience_id', 'locale']);
            $table->foreign('experience_id')->references('id')->on('experiences')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('experience_translations');
    }
};
