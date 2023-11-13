<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cabin_facilite_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facilite_id');
            $table->unsignedBigInteger('cabin_id');
            $table->foreign('facilite_id')->references('id')->on('facilites')->onDelete('cascade');
            $table->foreign('cabin_id')->references('id')->on('cabins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cabin_facilite_pivot');
    }
};
