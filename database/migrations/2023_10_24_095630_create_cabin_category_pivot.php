<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cabin_category_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cabin_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('cabin_id')->references('id')->on('cabins')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cabin_category_pivot');
    }
};
