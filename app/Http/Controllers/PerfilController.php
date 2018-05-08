<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Genero;
class PerfilController extends Controller
{
  public function perfil()
 {
   $arrayUser = User::all();
   $genero=Genero::all();
   return view('web.perfil', array('arrayUser'=>$arrayUser, 'arrayGenero'=>$genero));
 }
}
