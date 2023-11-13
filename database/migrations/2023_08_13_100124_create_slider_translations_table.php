<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('slider_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('slider_id');
            $table->string('locale');
            $table->string('title');
            $table->string('sub_title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('slider_translations');
    }
};
