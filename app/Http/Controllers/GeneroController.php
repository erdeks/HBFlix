<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;
use App\ALanzamiento;
use App\Multimedia;
class GeneroController extends Controller
{
  public function main(Request $request, $nombre)
  {
    $arrayPelis = Multimedia::where('genero', $nombre)->Where('tipo', '0')->get();
    $arraySeries = Multimedia::where('genero', $nombre)->Where('tipo', '1')->get();
    $genero=Genero::all();
    $aLanzamiento = ALanzamiento::all();
    return view('web.genero', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento, 'arrayPelis'=>$arrayPelis, 'arraySeries'=>$arraySeries));
  }
}
