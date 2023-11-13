<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('escapade_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('escapade_id');
            $table->string('locale', 2)->index();
            $table->text('title');
            $table->timestamps();

            $table->unique(['escapade_id', 'locale']);
            $table->foreign('escapade_id')->references('id')->on('escapades')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('escapade_translations');
    }
};
