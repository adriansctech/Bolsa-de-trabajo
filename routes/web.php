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
//Rutas generales
Auth::routes();
Route::get('/', 'OfertasController@chooseHomeUser');
Route::get('/oferta/{id}', 'OfertasController@getOferta');

//Alumno
//Permite acceder a estas rutas a los alumnos
Route::group(['middleware' => 'tipoUsuario:alumno'], function(){

    //Carga todas las ofertas disponibles para el alumno
    Route::get('/alumno', 'OfertasController@getOfertasAlumno');

    //Carga la vista del perfil de alumno
    Route::get('/alumno/perfil', 'PerfilController@perfilAlumno');

    //Carga la vista de edición del perfil del alumno
    Route::get('/alumno/perfil/editar', 'PerfilController@editAlumno');

    //Guarda los datos del perfil de alumno y nos devuelve a la vista del perfil
    Route::post('/alumno/perfil', 'PerfilController@saveEditAlumno');
});


//Empresa
//Permite acceder a estas rutas a responsables y empresas
Route::group(['middleware' => 'tipoUsuario:responsable-empresa'], function(){

    //Principal
    Route::get('/empresa', 'OfertasController@getOfertasEmpresa');

    //Oferta concreta
    Route::get('/empresa/ofertaEmpresa/{id}', 'OfertasController@ofertaEmpresa');

    //Borrar oferta
    Route::post('/empresa', 'OfertasController@deleteOferta');

    //Recoger la vista de edición de una oferta
    Route::get('/empresa/ofertaEditar/{id}', 'OfertasController@editarOfertaEmpresa');
    //Guarda la edición o crea una nueva oferta
    Route::post('/empresa/ofertaEmpresa', 'OfertasController@newOferta');

    //Carga el perfil de la empresa
    Route::get('/empresa/perfil', 'PerfilController@perfilEmpresa');
    //Guarda las ediciones en el perfil de la empresa
    Route::post('/empresa/perfil', 'PerfilController@saveEditEmpresa');

    //Carga la vista de edición de la empresa
    Route::get('/empresa/perfil/editar', 'PerfilController@editEmpresa');
    //Carga la vista de creación de una nueva oferta
    Route::get('/empresa/nuevaOferta', 'OfertasController@crearOferta');
    

});

//Responsable
//Permite acceder a estas rutas al responsable
Route::group(['middleware' => 'tipoUsuario:responsable'], function(){

    //Carga la vista del perfil del responsable
    Route::get('/responsable/perfil', 'PerfilController@perfilResponsable');

    //Guarda los datos al editar el perfil del responsable
    Route::post('/responsable/perfil', 'PerfilController@saveEditResponsable');

    //Carga la vista de edición del responsables
    Route::get('/responsable/perfil/editar', 'PerfilController@editResponsable');

    //Carga la pagina principal del responsable
    Route::get('/responsable', 'PerfilController@responsablePrincipal');

    //Carga la lista de todas la empresas para poder acceder
    Route::get('/responsable/empresas', 'PerfilController@getResponsableEmpresas');

    //Guarda los datos y crea una nueva empresa
    Route::post('/responsable/empresas', 'PerfilController@newEmpresa');

    //Carga la vista para crear una nueva empresa
    Route::get('/responsable/empresas/new', function(){return view('responsable.newEmpresa');});

    //Carga la vista para previsualizar el perfil de una empresa
    Route::get('/responsable/empresa/{id}', 'PerfilController@getEmpresa');

    //Carga todos los alumnos no validados
    Route::get('/responsable/alumnos', 'PerfilController@getResponsableAlumnos');
    //Valida el alumno y nos devuelve a la lista de alumnos por validar
    Route::post('/responsable/alumnos', 'PerfilController@validaAlumno');

    //Carga la lista de ofertas por validar
    Route::get('/responsable/ofertas', 'OfertasController@getOfertasResponsable');
    //Valida la oferta seleccionada y nos devuelve a la lista de ofertas por validar
    Route::post('/responsable/ofertas', 'OfertasController@validaOferta');

    //Carga la vista de un alumno en concreto para previsualizarlo o validarla
    Route::get('/responsable/alumno/{id}', 'PerfilController@getRAlumno');

    //Carga la vista de una oferta en concreto para previsualizarla o validarla
    Route::get('/responsable/oferta/{id}', 'OfertasController@getROferta');

    //Empresa
    //Carga la vista principal de la empresa seleccionada de la lista de empresas para poder trabajar con esta
    Route::get('/empresa/{email}', 'OfertasController@getOfertasEmpresa');

});
