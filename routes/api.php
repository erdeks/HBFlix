<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;
use App\Multimedia;
header('Access-Control-Allow-Origin: *');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login/{user}/{password}',function(request $request,$email,$password){

	if(Auth::attempt(/*$userdata*/['email' => $email,'password'=> $password])){
            //Logueo correcto...
        $newToken = User::select()->where('email',$email)->first();
        $email = Auth::user()->email;
        $user = Auth::user()->name;
        return response()->json(['email'=>$email,'Usuario'=>$user]);
    };

});

Route::get('/verPelis',function(request $request){
	$peliculas = Multimedia::where('tipo', '0')->get();
    return response()->json(['peliculas'=>$peliculas]);		
});

Route::get('/verSeries',function(request $request){
	$series = Multimedia::where('tipo', '1')->get();
    return response()->json(['series'=>$series]);		
});