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
Route::get('/oferta/{id}', 'OfertasController@getOferta');

//Alumno
Route::group(['middleware' => 'tipoUsuario:alumno'], function(){

    Route::get('/alumno', 'OfertasController@getOfertasAlumno');
    //Route::post('/alumno/perfil', 'PerfilController@saveAlumno');
    Route::get('/alumno/perfil', 'PerfilController@perfilAlumno');
    Route::get('/alumno/perfil/editar', 'PerfilController@editAlumno');
    Route::post('/alumno/perfil', 'PerfilController@saveEditAlumno');
});

//Empresa
Route::group(['middleware' => 'tipoUsuario:empresa'], function(){
    Route::get('/empresa', 'OfertasController@getOfertasEmpresa');
    Route::get('/empresa/ofertaEmpresa/{id}', 'OfertasController@ofertaEmpresa');
    Route::get('/empresa/ofertaEditar/{id}', 'OfertasController@editarOfertaEmpresa');
    Route::post('/empresa', 'OfertasController@newOferta');

    Route::get('/empresa/perfil', 'PerfilController@perfilEmpresa');
    Route::post('/empresa/perfil', 'PerfilController@editPerfilEmpresa');

    Route::get('/empresa/perfil/editar', 'PerfilController@editEmpresa');
    Route::get('/empresa/nuevaOferta', 'OfertasController@crearOferta');
    

});

//Responsable
Route::group(['middleware' => 'tipoUsuario:responsable'], function(){
    Route::get('/responsable/perfil', 'PerfilController@perfilResponsable');
    Route::get('/responsable/perfil/editar', 'PerfilController@editResponsable');
    Route::get('/responsable', 'PerfilController@responsablePrincipal');
    Route::get('/responsable/empresas', 'PerfilController@getResponsableEmpresas');
    Route::post('/responsable/empresa', 'PerfilController@newEmpresa');
    Route::get('/responsable/empresas/new', function(){return view('responsable.newEmpresa');});
    Route::get('/responsable/empresa/{id}', 'PerfilController@getEmpresa');

    Route::get('/responsable/alumnos', 'PerfilController@getResponsableAlumnos');
    Route::post('/responsable/alumnos', 'PerfilController@validaAlumno');

    Route::get('/responsable/ofertas', 'OfertasController@getOfertasResponsable');
    Route::post('/responsable/ofertas', 'OfertasController@validaOferta');

    Route::get('/responsable/alumno/{id}', 'PerfilController@getRAlumno');
    Route::get('/responsable/oferta/{id}', 'OfertasController@getROferta');

});
