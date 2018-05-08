<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Pelicula;
use App\Genero;
use Input;
use App\ALanzamiento;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
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
        $peliculas = Pelicula::all();
        return view('admin.verPeliculas',array('arrayPelicula'=>$peliculas));
        // <img src="{{url('/imgPeliculas/pruebaBBDD.png')}}" alt="Image"/>
    }

    public function crearPeliculas()
    {
    	$contGenero = Genero::all();
    	$contAn = ALanzamiento::all();
        return view('admin.crearPeliculas',array('arrayGenero'=>$contGenero,'arrayAn'=>$contAn));
    }

    public function guardarPeliculas(Request $request)
    {
        //TO-DO guardar los datos-> https://styde.net/sistema-de-archivos-y-almacenamiento-en-laravel-5/
        	if($idImg = Pelicula::select()->orderBy('id', 'desc')->first()){
	        	$idImg = $idImg->id + 1;
	        	$peli= new Pelicula();
	        //Si el campo esta vacio no crea post

	            $peli->titulo = $request->input('titulo');
	            $peli->genero = $request->input('genero');
	            $peli->aLanzamiento = $request->input('anyo');
	            $peli->resumen = $request->input('resumen');
	            $peli->rutaImg = '/peliculas/imgPeliculas/'.$idImg;
	        	$peli->save();

                $video = Input::file("peli");
                $vPath = public_path().'/peliculas/VideoPeliculas/';
                $video->move($vPath);

	        	$image = \Image::make(\Input::file('imgPeli'));
	        	$path = public_path().'/peliculas/imgPeliculas/';
                $image->resize(250,356);
                $image->save($path.$idImg);
                //$image->save($path.$file->getClientOriginalName());
	        	



	        	\Session::flash('flash_message', 'Película guardada correctamente');
	        	return redirect('admin/crearPeliculas');
	        }else{
	        	$peli= new Pelicula();
	        //Si el campo esta vacio no crea post

	            $peli->titulo = $request->input('titulo');
	            $peli->genero = $request->input('genero');
	            $peli->aLanzamiento = $request->input('anyo');
	            $peli->resumen = $request->input('resumen');
	            $peli->rutaImg = '/peliculas/imgPeliculas/1';
	        	$peli->save();

	        	$file = Input::file('imgPeli');
	        	$image = \Image::make(\Input::file('imgPeli'));
	        	$path = public_path().'/peliculas/imgPeliculas/';
	        	$image->resize(200,200);
	        	$image->save($path."1");
	        	
	        	\Session::flash('flash_message', 'Película guardada correctamente');
	        	return redirect('admin/crearPeliculas');
	        }
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
