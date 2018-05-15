<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Multimedia;
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
        $peliculas = Multimedia::where('tipo', '0')->get();
        return view('admin.verPeliculas',array('arrayPelicula'=>$peliculas));
        // <img src="{{url('/imgPeliculas/pruebaBBDD.png')}}" alt="Image"/>
    }
    public function verPeli($id){

    	$peli= Multimedia::find($id);
    	$peliculas = Multimedia::where('tipo', '0')->get();
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
	    	$peli= new Multimedia();
	    //Si el campo esta vacio no crea post

	        $peli->titulo = $request->input('titulo');
	        $peli->genero = $request->input('genero');
	        $peli->aLanzamiento = $request->input('anyo');
	        $peli->resumen = $request->input('resumen');
	        $peli->rutaImg = '/peliculas/imgPeliculas/'.$request->input('titulo');
          $peli->rutaVid = '/peliculas/VideoPeliculas/'.$request->input('titulo');
          $peli->tipo=$request->input('tipo');
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

    }

    public function editarPeli(Request $request)
    {
    	$id = $request->input('idPeli');
    	$peli = Multimedia::find($id);

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

    	$peliculas = Multimedia::where('tipo', '0');
    	return redirect('/admin/verPeli/'. $id);

    }

    public function eliminarPeli($id){
    	$peli = Multimedia::find($id);

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
    public function verGeneros(){
      $arrayGeneros = Genero::all();
      $countGeneros = Multimedia::select('genero')->get();
      return view('admin.verGeneros',array('arrayGeneros'=>$arrayGeneros, 'countGeneros'=>$countGeneros));
    }
    public function crearGeneros(){
      $arrayGeneros = Genero::all();
      return view('admin.crearGeneros',array('arrayGeneros'=>$arrayGeneros));
    }
    public function guardarGeneros(Request $request){
      $genero = new Genero();
      $genero->nombre = $request->input('genero');
      $genero->save();
      return redirect('admin/crearGeneros');
    }
    public function mostrarGenero($id){
      $genero= Genero::find($id);
      return view('admin.editarGenero',array('genero'=>$genero));
    }
    public function editarGenero(Request $request){
      $id = $request->input('idGenero');
    	$genero = Genero::find($id);
      $genero->nombre = $request->input('genero');
      $genero->save();
    	return redirect('/admin/verGeneros/');
    }
    public function eliminarGenero($id){
      $genero = Genero::find($id);
      $genero->delete();

	    return redirect('admin/verGeneros');
    }
    public function verAnLan(){
      $arrayAnyos = ALanzamiento::all();
      $countAnyos = Multimedia::select('aLanzamiento')->get();
      return view('admin.verAnLan',array('arrayAnyos'=>$arrayAnyos, 'countAnyos'=>$countAnyos));
    }
    public function crearAnLan(){
      $arrayAnyos = ALanzamiento::all();
      return view('admin.crearAnLan',array('arrayAnyos'=>$arrayAnyos));
    }
    public function guardarAnLan(Request $request){
      $anyo = new ALanzamiento();
      $anyo->aLanzamiento = $request->input('aLan');
      $anyo->save();
      return redirect('admin/crearAnLan');
    }
    public function mostrarAnLan($id){
      $anyo= ALanzamiento::find($id);
      return view('admin.editarAnLan',array('anyo'=>$anyo));
    }
    public function editarAnLan(Request $request){
      $id = $request->input('idAnLan');
    	$anyo = ALanzamiento::find($id);
      $anyo->aLanzamiento = $request->input('anLan');
      $anyo->save();
    	return redirect('/admin/verAnLan/');
    }
    public function eliminarAnLan($id){
      $anyo = ALanzamiento::find($id);
      $anyo->delete();

	    return redirect('admin/verAnLan');
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
