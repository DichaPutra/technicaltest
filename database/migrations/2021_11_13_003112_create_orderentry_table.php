<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderentryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderentry', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_orderlist');
            $table->foreign('id_orderlist')->references('id')->on('orderlist');
            $table->unsignedBigInteger('id_product')->unique();
            $table->foreign('id_product')->references('id')->on('product');
            $table->string('productname');
            $table->decimal('unitprice', $precision = 12, $scale = 0);
            $table->decimal('qty', $precision = 12, $scale = 0);
            $table->decimal('subtotal', $precision = 12, $scale = 0);
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
        Schema::dropIfExists('orderentry');
    }

}
