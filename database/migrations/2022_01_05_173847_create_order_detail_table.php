<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->notnull();
            $table->integer('sanpham_id')->notnull();
            $table->integer('soluong')->notnull();
            $table->float('gia')->notnull();
            $table->timestamps();
            $table->foreign('sanpham_id')->references('id')->on('sanpham');
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
