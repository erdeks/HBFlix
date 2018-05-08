<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HBFlixTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pelicula', function (Blueprint $table) {
        $table->increments('id');
        $table->string('idGenero');
        $table->string('fechaLanzamiento');
        $table->string('titulo');
        $table->text('resumen');
        $table->binary('imagen');
      });
      Schema::create('serie', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idGenero');
        $table->date('fechaLanzamiento');
        $table->string('titulo');
        $table->text('resumen');
        $table->binary('imagen');
      });
      Schema::create('actor', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->string('apellido');
        $table->string('nacionalidad');
      });
      Schema::create('director', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->string('apellido');
        $table->string('nacionalidad');
      });
      Schema::create('actorSeriesPeliculas', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idActor')->unsigned();
        $table->foreign('idActor')->references('id')->on('actor')->onDelete('cascade');
        $table->integer('idSerie')->unsigned();
        $table->foreign('idSerie')->references('id')->on('serie')->onDelete('cascade');
        $table->integer('idPelicula')->unsigned();
        $table->foreign('idPelicula')->references('id')->on('pelicula')->onDelete('cascade');
      });
      Schema::create('directorSeriesPeliculas', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idDirector')->unsigned();
        $table->foreign('idDirector')->references('id')->on('director')->onDelete('cascade');
        $table->integer('idSerie')->unsigned();
        $table->foreign('idSerie')->references('id')->on('serie')->onDelete('cascade');
        $table->integer('idPelicula')->unsigned();
        $table->foreign('idPelicula')->references('id')->on('pelicula')->onDelete('cascade');
      });
      Schema::create('genero', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->integer('idSerie')->unsigned();
        $table->foreign('idSerie')->references('id')->on('serie')->onDelete('cascade');
        $table->integer('idPelicula')->unsigned();
        $table->foreign('idPelicula')->references('id')->on('pelicula')->onDelete('cascade');
      });
      Schema::create('favorito', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idUser')->unsigned();
        $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
        $table->integer('idPelicula')->unsigned();
        $table->foreign('idPelicula')->references('id')->on('pelicula')->onDelete('cascade');
        $table->integer('idSerie')->unsigned();
        $table->foreign('idSerie')->references('id')->on('serie')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('genero');
      Schema::dropIfExists('serie');
      Schema::dropIfExists('pelicula');
      Schema::dropIfExists('actor');
      Schema::dropIfExists('director');
      Schema::dropIfExists('favorito');
      Schema::dropIfExists('directorSeriesPeliculas');
      Schema::dropIfExists('actorSeriesPeliculas');
    }
}
