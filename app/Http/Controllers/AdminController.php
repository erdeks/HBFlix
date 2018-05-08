<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Pelicula;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verPeliculas()
    {
        return view('admin.verPeliculas');
    }

    public function crearPeliculas()
    {
        return view('admin.crearPeliculas');
    }

    public function guardarPeliculas(Request $request)
    {
        //TO-DO guardar los datos-> https://styde.net/sistema-de-archivos-y-almacenamiento-en-laravel-5/
        	$peli= new Pelicula();
        //Si el campo esta vacio no crea post

            $peli->titulo = $request->input('titulo');
            $peli->idGenero = $request->input('genero');
            $peli->fechaLanzamiento = $request->input('anyo');
            $peli->resumen = $request->input('resumen');
        	$coment->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verUsuarios()
    {
        return view('admin.verUsuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function login(Request $request, $email, $pass){
      /*$userdata = array(
            'email' => Input::get('email'),
            'pass'=> Input::get('password')
      );
      if(Auth::attempt($userdata)){
        return view('admin.adminInicio');
      }  */
      $admin=Admin::where('email', $email);
      
      if($admin->password==$pass){
        return view('admin.adminInicio');
      }
    }
    public function inicio(){
      return view('admin.adminInicio');
    }
}
