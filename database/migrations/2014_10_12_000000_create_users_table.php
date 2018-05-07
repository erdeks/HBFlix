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
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('mensaje', function (Blueprint $table) {
          $table->increments('id');
          $table->string('mensaje');
          $table->integer('idAdmin')->unsigned();
          $table->foreign('idAdmin')->references('id')->on('admin')->onDelete('cascade');
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
