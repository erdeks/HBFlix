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
      Schema::create('multimedia', function (Blueprint $table) {
        $table->increments('id');
        $table->string('genero');
        $table->string('aLanzamiento');
        $table->string('titulo');
        $table->text('resumen');
        $table->string('rutaImg');
        $table->string('rutaVid');
        $table->string('tipo');
        $table->timestamps();
      });
      Schema::create('temporadas', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idMultimedia')->unsigned();
        $table->string('temporada');
        $table->timestamps();
        $table->foreign('idMultimedia')->references('id')->on('multimedia')->onDelete('cascade');
      });
      Schema::create('episodios', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idTemporada')->unsigned();
        $table->string('numeroEpisodio');
        $table->timestamps();
        $table->foreign('idTemporada')->references('id')->on('temporadas')->onDelete('cascade');
      });
      Schema::create('actor', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->string('apellido');
        $table->string('nacionalidad');
        $table->timestamps();
      });
      Schema::create('actorMultimedia', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idActor')->unsigned();
        $table->foreign('idActor')->references('id')->on('actor')->onDelete('cascade');
        $table->integer('idMultimedia')->unsigned();
        $table->foreign('idMultimedia')->references('id')->on('multimedia')->onDelete('cascade');
        $table->timestamps();
      });
      Schema::create('generos', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->timestamps();
      });
      Schema::create('a_lanzamientos', function (Blueprint $table) {
        $table->increments('id');
        $table->string('aLanzamiento');
        $table->timestamps();
      });
      Schema::create('favoritos', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idUser')->unsigned();
        $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
        $table->integer('idMultimedia')->unsigned();
        $table->foreign('idMultimedia')->references('id')->on('multimedia')->onDelete('cascade');
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
