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
Route::get('/', 'OfertasController@chooseHomeUser');
Route::get('/oferta/$id', 'OfertasController@getOferta');

//Alumno
Route::group(['middleware' => 'tipoUsuario:alumno'], function(){

    Route::get('/alumno', 'OfertasController@getOfertasAlumno');
    Route::post('/alumno/perfil', 'PerfilController@saveAlumno');
    Route::get('/alumno/perfil', 'PerfilController@showAlumno');
    Route::get('/alumno/perfil/editar', 'PerfilController@editAlumno');
});

//Empresa
Route::group(['middleware' => 'tipoUsuario:empresa'], function(){
    Route::get('/empresa', 'OfertasController@getOfertasEmpresa');
    Route::post('/empresa', 'OfertasController@newOferta');
    Route::get('/empresa/perfil', 'PerfilController@perfilEmpresa');
    Route::get('/empresa/perfil/editar', 'PerfilController@editEmpresa');
    Route::get('/empresa/nuevaOferta', function () {
        return view('empresa.crearOferta');
    });

});

//Responsable
Route::group(['middleware' => 'tipoUsuario:responsable'], function(){
    Route::get('/responsable/perfil', 'PerfilController@perfilResponsable');
    Route::get('/responsable/perfil/editar', 'PerfilController@editResponsable');
    Route::get('/responsable', 'PerfilController@responsablePrincipal');
    Route::get('/responsable/empresas', 'PerfilController@getResponsableEmpresas');
    Route::get('/responsable/empresas/new', 'PerfilController@newEmpresa');

    Route::get('/responsable/alumnos', 'PerfilController@getResponsableAlumnos');
    Route::post('/responsable/alumnos', 'PerfilController@validaAlumno');

    Route::get('/responsable/ofertas', 'PerfilController@getResponsableOfertas');
    Route::post('/responsable/ofertas', 'PerfilController@validaOferta');

    Route::get('/responsable/alumno', 'PerfilController@getAlumno');
    Route::post('/responsable/alumno', 'PerfilController@getEmpresa');
    //Route::get('/', 'OfertasController@getOfertasResponsable');
});
