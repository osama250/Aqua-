<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('escapade_detail_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('escapade_detail_id');
            $table->string('locale', 2)->index();
            $table->text('title');
            $table->Text('description');
            $table->timestamps();


            $table->unique(['escapade_detail_id', 'locale']);
            $table->foreign('escapade_detail_id')->references('id')->on('escapade_details')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('escapade_detail_translations');
    }
};
