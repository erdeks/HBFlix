<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;
use App\ALanzamiento;
use App\Multimedia;
use App\User;
use App\Codigo;
use Illuminate\Support\Facades\Auth;
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

      $estrenosSer = Multimedia::where('tipo', '1')->orderBy('aLanzamiento', 'DESC')->orderBy('created_at', 'DESC')->get();
      $estrenosPeli = Multimedia::where('tipo', '0')->orderBy('aLanzamiento', 'DESC')->orderBy('created_at', 'DESC')->get();
      $ultimasAddPeli = Multimedia::where('tipo', '0')->orderBy('created_at', 'DESC')->get();
      $ultimasAddSer = Multimedia::where('tipo', '1')->orderBy('created_at', 'DESC')->get();
      $user1 = User::find(Auth::user()->id);
      $dataActual = explode("-",date("Y-m-d"));
      //Dia
      $dataActual[2];
      //Mes
      $dataActual[1];
      //Año
      $dataActual[0];

      $dataFinal = explode("-",$user1->subFinal);
      //Dia
      $dataFinal[2];
      //Mes
      $dataFinal[1];
      //Año
      $dataFinal[0];

      if($dataActual[0] <= $dataFinal[0]){
	      if($dataFinal[1] >= $dataActual[1]){
	        if($dataFinal[1] > $dataActual[1] && $dataFinal[2] < $dataActual[2]){
	          $dataSumada = $dataFinal[2] + 30;
	        }else{
	          $dataSumada = $dataFinal[2];
	        }
	        if(intval($dataFinal[2]) > intval($dataActual[2])){
	          $fechaFinal = intval($dataSumada) - intval($dataActual[2]);
	          if($fechaFinal <= 5 && $dataFinal[1] == $dataActual[1]){
	            //te quedan menos de 5 dias exactamente
	            $msg = "0";
	            return view('home', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento,'arrayPelicula'=>$arrayPelicula,'arraySerie'=>$arraySerie,'estrenosPeli'=>$estrenosPeli,'ultimasAddPeli'=>$ultimasAddPeli, 'estrenosSer'=>$estrenosSer,'ultimasAddSer'=>$ultimasAddSer,'anyo'=>$msg,'xyz'=>$fechaFinal));
	          }else{
	            //todo correcto
	            $msg = "1";
	            return view('home', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento,'arrayPelicula'=>$arrayPelicula,'arraySerie'=>$arraySerie,'estrenosPeli'=>$estrenosPeli,'ultimasAddPeli'=>$ultimasAddPeli, 'estrenosSer'=>$estrenosSer,'ultimasAddSer'=>$ultimasAddSer,'anyo'=>$msg));
	          }
	        }
	        if($dataFinal[1] == $dataActual[1] && $dataFinal[2] < $dataActual[2]){//1 para un mes mas y dia menos //otro para un mes igual y dia menos
	          $msg = "2";
	          $user1->subs = "0";
	          $user1->save();
	            return view('home', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento,'arrayPelicula'=>$arrayPelicula,'arraySerie'=>$arraySerie,'estrenosPeli'=>$estrenosPeli,'ultimasAddPeli'=>$ultimasAddPeli, 'estrenosSer'=>$estrenosSer,'ultimasAddSer'=>$ultimasAddSer,'anyo'=>$msg));
	          }else{
	            $msg = "1";
	            $user1->subs = "1";
	            $user1->save();
	            return view('home', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento,'arrayPelicula'=>$arrayPelicula,'arraySerie'=>$arraySerie,'estrenosPeli'=>$estrenosPeli,'ultimasAddPeli'=>$ultimasAddPeli, 'estrenosSer'=>$estrenosSer,'ultimasAddSer'=>$ultimasAddSer,'anyo'=>$msg));

	          }

	      }elseif($dataFinal[1] < $dataActual[1]){
	        $msg = "2";
	        $user1->subs = "0";
	        $user1->save();
	        return view('home', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento,'arrayPelicula'=>$arrayPelicula,'arraySerie'=>$arraySerie,'estrenosPeli'=>$estrenosPeli,'ultimasAddPeli'=>$ultimasAddPeli, 'estrenosSer'=>$estrenosSer,'ultimasAddSer'=>$ultimasAddSer,'anyo'=>$msg));
	      }else{//te falta esto
	        $user1 = User::find(Auth::user()->id);
	        $user1->subs = "0";
	        $user1->save();
	      }
	  }else{
	  	$msg = "2";
        $user1->subs = "0";
        $user1->save();
        return view('home', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento,'arrayPelicula'=>$arrayPelicula,'arraySerie'=>$arraySerie,'estrenosPeli'=>$estrenosPeli,'ultimasAddPeli'=>$ultimasAddPeli, 'estrenosSer'=>$estrenosSer,'ultimasAddSer'=>$ultimasAddSer,'anyo'=>$msg));

	  }

    }
    public function generos()
    {
        $generos = Genero::all();
        return response($generos);
    }

    public function upDateCode(Request $request)
    {
      $code = $request->input('validad_code');
      $codigoValido = Codigo::where('codigo', $code)->first();

      if($codigoValido){
        $codigo = Codigo::where('codigo', $code)->first();
        $codigo->usado = "1";
        $codigo->user = Auth::user()->email;
        $codigo->save();

        $user = User::find(Auth::user()->id);
        $user->subs = "1";
        $date = strtotime("+30 day", strtotime(date("Y-m-d")));
        $dataMas = date("Y-m-d", $date);
        $user->subFinal = $dataMas;
        $user->save();



        return redirect('/inicio');
      }else{

        \Session::flash('flash_message', 'Código incorrecto');
        return redirect('/inicio');
      }
    }
    public function estrenoPelis(){
      $genero=Genero::all();
      $aLanzamiento = ALanzamiento::all();
      $estrenosSer = Multimedia::where('tipo', '1')->orderBy('aLanzamiento', 'DESC')->orderBy('created_at', 'DESC')->get();
      $estrenosPeli = Multimedia::where('tipo', '0')->orderBy('aLanzamiento', 'DESC')->orderBy('created_at', 'DESC')->get();
      return view('web.estrenosPeli', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento,'estrenosPeli'=>$estrenosPeli, 'estrenosSer'=>$estrenosSer));
    }
    public function favoritosPelis(){
      $arrayPelicula = Multimedia::inRandomOrder()->where('tipo', '0')->get();
      $genero=Genero::all();
      $aLanzamiento = ALanzamiento::all();
      $arraySerie = Multimedia::inRandomOrder()->where('tipo', '1')->get();
      return view('web.pelisFavoritas', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento,'arrayPelicula'=>$arrayPelicula, 'arraySerie'=>$arraySerie));
    }
    public function ultimasPelis(){
      $ultimasAddPeli = Multimedia::where('tipo', '0')->orderBy('created_at', 'DESC')->get();
      $genero=Genero::all();
      $aLanzamiento = ALanzamiento::all();
      return view('web.ultimasPelis', array('arrayGenero'=>$genero, 'arrayLanz'=>$aLanzamiento,'ultimasAddPeli'=>$ultimasAddPeli));
    }
}
