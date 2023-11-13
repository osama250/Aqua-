<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('facilites', function (Blueprint $table) {
            $table->increments('id');
            $table->text('main_photo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('facilites');
    }
};
