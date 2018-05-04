<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class PerfilController extends Controller
{
  public function perfil()
 {
   $arrayUser = User::all();
   return view('web.perfil', array('arrayUser'=>$arrayUser));
 }
}
