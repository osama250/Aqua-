<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('inspiration_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('inspiration_id');
            $table->string('locale', 2)->index();
            $table->text('title');
            $table->longText('description');
            $table->timestamps();

            $table->unique(['inspiration_id', 'locale']);
            $table->foreign('inspiration_id')->references('id')->on('inspirations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inspiration_translations');
    }
};
