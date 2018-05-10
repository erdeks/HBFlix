<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;
use App\ALanzamiento;
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
      return view('home', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento));
    }
}
