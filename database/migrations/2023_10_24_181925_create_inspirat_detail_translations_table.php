<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('inspirat_detail_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inspiration_detail_id');
            $table->string('locale', 2)->index();
            $table->text('title');
            $table->Text('description');
            $table->timestamps();

            $table->unique(['inspiration_detail_id', 'locale']);
            $table->foreign('inspiration_detail_id')->references('id')->on('inspiration_details')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('inspirat_detail_translations');
    }
};
