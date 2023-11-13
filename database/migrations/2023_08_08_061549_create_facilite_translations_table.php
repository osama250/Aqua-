<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('facilite_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facilite_id');
            $table->string('locale');
            $table->string('title');
            $table->longText('description');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('facilite_translations');
    }
};
