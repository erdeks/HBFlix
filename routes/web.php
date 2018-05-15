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

Route::post('/register', 'HomeController@generos');


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
Route::post('/admin/editarPeli','AdminController@editarPeli');
Route::delete('/admin/eliminarPeli/{id}','AdminController@eliminarPeli');
Route::get('/admin/eliminarPeli/{id}','AdminController@eliminarPeli');
//Menú series
Route::get('/admin/verSeries','AdminController@verSeries');
Route::get('/admin/crearSeries','AdminController@crearSeries');
//Menú género
Route::get('/admin/verGeneros','AdminController@verGeneros');
Route::get('/admin/crearGeneros','AdminController@crearGeneros');
Route::post('/admin/crearGeneros','AdminController@guardarGeneros');
Route::get('/admin/editarGenero/{id}', 'AdminController@mostrarGenero');
Route::post('/admin/editarGenero','AdminController@editarGenero');
Route::delete('/admin/eliminarGenero/{id}','AdminController@eliminarGenero');
Route::get('/admin/eliminarGenero/{id}','AdminController@eliminarGenero');
//Menú año de lanzamiento
Route::get('/admin/verAnLan','AdminController@verAnLan');
Route::get('/admin/crearAnLan','AdminController@crearAnLan');
Route::post('/admin/crearAnLan','AdminController@guardarAnLan');
Route::get('/admin/editarAnLan/{id}', 'AdminController@mostrarAnLan');
Route::post('/admin/editarAnLan','AdminController@editarAnLan');
Route::delete('/admin/eliminarAnLan/{id}','AdminController@eliminarAnLan');
Route::get('/admin/eliminarAnLan/{id}','AdminController@eliminarAnLan');
//Perfil
Route::get('/inicio/perfil','PerfilController@perfil');
//Mostrar Generos
Route::get('/inicio/{nombre}', 'GeneroController@main');
