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

Route::get('/inicio', 'HomeController@menu');

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
Route::get('/admin/crearPeliculas','AdminController@crearPeliculas');
Route::post('/admin/crearPeliculas','AdminController@guardarPeliculas');
Route::get('/admin/verPeli/{id}','AdminController@verPeli');
//Menú series
Route::get('/admin/verSeries','AdminController@verSeries');
Route::get('/admin/crearSeries','AdminController@crearSeries');
//Menú género
Route::get('/admin/verGeneros','AdminController@verGeneros');
Route::get('/admin/crearGeneros','AdminController@crearGeneros');
//Menú año de lanzamiento
Route::get('/admin/verAnLan','AdminController@verAnLan');
Route::get('/admin/crearAnLan','AdminController@crearAnLan');
//Perfil
Route::get('/inicio/perfil','PerfilController@perfil');
