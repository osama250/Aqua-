<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('contact_info_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_info_id');
            $table->string('locale',2)->index();
            $table->string('adress');
            $table->longText('email');
            $table->timestamps();

            $table->unique(['contact_info_id', 'locale']);
            $table->foreign('contact_info_id')->references('id')->on('contact_infos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_info_translations');
    }
};
