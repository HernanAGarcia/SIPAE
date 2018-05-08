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




Route::get('/sedes/{id}','SecretariaController@getSedes')->middleware('secretaria');

Route::get('/Secretaria', [

  'uses'=> 'SecretariaController@viewSecretaria',
  'as' => 'secretaria'
])->middleware('secretaria');

Route::get('/Secretaria/AgregarListadoPae', [

  'uses'=> 'SecretariaController@viewSecretariaListadosPAE',
  'as' => 'secretaria.ListadoPae'
])->middleware('secretaria');

Route::get('/Secretaria/registrarInstituciones', [

  'uses'=> 'SecretariaController@viewRegInstitucion',
  'as' => 'secretaria.registrarInstituciones'
])->middleware('secretaria');

Route::get('/Secretaria/alimentos', [

  'uses'=> 'SecretariaController@viewSecretariaListadoAlimentos',
  'as' => 'secretaria.infoAlimentos'
])->middleware('secretaria');

Route::get('/Secretaria/asistencias', [

  'uses'=> 'SecretariaController@viewSecretariaAsistencias',
  'as' => 'secretaria.infoAsistencias'
])->middleware('secretaria');

Route::get('/Secretaria/certificaciones', [
  'uses'=> 'SecretariaController@viewSecretariaCertificaciones',
  'as' => 'secretaria.infoCertificaciones'
])->middleware('secretaria');

Route::get('/Secretaria/modificarDatos', [

  'uses'=> 'SecretariaController@viewSecretariaModificarDatos',
  'as' => 'secretaria.modificarDatos'
])->middleware('secretaria');

Route::post('/secretaria/regInstitucion',[
  'uses'=>'secretariaController@registrarInstitucion',
  'as'=> 'registrarInstitucion'

])->middleware('secretaria');

Route::get('/secretaria/alimentos/{file}/{file2}/{file3}', 'SecretariaController@descargarInforme')->middleware('secretaria');

Route::get('/secretaria/asistencias/{file}/{file2}/{file3}', 'SecretariaController@descargarAsistencia')->middleware('secretaria');

Route::get('/secretaria/descargarCertificados/{file}', 'SecretariaController@descargar')->middleware('secretaria');
Route::post('/secretaria/certificaciones','SecretariaController@subirArchivo')->middleware('secretaria');
Route::get('/secretaria/verCertificados/{file}', 'SecretariaController@verCertificado')->middleware('secretaria');

//Rutas del perfil de institución



Route::get('/institucion',[
  'uses'=>'institucionController@viewInicioInstitucion',
  'as'=>'institucion'
  ])->middleware('institucion');

Route::get('/institucion/cargaAsistencia',[
  'uses'=>'institucionController@viewInstitucionAsistencias',
  'as'=> 'institucion.cargarAsistencia'
  ])->middleware('institucion');

Route::get('/institucion/cargaInfoAlimentos',[
  'uses'=>'institucionController@viewInstitucionAlimentos',
  'as'=> 'institucion.cargarInfoAlimentos'
  ])->middleware('institucion');

Route::get('/institucion/cargarInfoAlimentos/{file}', 'institucionController@descargar')->middleware('institucion');


//Auth::routes();
//Route::get('/institucion/descargar','institucionController@descargar');

//rutas para el perfil de operador
Route::get('/operador',[
  'uses'=>'operadorController@inicio',
  'as'=>'operador'
]);

Route::get('/operador/certificados',[
  'uses'=>'operadorController@certificados',
  'as'=>'operador.certificados'
]);

Route::get('/operador/anomalias',[
  'uses'=>'operadorController@anomalias',
  'as'=>'operador.anomalias'
]);


Route::get('/operador/descargarCertificados/{file}', 'operadorController@descargar');
