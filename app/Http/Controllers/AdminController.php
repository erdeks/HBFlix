<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Pelicula;
use App\Genero;
use Input;
use App\User;
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
    public function verPeli($id){

    	$peli= Pelicula::find($id);
    	$peliculas = Pelicula::all();
    	$contGenero = Genero::all();
    	$contAn = ALanzamiento::all();
        return view('admin.verPeli', array('peli'=>$peli,'arrayPelicula'=>$peliculas,'arrayGenero'=>$contGenero,'arrayAn'=>$contAn));

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
	    	$peli= new Pelicula();
	    //Si el campo esta vacio no crea post

	        $peli->titulo = $request->input('titulo');
	        $peli->genero = $request->input('genero');
	        $peli->aLanzamiento = $request->input('anyo');
	        $peli->resumen = $request->input('resumen');
	        $peli->rutaImg = '/peliculas/imgPeliculas/'.$request->input('titulo');
	    	$peli->save();

	        $video = Input::file("peli");
	        $vPath = public_path().'/peliculas/VideoPeliculas/';
	        $video->move($vPath, $request->input('titulo'));

	    	$image = \Image::make(\Input::file('imgPeli'));
	    	$path = public_path().'/peliculas/imgPeliculas/';
	        $image->resize(250,356);
	        $image->save($path.$request->input('titulo'));
	        //$image->save($path.$file->getClientOriginalName());
	    	



	    	\Session::flash('flash_message', 'Película guardada correctamente ');
	    	return redirect('admin/crearPeliculas');
	    }else{
	    	$peli= new Pelicula();
	    //Si el campo esta vacio no crea post

	        $peli->titulo = $request->input('titulo');
	        $peli->genero = $request->input('genero');
	        $peli->aLanzamiento = $request->input('anyo');
	        $peli->resumen = $request->input('resumen');
	        $peli->rutaImg = '/peliculas/imgPeliculas/'.$request->input('titulo');
	    	$peli->save();

	    	$file = Input::file('imgPeli');
	    	$image = \Image::make(\Input::file('imgPeli'));
	    	$path = public_path().'/peliculas/imgPeliculas/';
	    	$image->resize(250,375);
	    	$image->save($path.$request->input('titulo'));
	    	
	    	\Session::flash('flash_message', 'Película guardada correctamente');
	    	return redirect('admin/crearPeliculas');
	    }
    }

    public function editarPeli(Request $request)
    {
    	$id = $request->input('idPeli');
    	$peli = Pelicula::find($id);

    	$eliminar = public_path().'/peliculas/imgPeliculas/'.$peli->titulo;
	    unlink($eliminar);

	    $eliminar2 = public_path().'/peliculas/VideoPeliculas/'.$peli->titulo;
	    unlink($eliminar2);

    	$peli->titulo = $request->input('titulo');
	    $peli->genero = $request->input('genero');
	    $peli->rutaImg = $peli->rutaImg;
	    $peli->aLanzamiento = $request->input('anyo');
	    $peli->resumen = $request->input('resumen');


	    $file = Input::file('imgPeli');
		$image = \Image::make(\Input::file('imgPeli'));
		$path = public_path().'/peliculas/imgPeliculas/';
		$image->resize(250,375);
		$image->save($path.$request->input('titulo'));

	    $peli->save();

    	$peliculas = Pelicula::all();
    	return redirect('/admin/verPeli/'. $id);

    }

    public function eliminarPeli($id){
    	$peli = Pelicula::find($id);

    	$eliminar = public_path().'/peliculas/imgPeliculas/'.$peli->titulo;
	    unlink($eliminar);

	    //$eliminar = public_path().'/peliculas/imgPeliculas/'.$peli->titulo;
	    //unlink($eliminar);
	    $peli->delete();

	    return redirect('admin/verPeliculas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verUsuarios()
    {
        $arrayUsuarios = User::all();
        return view('admin.verUsuarios',array('arrayUsuarios' => $arrayUsuarios));
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
