<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('productname');
            $table->decimal('unitprice', $precision = 12, $scale = 0);
        });


        //insert
        DB::table('product')->insert(
                [
                    ['productname' => 'Leo Kripik Kentang', 'unitprice' => '1000'],
                    ['productname' => 'Piattoz Sapi Panggang', 'unitprice' => '1000'],
                    ['productname' => 'Twistiko Balado', 'unitprice' => '1000'],
                    ['productname' => 'Roma Biscuit Kelapa', 'unitprice' => '6500'],
                    ['productname' => 'Malkist Abon Sapi', 'unitprice' => '5000'],
                    ['productname' => 'Malkist Crackers', 'unitprice' => '5000'],
                    ['productname' => 'Monde Favourite', 'unitprice' => '60000'],
                    ['productname' => 'Monde Butter Cookies', 'unitprice' => '120000'],
                ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }

}
