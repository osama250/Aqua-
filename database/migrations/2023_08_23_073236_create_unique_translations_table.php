<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('unique_translations', function (Blueprint $table) {
            $table->increments('trans_id');
            $table->integer('unique_id')->unsigned();
            $table->string('locale', 2)->index();
            $table->text('title');
            $table->longText('text');

            $table->unique(['unique_id', 'locale']);
            $table->foreign('unique_id')->references('id')->on('uniques')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('unique_translations');
    }
};
