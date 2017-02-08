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

Route::post('/perfil/edit/{id}', 'PerfilController@editUser');

//Ofertas

Route::get('/ofertas/{id}','OfertasController@getOferta');
Route::get('/ofertas/{curso}','OfertasController@getOfertasCurso');
Route::post('/ofertas/create','OfertasController@postOferta');
Route::delete('/ofertas/delete/{id}','OfertasController@deleteOferta');

//User
//Route::delete('/user/delete/{id}','UsersController@deleteUser');

Route::group(['middleware' => 'tipo:alumno'], function(){
    Route::get('/perfil', 'PerfilController@getPerfilAlumno');
    Route::get('/ofertas', 'PerfilController@getPerfilAlumno');


});

Route::group(['middleware' => 'tipo:empresa'], function(){
    Route::get('/perfil', 'PerfilController@getPerfilEmpresa');



});

Route::group(['middleware' => 'tipo:responsable'], function(){
    Route::get('/perfil', 'PerfilController@getPerfilResponsable');



});
