<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('coupon_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text("user_mobile");
            $table->integer("coupon_id");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coupon_users');
    }
};
