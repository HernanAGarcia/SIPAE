<?php



use Illuminate\Support\Facades\Storage;
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

Route::get('/',[
  'uses'=>'Auth\LoginController@index',
  'as'=>'inicio'])->middleware('guest');

Route::post('/login','Auth\LoginController@login')->name('login');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');




Route::get('/sedes/{id}','SecretariaController@getSedes')->middleware('auth');

Route::get('/Secretaria', [

  'uses'=> 'SecretariaController@viewSecretaria',
  'as' => 'secretaria'
])->middleware('auth');

Route::get('/Secretaria/AgregarListadoPae', [

  'uses'=> 'SecretariaController@viewSecretariaListadosPAE',
  'as' => 'secretaria.ListadoPae'
])->middleware('auth');

Route::get('/Secretaria/alimentos', [

  'uses'=> 'SecretariaController@viewSecretariaListadoAlimentos',
  'as' => 'secretaria.infoAlimentos'
])->middleware('auth');

Route::get('/Secretaria/asistencias', [

  'uses'=> 'SecretariaController@viewSecretariaAsistencias',
  'as' => 'secretaria.infoAsistencias'
])->middleware('auth');

Route::get('/Secretaria/certificaciones', [

  'uses'=> 'SecretariaController@viewSecretariaCertificaciones',
  'as' => 'secretaria.infoCertificaciones'
])->middleware('auth');

Route::get('/Secretaria/modificarDatos', [

  'uses'=> 'SecretariaController@viewSecretariaModificarDatos',
  'as' => 'secretaria.modificarDatos'
])->middleware('auth');


Route::get('/secretaria/alimentos/{file}/{file2}/{file3}', 'SecretariaController@descargarInforme')->middleware('auth');

Route::get('/secretaria/asistencias/{file}/{file2}/{file3}', 'SecretariaController@descargarAsistencia')->middleware('auth');




//Rutas del perfil de institución



Route::get('/institucion','institucionController@viewInicioInstitucion')->name('institucion');

Route::get('/institucion/cargaAsistencia',[
  'uses'=>'institucionController@viewInstitucionAsistencias',
  'as'=> 'institucion.cargarAsistencia'

])->middleware('institucion:institucion');

Route::get('/institucion/cargaInfoAlimentos',[
  'uses'=>'institucionController@viewInstitucionAlimentos',
  'as'=> 'institucion.cargarInfoAlimentos'

])->middleware('institucion:institucion');

Route::post('/institucion/cargaInfoAlimentos','institucionController@subirArchivo')->middleware('institucion:institucion');;

//Route::get('/institucion/descargar','institucionController@descargar');

Route::get('/institucion/cargarInfoAlimentos/{file}', 'institucionController@descargar')->middleware('institucion:institucion');;


//Auth::routes();
