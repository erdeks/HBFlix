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

    public function index()
    {
        return view('admin.login');
    }

    public function verPeliculas()
    {
        //Cojemos todos los registros de la tabla multimedia que sean peliculas
        $peliculas = Multimedia::where('tipo', '0')->get();
        return view('admin.verPeliculas',array('arrayPelicula'=>$peliculas));
        // <img src="{{url('/imgPeliculas/pruebaBBDD.png')}}" alt="Image"/>
    }
    public function verPeli($id){
      //cojemos los datos de la pelicula que tenga el mismo id al que le pasamos
    	$peli= Multimedia::find($id);
      //Cojemos todos los registros de la tabla multimedia que sean peliculas
    	$peliculas = Multimedia::where('tipo', '0')->get();
      //Cojemos todos los generos
    	$contGenero = Genero::all();
      //cojemos todos los anños de lanzamiento
    	$contAn = ALanzamiento::all();
      return view('admin.verPeli', array('peli'=>$peli,'arrayPelicula'=>$peliculas,'arrayGenero'=>$contGenero,'arrayAn'=>$contAn));

    }

    public function crearPeliculas()
    {
      //cojemos todos los generos
    	$contGenero = Genero::all();
      //cojemos todos los años de lanzamiento
    	$contAn = ALanzamiento::all();
      return view('admin.crearPeliculas',array('arrayGenero'=>$contGenero,'arrayAn'=>$contAn));
    }

    public function guardarPeliculas(Request $request)
	{
	        //Creamos un objeto de la tabla multimedia
	    	  $peli= new Multimedia();
          //recojemos todos los datos que nos llegan de la view y los introducimos en la bbdd
	        $peli->titulo = $request->input('titulo');
	        $peli->genero = $request->input('genero');
	        $peli->aLanzamiento = $request->input('anyo');
	        $peli->resumen = $request->input('resumen');
	        $peli->rutaImg = '/peliculas/imgPeliculas/'.$request->input('titulo');
          $peli->rutaVid = '/peliculas/VideoPeliculas/'.$request->input('titulo');
          $peli->tipo=$request->input('tipo');
	    	  $peli->save();

          //guardamos el video en la carpeta para mostrarlo posteriormente
	        $video = Input::file("peli");
	        $vPath = public_path().'/peliculas/VideoPeliculas/';
	        $video->move($vPath, $request->input('titulo'));

          //guardamos la imagen en la carpeta para mostrarlo posteriormente
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
      //Cojemos los datos de la pelicula que queremos editar a partir del id que nos llega
    	$id = $request->input('idPeli');
    	$peli = Multimedia::find($id);

      //eliminamos la imagen de la carpeta
    	$eliminar = public_path().'/peliculas/imgPeliculas/'.$peli->titulo;
	    unlink($eliminar);

      //eliminamos el video de la carpeta
	    $eliminar2 = public_path().'/peliculas/VideoPeliculas/'.$peli->titulo;
	    unlink($eliminar2);

      //guardamos los nuevos datos en la bbs
    	$peli->titulo = $request->input('titulo');
	    $peli->genero = $request->input('genero');
	    $peli->rutaImg = $peli->rutaImg;
	    $peli->aLanzamiento = $request->input('anyo');
	    $peli->resumen = $request->input('resumen');

      $video = Input::file("peli");
      $vPath = public_path().'/peliculas/VideoPeliculas/';
      $video->move($vPath, $request->input('titulo'));

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
      //buscamos la pelicula que queremos eliminar
    	$peli = Multimedia::find($id);
      //eliminamos la imagen de la carpeta
    	$eliminar = public_path().'/peliculas/imgPeliculas/'.$peli->titulo;
	    unlink($eliminar);
      //eliminamos el video de la carpeta
      $eliminar = public_path().'/peliculas/VideoPeliculas/'.$peli->titulo;
      unlink($eliminar);
	    //$eliminar = public_path().'/peliculas/imgPeliculas/'.$peli->titulo;
	    //unlink($eliminar);
      //eliminamos la pelicula de la bbd
	    $peli->delete();

	    return redirect('admin/verPeliculas');
    }
    public function verSeries(){
      //Cojemos todos los registros de la tabla multimedia que sean series
      $arraySeries = Multimedia::where('tipo', '1')->get();
      return view('admin.verSeries',array('arraySeries'=>$arraySeries));
    }
    public function crearSeries(){
      $contGenero = Genero::all();
    	$contAn = ALanzamiento::all();
      return view('admin.crearSeries',array('arrayGenero'=>$contGenero,'arrayAn'=>$contAn));
    }
    //Funcion que recoje los datos que llegan de la view y los guardamos en la bbdd
    //y los videos e imagenes en sus respectivas carpetas
    public function guardarSeries(Request $request){
        $serie= new Multimedia();


        $serie->titulo = $request->input('titulo');
        $serie->genero = $request->input('genero');
        $serie->aLanzamiento = $request->input('anyo');
        $serie->resumen = $request->input('resumen');
        $serie->rutaImg = '/series/imgSeries/'.$request->input('titulo');
        $serie->rutaVid = 'vacio'; //cambiar a vacio y colocar en guardarEpisodio
        $serie->tipo=$request->input('tipo');
        $serie->save();



      $image = \Image::make(\Input::file('imgSerie'));
      $path = public_path().'/series/imgSeries/';
        $image->resize(250,356);
        $image->save($path.$request->input('titulo'));

      \Session::flash('flash_message', 'Serie guardada correctamente ');
      return redirect('admin/crearSeries');

    }
    //Cojemos todas las series de la base de datos
    public function crearEpisodios(){
      $arraySeries = Multimedia::where('tipo', '1')->get();
      return view('admin.crearEpisodios', array('arraySeries'=>$arraySeries));
    }
    //Funcion que recoje los datos de episodios que llegan de la view y los guardamos en la bbdd
    //y los videos e imagenes en sus respectivas carpetas
    public function guardarEpisodios(Request $request){

      $temporada = new Temporada();
      $temporada->idMultimedia = $request->input('id');
      $temporada->temporada = $request->input('temporada');
      $temporada->save();
      $te = Temporada::orderBy('id', 'DESC')->first();
      $serie = Multimedia::where('id', $temporada->idMultimedia)->first();
      $orden = 1;
      $length = sizeof($request->input('ep'));
      for($x=0;$x<$length;$x++){
        $ep = new Episodio();
        $ep->idTemporada = $te->id;
        $ep->orden = strval($orden);
        $ep->titulo = $request->input('ep')[$x];
        $ep->rutaVid = '/series/videoSeries/'.$serie->titulo.'_'.$request->input('ep')[$x];
        $ep->save();
        if(Input::file("vidSerie.$x")){
          $video = Input::file("vidSerie")[$x];
          $vPath = public_path().'/series/VideoSeries/';
          $video->move($vPath, $serie->titulo."_".$request->input('ep')[$x]);
        }
        $arraySeries = Multimedia::where('tipo', '1')->get();
        $orden++;
      }

      return view('admin.crearEpisodios', array('arraySeries'=>$arraySeries));
    }
    //funcion que muestra todas las series
    public function verSer($id){
    	$series= Multimedia::find($id);
      $idSerie = $series->id;
      $temporadas = Temporada::all();
      $arrayEpisodios = Episodio::all();
    	$serie = Multimedia::where('tipo', '0')->get();
    	$contGenero = Genero::all();
    	$contAn = ALanzamiento::all();

      return view('admin.verSer', array('series'=>$series,'serie'=>$serie,'arrayGenero'=>$contGenero,'arrayAn'=>$contAn, 'arrayEpisodios'=>$arrayEpisodios, 'temporadas'=>$temporadas));

    }
    //funcion que elimina las series los episodios y temporads
    public function eliminarSerie($id){
    	$serie = Multimedia::find($id);
      $idSerie = $serie->id;
      $temp = Temporada::select()->where('idMultimedia', $idSerie);
      foreach ($temp as $key => $t) {
        $idTemp = $t->id;
        $ep=Episodio::where('idTemporada', $idTemp);
        $eliminar = public_path().'/series/VideoSeries/'.$serie->titulo.'_'.$ep->titulo;
        unlink($eliminar);
      }
      Temporada::where('idMultimedia', $idSerie)->delete();
    	$eliminar = public_path().'/series/imgSeries/'.$serie->titulo;
	    unlink($eliminar);

	    //$eliminar = public_path().'/peliculas/imgPeliculas/'.$peli->titulo;
	    //unlink($eliminar);
	    $serie->delete();

	    return redirect('admin/verSeries');
    }
    //funcion que nos permite ver todos los usuarios
    public function verUsuarios()
    {
        $arrayUsuarios = User::all();
        return view('admin.verUsuarios',array('arrayUsuarios' => $arrayUsuarios));
    }
    //funcion que nos muestra todos los generos
    public function verGeneros(){
      $arrayGeneros = Genero::all();
      $countGeneros = Multimedia::select('genero')->get();
      return view('admin.verGeneros',array('arrayGeneros'=>$arrayGeneros, 'countGeneros'=>$countGeneros));
    }
    //funcion que nos permite crear generos
    public function crearGeneros(){
      $arrayGeneros = Genero::all();
      return view('admin.crearGeneros',array('arrayGeneros'=>$arrayGeneros));
    }
    //funcion que nos guarda los generos en la bbdd
    public function guardarGeneros(Request $request){
      $genero = new Genero();
      $genero->nombre = $request->input('genero');
      $genero->save();
      \Session::flash('flash_message', 'Genero guardado correctamente ');
      return redirect('admin/crearGeneros');
    }
    //funcion que nos muestra el genero por el cual filtramos
    public function mostrarGenero($id){
      $genero= Genero::find($id);
      return view('admin.editarGenero',array('genero'=>$genero));
    }
    //funcion que nos guarda los cambios del genero a editar
    public function editarGenero(Request $request){
      $id = $request->input('idGenero');
    	$genero = Genero::find($id);
      $genero->nombre = $request->input('genero');
      $genero->save();
    	return redirect('/admin/verGeneros/');
    }
    //funcion que elimina un genero de la bbdd
    public function eliminarGenero($id){
      $genero = Genero::find($id);
      $genero->delete();

	    return redirect('admin/verGeneros');
    }
    //funcion que muestra los años de lanzamiento
    public function verAnLan(){
      $arrayAnyos = ALanzamiento::all();
      $countAnyos = Multimedia::select('aLanzamiento')->get();
      return view('admin.verAnLan',array('arrayAnyos'=>$arrayAnyos, 'countAnyos'=>$countAnyos));
    }
    //funcion que crea un año de lanzamiento
    public function crearAnLan(){
      $arrayAnyos = ALanzamiento::all();
      return view('admin.crearAnLan',array('arrayAnyos'=>$arrayAnyos));
    }
    //funcion que guarda el año de lanzamiento en la bbdd
    public function guardarAnLan(Request $request){
      $anyo = new ALanzamiento();
      $anyo->aLanzamiento = $request->input('aLan');
      $anyo->save();
      \Session::flash('flash_message', 'Año guardado correctamente ');
      return redirect('admin/crearAnLan');
    }
    //funcion que muestra 1 año de lanzmiento
    public function mostrarAnLan($id){
      $anyo= ALanzamiento::find($id);
      return view('admin.editarAnLan',array('anyo'=>$anyo));
    }
    //fucion que guarda los cambios del año editado
    public function editarAnLan(Request $request){
      $id = $request->input('idAnLan');
    	$anyo = ALanzamiento::find($id);
      $anyo->aLanzamiento = $request->input('anLan');
      $anyo->save();
    	return redirect('/admin/verAnLan/');
    }
    //funcion que elimina un año de lanzamiento
    public function eliminarAnLan($id){
      $anyo = ALanzamiento::find($id);
      $anyo->delete();

	    return redirect('admin/verAnLan');
    }
    //funcion que muestra los codigos de la bbdd
    public function verCodigos(){
      $arrayCodigos = Codigo::all();
      return view('admin.verCodigos', array('arrayCodigos'=>$arrayCodigos));

    }
    //funcion que crea codigos
    public function crearCodigos(){
      $arrayCodigos = Codigo::all();
      return view('admin.crearCodigos', array('arrayCodigos'=>$arrayCodigos));
    }
    //funcion que guarda los codigos en la base de datos
    public function guardarCodigos(Request $request){
      $codigo = new Codigo();
      $codigo->codigo = $request->input('codigo');
      $codigo->usado = $request->input('usado');
      $codigo->save();
      \Session::flash('flash_message', 'Codigo creado correctamente ');
      return redirect('admin/crearCodigos');
    }
    public function inicio(){
      return view('admin.adminInicio');
    }
}
