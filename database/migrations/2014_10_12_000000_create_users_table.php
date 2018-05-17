<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('telefono')->default('10110010101');
            $table->string('password');
            $table->string('date');
            $table->string('admin')->default('0');//Si eres admin este campo cambiarlo a "1".
            $table->string('fav1')->default('0');
            $table->string('fav2')->default('0');
            $table->string('fav3')->default('0');
            $table->string('fav4')->default('0');
            $table->string('subs')->default('0');
            $table->string('subInicio')->default('0');
            $table->string('subFinal')->default('0');
            $table->string('imgPerfil')->default('0');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('mensaje', function (Blueprint $table) {
          $table->increments('id');
          $table->string('mensaje');
          $table->integer('idAdmin')->unsigned();
          $table->timestamps();
          $table->integer('idUser')->unsigned();
          $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('admin');
        Schema::dropIfExists('mensaje');
    }
}
