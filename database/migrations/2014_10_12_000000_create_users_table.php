<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
        });

        //insert
        DB::table('users')->insert(
                [
                    ['name' => 'Akun User', 'username' => 'user', 'password' =>Hash::make('123123123'), 'role'=>'admin'],
                    ['name' => 'Akun Admin', 'username' => 'admin', 'password' =>Hash::make('123123123'), 'role'=>'admin'],
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
        Schema::dropIfExists('users');
    }

}
