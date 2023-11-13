<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('email');
            $table->text('phone');
            $table->text('title');
            $table->text('subject');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('contact_us');
    }
};
