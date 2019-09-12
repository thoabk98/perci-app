<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableThuChi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->default(1);
            $table->tinyInteger('type')->comment('1-thu, 2-chi');
            $table->string('amount')->comment('số tiền');
            $table->string('content')->comment('noi dung thu/chi');
            $table->integer('user_id')->nullable()->comment('người nhận/ng chuyển');
            $table->integer('admin_id')->comment('admin');
            $table->string('note')->nullable()->comment('hóa đơn, tham chiếu...');
            $table->date('date');
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
        Schema::dropIfExists('payments');
    }
}
