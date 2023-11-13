<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cabin_feature_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cabinfeature_id');
            $table->string('locale',2)->index();
            $table->string('title');
            $table->longText('description');
            $table->timestamps();

            $table->unique(['cabinfeature_id', 'locale']);
            $table->foreign('cabinfeature_id')->references('id')->on('cabinfeatures')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cabin_feature_translations');
    }
};
