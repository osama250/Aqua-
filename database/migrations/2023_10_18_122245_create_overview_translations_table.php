<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('overview_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('overview_id');
            $table->string('locale',2)->index();
            $table->string('title');
            $table->string('subtitle');
            $table->longText('description');
            $table->timestamps();

            $table->unique(['overview_id', 'locale']);
            $table->foreign('overview_id')->references('id')->on('overviews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('overview_translations');
    }
};
