<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Codigo;
use App\Genero;
use App\ALanzamiento;
use App\Http\Controllers\Auth;
class PerfilController extends Controller
{
  //devuelve los datos de usuario para mostrar en el perfil
  public function perfil()
 {
   $arrayUser = User::all();
   $genero=Genero::all();
   $aLanzamiento = ALanzamiento::all();
   return view('web.perfil', array('arrayUser'=>$arrayUser, 'arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento));
 }
 //funcion para editar perfil
 public function editarPerfil()
{
  $arrayUser = User::all();
  $genero=Genero::all();
  $aLanzamiento = ALanzamiento::all();
  return view('web.editarPerfil', array('arrayUser'=>$arrayUser, 'arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento));
}
  //funcion para actualizar los cambios del perfil en la bbdd
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
   //funcion para actualizar tus preferencias
   public function updateFavs(Request $request){

      $user = User::find($request->input('id'));

      $user->fav1 = $request->input('fav1');
      $user->fav2 = $request->input('fav2');
      $user->fav3 = $request->input('fav3');
      $user->fav4 = $request->input('fav4');
      $user->save();

      return redirect('/inicio/perfil');
   }
   //funcion para introducir codigo de subscripcion desde el perfil
   public function updateCode(Request $request){

      $code = $request->input('code');
      $codigoValido = Codigo::where('codigo', $code)->first();
        if($codigoValido){
          if($codigoValido->usado == "0"){
            $user = User::find($request->input('idC'));

            $codigo= Codigo::where('codigo', $code)->first();
            $codigo->usado = "1";
            $codigo->user = $user->email;
            $codigo->save();

            $dateIni = $user->subFinal;
            $date = strtotime("+30 day", strtotime($dateIni));
            $dataMas = date("Y-m-d", $date);
            $user->subFinal = $dataMas;
            $user->save();
          }else{
            \Session::flash('flash_message', 'código ya usado');
          }
        }else{
          \Session::flash('flash_message', 'Código incorrecto!');
        }
    return redirect('/inicio/perfil');
   }

}
