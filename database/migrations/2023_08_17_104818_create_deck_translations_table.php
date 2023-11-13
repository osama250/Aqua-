<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('deck_translations', function (Blueprint $table) {
            $table->increments('trans_id');
            $table->integer('deck_id')->unsigned();
            $table->string('locale', 2)->index();
            $table->string('title');
            $table->longText('content');

            $table->unique(['deck_id', 'locale']);
            $table->foreign('deck_id')->references('id')->on('decks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('deck_translations');
    }
};
