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
      Schema::create('peliculas', function (Blueprint $table) {
        $table->increments('id');
        $table->string('genero');
        $table->string('aLanzamiento');
        $table->string('titulo');
        $table->text('resumen');
        $table->string('rutaImg');
        $table->timestamps();
      });
      Schema::create('series', function (Blueprint $table) {
        $table->increments('id');
        $table->string('genero');
        $table->string('aLanzamiento');
        $table->string('titulo');
        $table->text('resumen');
        $table->binary('imagen');
        $table->timestamps();
      });
      Schema::create('actor', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->string('apellido');
        $table->string('nacionalidad');
        $table->timestamps();
      });
      Schema::create('director', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->string('apellido');
        $table->string('nacionalidad');
        $table->timestamps();
      });
      Schema::create('actorSeriesPeliculas', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idActor')->unsigned();
        $table->foreign('idActor')->references('id')->on('actor')->onDelete('cascade');
        $table->integer('idSerie')->unsigned();
        $table->foreign('idSerie')->references('id')->on('series')->onDelete('cascade');
        $table->integer('idPelicula')->unsigned();
        $table->foreign('idPelicula')->references('id')->on('peliculas')->onDelete('cascade');
        $table->timestamps();
      });
      Schema::create('directorSeriesPeliculas', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idDirector')->unsigned();
        $table->foreign('idDirector')->references('id')->on('director')->onDelete('cascade');
        $table->integer('idSerie')->unsigned();
        $table->foreign('idSerie')->references('id')->on('series')->onDelete('cascade');
        $table->integer('idPelicula')->unsigned();
        $table->foreign('idPelicula')->references('id')->on('peliculas')->onDelete('cascade');
        $table->timestamps();
      });
      Schema::create('generos', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->timestamps();
      });
      Schema::create('aLanzamientos', function (Blueprint $table) {
        $table->increments('id');
        $table->string('aLanzamiento');
        $table->timestamps();
      });
      Schema::create('favorito', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idUser')->unsigned();
        $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
        $table->integer('idPelicula')->unsigned();
        $table->foreign('idPelicula')->references('id')->on('peliculas')->onDelete('cascade');
        $table->integer('idSerie')->unsigned();
        $table->foreign('idSerie')->references('id')->on('series')->onDelete('cascade');
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
