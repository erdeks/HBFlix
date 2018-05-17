<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;
use App\ALanzamiento;
use App\Pelicula;
class GeneroController extends Controller
{
  public function main(Request $request, $nombre)
  {
    $pelicula = Multimedia::where('genero', $nombre)->orWhere('tipo', '0')->get();
    $genero=Genero::all();
    $aLanzamiento = ALanzamiento::all();
    return view('web.genero', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento, 'arrayPelis'=>$pelicula));
  }
}
