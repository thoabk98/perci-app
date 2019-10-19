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
        Schema::create("users", function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->tinyInteger('admin');
            $table->string('password');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string("client_id");
            $table->string("client_secret");
            $table->string("auth_token");
            $table->string("store_hash");
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id");
            $table->string("base_product_id");
            $table->tinyInteger("type")->comment("1: cross sell, 2: up sell");
            $table->tinyInteger("position")->comment("1: add to cart, 2: before checkout, 3: after checkout");
            $table->string("content")->nullable();
            $table->integer("customer_template_id")->nullable();
            $table->timestamps();
        });
        Schema::create('offer_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("offer_id");
            $table->string("offer_product_id");
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
        Schema::dropIfExists('offer_items');
    }
}
