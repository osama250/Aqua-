<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('qu1');
            $table->string('qr2');
            $table->string('phone');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('contact_infos');
    }
};
