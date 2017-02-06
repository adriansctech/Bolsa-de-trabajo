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
Auth::routes();

Route::get('/', 'HomeController@index');

//Perfiles
Route::get('/perfil/{id}', 'PerfilController@getPerfil');
Route::post('/perfil/edit/{id}', 'PerfilController@editUser');

//Ofertas
Route::get('/ofertas','OfertasController@getAllOfertas');
Route::get('/ofertas/{id}','OfertasController@getOferta');
Route::get('/ofertas/{curso}','OfertasController@getOfertasCurso');
Route::post('/ofertas/create','OfertasController@postOferta');
Route::delete('/ofertas/delete/{id}','OfertasController@deleteOferta');

//User
Route::delete('/user/delete/{id}','UsersController@deleteUser');
