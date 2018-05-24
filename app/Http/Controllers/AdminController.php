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
use App\Codigo;
use App\Temporada;
use App\Episodio;

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
      $eliminar = public_path().'/peliculas/VideoPeliculas/'.$serie->titulo;
      unlink($eliminar);
	    //$eliminar = public_path().'/peliculas/imgPeliculas/'.$peli->titulo;
	    //unlink($eliminar);
	    $peli->delete();

	    return redirect('admin/verPeliculas');
    }
    public function verSeries(){
      $arraySeries = Multimedia::where('tipo', '1')->get();
      return view('admin.verSeries',array('arraySeries'=>$arraySeries));
    }
    public function crearSeries(){
      $contGenero = Genero::all();
    	$contAn = ALanzamiento::all();
      return view('admin.crearSeries',array('arrayGenero'=>$contGenero,'arrayAn'=>$contAn));
    }
    public function guardarSeries(Request $request){
        $serie= new Multimedia();
        //Si el campo esta vacio no crea post

        $serie->titulo = $request->input('titulo');
        $serie->genero = $request->input('genero');
        $serie->aLanzamiento = $request->input('anyo');
        $serie->resumen = $request->input('resumen');
        $serie->rutaImg = '/series/imgSeries/'.$request->input('titulo');
        $serie->rutaVid = '/series/VideoSeries/'.$request->input('titulo'); //cambiar a vacio y colocar en guardarEpisodio
        $serie->tipo=$request->input('tipo');
        $serie->save();

        $video = Input::file("vidSerie");
        $vPath = public_path().'/series/VideoSeries/';
        $video->move($vPath, $request->input('titulo'));

      $image = \Image::make(\Input::file('imgSerie'));
      $path = public_path().'/series/imgSeries/';
        $image->resize(250,356);
        $image->save($path.$request->input('titulo'));

      \Session::flash('flash_message', 'Serie guardada correctamente ');
      return redirect('admin/crearSeries');

    }
    public function crearEpisodios(){
      $arraySeries = Multimedia::where('tipo', '1')->get();
      return view('admin.crearEpisodios', array('arraySeries'=>$arraySeries));
    }
    public function guardarEpisodios(Request $request){

      $temporada = new Temporada();
      $temporada->idMultimedia = $request->input('id');
      $temporada->temporada = $request->input('temporada');
      $temporada->save();
      $te = Temporada::orderBy('id', 'DESC')->first();

      $orden = 1;
      foreach( $request->input('ep') as $v ) {
        $ep = new Episodio();
        $ep->idTemporada = $te->id;
        $ep->orden = strval($orden);
        $ep->titulo = $v;
        $ep->save();
        $orden++;
      }
      $arraySeries = Multimedia::where('tipo', '1')->get();
      return view('admin.crearEpisodios', array('arraySeries'=>$arraySeries));
    }
    public function verSer($id){
    	$series= Multimedia::find($id);
      $idSerie = $series->id;
      $temporadas = Temporada::all();
      $arrayEpisodios = Episodio::all();
    	$serie = Multimedia::where('tipo', '0')->get();
    	$contGenero = Genero::all();
    	$contAn = ALanzamiento::all();
      foreach($temporadas as $key=> $temporada){
        \Log::info('sdkais'.$temporada);
      }

      return view('admin.verSer', array('series'=>$series,'serie'=>$serie,'arrayGenero'=>$contGenero,'arrayAn'=>$contAn, 'arrayEpisodios'=>$arrayEpisodios, 'temporadas'=>$temporadas));

    }
    public function eliminarSerie($id){
    	$serie = Multimedia::find($id);
      $idSerie = $serie->id;
      $temp = Temporada::select()->where('idMultimedia', $idSerie);
      foreach ($temp as $key => $t) {
        $idTemp = $t->id;
        Episodio::where('idTemporada', $idTemp)->delete();
      }
      Temporada::where('idMultimedia', $idSerie)->delete();
    	$eliminar = public_path().'/series/imgSeries/'.$serie->titulo;
	    unlink($eliminar);
      $eliminar = public_path().'/series/VideoSeries/'.$serie->titulo;
      unlink($eliminar);
	    //$eliminar = public_path().'/peliculas/imgPeliculas/'.$peli->titulo;
	    //unlink($eliminar);
	    $serie->delete();

	    return redirect('admin/verSeries');
    }
    public function verUsuarios()
    {
        $arrayUsuarios = User::all();
        return view('admin.verUsuarios',array('arrayUsuarios' => $arrayUsuarios));
    }
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
      \Session::flash('flash_message', 'Genero guardado correctamente ');
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
      \Session::flash('flash_message', 'Año guardado correctamente ');
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
    public function verCodigos(){
      $arrayCodigos = Codigo::all();
      return view('admin.verCodigos', array('arrayCodigos'=>$arrayCodigos));

    }
    public function crearCodigos(){
      $arrayCodigos = Codigo::all();
      return view('admin.crearCodigos', array('arrayCodigos'=>$arrayCodigos));
    }
    public function guardarCodigos(Request $request){
      $codigo = new Codigo();
      $codigo->codigo = $request->input('codigo');
      $codigo->usado = $request->input('usado');
      $codigo->save();
      \Session::flash('flash_message', 'Codigo creado correctamente ');
      return redirect('admin/crearCodigos');
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
