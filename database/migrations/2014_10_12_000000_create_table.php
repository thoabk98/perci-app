<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string("client_id");
            $table->string("user_name");
            $table->string("email")->unique();
            $table->timestamps();
        });
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id");
            $table->string("base_product_id");
            $table->string("offer_product_id");
            $table->tinyInteger("type")->comment("1: cross sell, 2: up sell");
            $table->string("content");
            $table->integer("customer_template_id");
            $table->timestamps();
        });
        Schema::create('conversions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("offer_id");
            $table->timestamp("time");
            $table->string("type");
            $table->timestamps();
        });
        Schema::create('custom_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string("template_name");
            $table->string("theme");
            $table->string("background");
            $table->string("custom");
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('custom_templates');
        Schema::dropIfExists('conversions');
        Schema::dropIfExists('offers');
    }
}
