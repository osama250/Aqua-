<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('country_translations', function (Blueprint $table) {
                $table->increments('trans_id');
                $table->integer('country_id')->unsigned();
                $table->string('locale')->index();
                $table->string('name');
                $table->unique(['country_id', 'locale']);
                $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('country_translations');
    }
};
