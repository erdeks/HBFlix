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
            $table->string('password');
            $table->string('date');
            $table->integer('idMensaje');
            $table->boolean('admin');
            $table->integer('idFavorito');
            $table->rememberToken();
            $table->timestamps();
            //$table->foreign('idMensaje')->references('id')->on('mensaje')->onDelete('cascade');
            //$table->foreign('idFavorito')->references('id')->on('favorito')->onDelete('cascade');
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
    }
}
