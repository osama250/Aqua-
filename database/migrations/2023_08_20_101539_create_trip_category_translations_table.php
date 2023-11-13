<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('trip_category_translations', function (Blueprint $table) {
            $table->increments('trans_id');
            $table->integer('trip_category_id')->unsigned();
            $table->string('locale', 2)->index();
            $table->string('name');
            $table->string('duration');
            $table->text('rate_plan');
            $table->text('desc');

            $table->unique(['trip_category_id', 'locale']);

            $table->foreign('trip_category_id')->references('id')->on('trip_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trip_category_translations');
    }
};
