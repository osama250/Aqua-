<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('condition_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('condition_id');
            $table->string('locale');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
            $table->foreign('condition_id')->references('id')->on('conditions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('condition_translations');
    }
};
