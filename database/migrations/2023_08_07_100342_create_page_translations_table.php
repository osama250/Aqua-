<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('page_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id');
            $table->string('locale');
            $table->longText('title');
            $table->longText('description');
            $table->longText('seo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_translations');
    }
};
