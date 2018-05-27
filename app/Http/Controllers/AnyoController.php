<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;
use App\ALanzamiento;
use App\Multimedia;
class AnyoController extends Controller
{
  //funcion que muestra los años para la pagina de años
  public function anyos(Request $request, $anyo)
  {
    $arrayPelis = Multimedia::where('aLanzamiento', $anyo)->Where('tipo', '0')->get();
    $arraySeries = Multimedia::where('aLanzamiento', $anyo)->Where('tipo', '1')->get();
    $genero=Genero::all();
    $aLanzamiento = ALanzamiento::all();
    return view('web.anyoLanzamiento', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento, 'arrayPelis'=>$arrayPelis, 'arraySeries'=>$arraySeries));
  }
}
