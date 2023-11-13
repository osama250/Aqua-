<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('meta_translations', function (Blueprint $table) {
            $table->increments('trans_id');
            $table->integer('meta_id')->unsigned();
            $table->string('locale', 2)->index();
            $table->string('title');
            $table->longText('description');
            $table->longText('keywords');

            $table->unique(['meta_id', 'locale']);
            $table->foreign('meta_id')->references('id')->on('metas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('meta_translations');
    }
};
