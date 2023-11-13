<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('inspiration_translations', function (Blueprint $table) {
            $table->increments('trans_id');
            $table->integer('inspiration_id')->unsigned();
            $table->string('locale', 2)->index();
            $table->text('title');
            $table->longText('descriptions');
            $table->timestamps();

            $table->unique(['inspiration_id', 'locale']);
            $table->foreign('inspiration_id')->references('id')->on('inspiration')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inspiration_translations');
    }
};
