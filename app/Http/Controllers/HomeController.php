<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;
use App\ALanzamiento;
use App\Multimedia;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function menu(){
      $genero=Genero::all();
      $aLanzamiento = ALanzamiento::all();
      $arrayPelicula = Multimedia::inRandomOrder()->where('tipo', '0')->get();
      $arraySerie = Multimedia::inRandomOrder()->where('tipo', '1')->get();
      $estrenos = Multimedia::orderBy('aLanzamiento', 'DESC')->orderBy('created_at', 'DESC')->get();
      $ultimasAdd = Multimedia::orderBy('created_at', 'DESC')->get();
      return view('home', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento,'arrayPelicula'=>$arrayPelicula,'arraySerie'=>$arraySerie,'estrenos'=>$estrenos,'ultimasAdd'=>$ultimasAdd));
    }
    public function generos()
    {
        $generos = Genero::all();
        return response($generos);
    }
}
