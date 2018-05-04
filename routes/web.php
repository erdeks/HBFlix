<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/inicio', 'HomeController@index');

Route::get('/admin', 'AdminController@index');
Route::post('/admin', 'AdminController@login');
Route::get('/admin/inicio', 'AdminController@inicio');
Route::post('/admin/inicio', 'AdminController@inicio');

//Menú Users
Route::get('/admin/verUsuarios','AdminController@verUsuarios');
Route::get('/admin/usuariosBaneados','AdminController@usuariosBaneados');
Route::get('/admin/mensajesUsuarios','AdminController@mensajesUsuarios');
//Menú películas
Route::get('/admin/verPeliculas','AdminController@verPeliculas');
Route::get('/admin/crearPelicula','AdminController@crearPelicula');
//Menú series
Route::get('/admin/verSeries','AdminController@verSeries');
Route::get('/admin/crearSerie','AdminController@crearSerie');
//Menú género
Route::get('/admin/verGenero','AdminController@verGenero');
Route::get('/admin/crearGenero','AdminController@crearGenero');
//Menú año de lanzamiento
Route::get('/admin/verAnLan','AdminController@verAnLan');
Route::get('/admin/crearAnLan','AdminController@crearAnLan');
//Perfil
Route::get('/inicio/perfil','PerfilController@perfil');
