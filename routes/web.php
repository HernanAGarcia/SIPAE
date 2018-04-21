<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PaginasController@login');


Route::post('select',['uses'=>'PaginasController@postSelect','as'=>'postSelect']);


Route::get('sedes/{id}','PaginasController@getSedes');

Route::get('/Secretaria', [

  'uses'=> 'PaginasController@viewSecretaria',
  'as' => 'secretaria'
]);

Route::get('/Secretaria/AgregarListadoPae', [

  'uses'=> 'PaginasController@viewSecretariaListadosPAE',
  'as' => 'secretaria.ListadoPae'
]);

Route::get('/Secretaria/alimentos', [

  'uses'=> 'PaginasController@viewSecretariaListadoAlimentos',
  'as' => 'secretaria.infoAlimentos'
]);

Route::get('/Secretaria/asistencias', [

  'uses'=> 'PaginasController@viewSecretariaAsistencias',
  'as' => 'secretaria.infoAsistencias'
]);

Route::get('/Secretaria/certificaciones', [

  'uses'=> 'PaginasController@viewSecretariaCertificaciones',
  'as' => 'secretaria.infoCertificaciones'
]);

Route::get('/Secretaria/modificarDatos', [

  'uses'=> 'PaginasController@viewSecretariaModificarDatos',
  'as' => 'secretaria.modificarDatos'
]);


//Rutas del perfil de institución
Route::get('/institucion',[
  'uses'=>'institucionController@viewInicioInstitucion',
  'as'=> 'institucion.inicio'

]);

Route::get('/institucion/cargaAsistencia',[
  'uses'=>'institucionController@viewInstitucionAsistencias',
  'as'=> 'institucion.cargarAsistencia'

]);

Route::get('/institucion/cargaInfoAlimentos',[
  'uses'=>'institucionController@viewInstitucionAlimentos',
  'as'=> 'institucion.cargarInfoAlimentos'

]);

Route::post('/institucion/subirArchivo','institucionController@subirArchivo');


Auth::routes();
