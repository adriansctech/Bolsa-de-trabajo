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

Route::get('/home', 'HomeController@index');

//Perfiles

//Ofertas
Route::get('/ofertas','OfertasController@getOfertas');
Route::get('/ofertas/{curso}','OfertasController@getOfertasCurso');
Route::post('/ofertas/create','OfertasController@postOferta');

//User
