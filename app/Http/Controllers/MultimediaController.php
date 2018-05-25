<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Multimedia;
use App\Genero;
use App\User;
use App\ALanzamiento;
use App\Codigo;
use App\Temporada;
use App\Episodio;

class MultimediaController extends Controller
{
  public function verPelicula($id){

    $peli= Multimedia::find($id);
    $peliculas = Multimedia::where('tipo', '0')->get();
    $contGenero = Genero::all();
    $contAn = ALanzamiento::all();
    $aLanzamiento = ALanzamiento::all();
    return view('web.verPelicula', array('peli'=>$peli,'arrayPelicula'=>$peliculas,'arrayGenero'=>$contGenero,'arrayAn'=>$contAn, 'arrayLanz'=>$aLanzamiento));

  }
  public function verSerie($id){
    $series= Multimedia::find($id);
    $idSerie = $series->id;
    $temporadas = Temporada::all();
    $arrayEpisodios = Episodio::all();
    $serie = Multimedia::where('tipo', '0')->get();
    $contGenero = Genero::all();
    $contAn = ALanzamiento::all();
    $aLanzamiento = ALanzamiento::all();
    return view('web.verSerie', array('series'=>$series,'serie'=>$serie,'arrayGenero'=>$contGenero,'arrayAn'=>$contAn, 'arrayEpisodios'=>$arrayEpisodios, 'temporadas'=>$temporadas, 'arrayLanz'=>$aLanzamiento));

  }
}
