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




Route::get('/sedes/{id}','SecretariaController@getSedes');

Route::get('/Secretaria', [

  'uses'=> 'SecretariaController@viewSecretaria',
  'as' => 'secretaria'
]);

Route::get('/Secretaria/AgregarListadoPae', [

  'uses'=> 'SecretariaController@viewSecretariaListadosPAE',
  'as' => 'secretaria.ListadoPae'
]);

Route::get('/Secretaria/alimentos', [

  'uses'=> 'SecretariaController@viewSecretariaListadoAlimentos',
  'as' => 'secretaria.infoAlimentos'
]);

Route::get('/Secretaria/asistencias', [

  'uses'=> 'SecretariaController@viewSecretariaAsistencias',
  'as' => 'secretaria.infoAsistencias'
]);

Route::get('/Secretaria/certificaciones', [

  'uses'=> 'SecretariaController@viewSecretariaCertificaciones',
  'as' => 'secretaria.infoCertificaciones'
]);

Route::get('/Secretaria/modificarDatos', [

  'uses'=> 'SecretariaController@viewSecretariaModificarDatos',
  'as' => 'secretaria.modificarDatos'
]);




//Rutas del perfil de institución



Route::get('/institucion','institucionController@viewInicioInstitucion')->name('institucion');

Route::get('/institucion/cargaAsistencia',[
  'uses'=>'institucionController@viewInstitucionAsistencias',
  'as'=> 'institucion.cargarAsistencia'

]);

Route::get('/institucion/cargaInfoAlimentos',[
  'uses'=>'institucionController@viewInstitucionAlimentos',
  'as'=> 'institucion.cargarInfoAlimentos'

]);

Route::post('/institucion/cargaInfoAlimentos','institucionController@subirArchivo');

//Route::get('/institucion/descargar','institucionController@descargar');

Route::get('/institucion/cargarInfoAlimentos/{file}', 'institucionController@descargar');


//Auth::routes();
