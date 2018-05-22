<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Genero;
use App\ALanzamiento;
class PerfilController extends Controller
{
  public function perfil()
 {
   $arrayUser = User::all();
   $genero=Genero::all();
   $aLanzamiento = ALanzamiento::all();
   return view('web.perfil', array('arrayUser'=>$arrayUser, 'arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento));
 }
 public function editarPerfil()
{
  $arrayUser = User::all();
  $genero=Genero::all();
  $aLanzamiento = ALanzamiento::all();
  return view('web.editarPerfil', array('arrayUser'=>$arrayUser, 'arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento));
}
public function update(Request $request){
       $user= User::find($request->input('id'));
       $user->id = $request->input('id');
       $user->name = $request->input('name');
       $user->apellido = $request->input('apellido');
       $user->email = $request->input('email');
       $user->date = $request->input('fechaNac');
       $user->telefono = $request->input('telefono');
       $user->password=$request->input('password');
       $user->save();
       $arrayUser = User::all();
       $genero=Genero::all();
       $aLanzamiento = ALanzamiento::all();
       return view('web.perfil', array('arrayUser'=>$arrayUser, 'arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento));
   }
}
