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

Route::get('/secretaria/beneficiarios', [
  'uses'=> 'SecretariaController@viewSecretariaListadosPAE',
  'as' => 'secretaria.ListadoPae'
])->middleware('secretaria');

Route::get('/secretaria/registrarInstituciones', [
  'uses'=> 'SecretariaController@viewRegInstitucion',
  'as' => 'secretaria.registrarInstituciones'
])->middleware('secretaria');

Route::get('/secretaria/alimentos', [
  'uses'=> 'SecretariaController@viewSecretariaListadoAlimentos',
  'as' => 'secretaria.infoAlimentos'
])->middleware('secretaria');

Route::get('/secretaria/asistencias', [
  'uses'=> 'SecretariaController@viewSecretariaAsistencias',
  'as' => 'secretaria.infoAsistencias'
])->middleware('secretaria');

Route::get('/secretaria/certificaciones', [
  'uses'=> 'SecretariaController@viewSecretariaCertificaciones',
  'as' => 'secretaria.infoCertificaciones'
])->middleware('secretaria');

Route::get('/Secretaria/modificarDatos', [
  'uses'=> 'SecretariaController@viewSecretariaModificarDatos',
  'as' => 'secretaria.modificarDatos'
])->middleware('secretaria');

Route::post('/secretaria/registrarInstituciones',[
  'uses'=>'SecretariaController@registrarInstitucion',
  'as'=> 'registrarInstitucion'
])->middleware('secretaria');

Route::post('/secretaria/actualizarDatos',[
  'uses'=>'SecretariaController@actualizarDatos',
  'as'=> 'secretaria.actualizarDatos'
])->middleware('secretaria');

Route::get('/secretaria/alimentos/{file}/{file2}/{file3}', 'SecretariaController@descargarInformes')->middleware('secretaria');
Route::get('/secretaria/asistencias/{file}/{file2}/{file3}', 'SecretariaController@descargarInformes')->middleware('secretaria');
Route::get('/secretaria/descargarCertificados/{file}', 'SecretariaController@descargar')->middleware('secretaria');
Route::get('/secretaria/verCertificados/{file}', 'SecretariaController@verCertificado')->middleware('secretaria');
Route::get('/secretaria/descargarListados/{file}', 'SecretariaController@descargarListados')->middleware('secretaria');
Route::get('/secretaria/verReportesInstitucion/{file}/{file2}/{file3}', 'SecretariaController@verReportes')->middleware('secretaria');
Route::post('/secretaria/certificaciones','SecretariaController@subirArchivo')->middleware('secretaria');
Route::post('/secretaria/beneficiarios','SecretariaController@subirListado')->middleware('secretaria');


//Rutas del perfil de institución
Route::get('/institucion',[
  'uses'=>'institucionController@viewInicioInstitucion',
  'as'=>'institucion'
  ])->middleware('institucion');

Route::get('/institucion/infomeAsistencias',[
  'uses'=>'institucionController@viewInstitucionAsistencias',
  'as'=> 'institucion.cargarAsistencia'
  ])->middleware('institucion');

Route::get('/institucion/informeAlimentos',[
  'uses'=>'institucionController@viewInstitucionAlimentos',
  'as'=> 'institucion.cargarInfomeAlimentos'
  ])->middleware('institucion');


Route::get('/institucion/beneficiarios',[
  'uses'=>'institucionController@viewInstitucionBeneficiarios',
  'as'=> 'institucion.beneficiarios'
  ])->middleware('institucion');

Route::get('/institucion/modificarDatos',[
  'uses'=>'institucionController@viewModificarDatos',
  'as'=> 'institucion.ModificarDatosInst'
  ])->middleware('institucion');

Route::post('/institucion/actualizarDatosInst',[
  'uses'=>'institucionController@actualizarDatos',
  'as'=> 'institucion.actualizarDatosInst'
  ])->middleware('institucion');

Route::post('/institucion/informeAlimentos/{file}', 'institucionController@subirInformeAlimentos')->middleware('institucion');
Route::post('/institucion/infomeAsistencias/{file}', 'institucionController@subirInformeAsistencia')->middleware('institucion');
Route::get('/institucion/descargarAlimentos/{file}/{file2}/{file3}', 'institucionController@descargar')->middleware('institucion');
Route::get('/institucion/descargarListados/{file}', 'institucionController@descargarBeneficiarios')->middleware('institucion');
Route::get('/institucion/descargarAsistencias/{file}/{file2}/{file3}', 'institucionController@descargar')->middleware('institucion');

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

Route::get('/operador/ModificarDatos',[
  'uses'=>'operadorController@viewModificarDatos',
  'as'=>'operador.modificarDatos'
]);

Route::get('/operador/descargarCertificados/{file}', 'operadorController@descargar');

Route::post('/operador/actualizarDatos',[
  'uses'=>'operadorController@actualizarDatos',
  'as'=> 'operador.actualizarDatosOp'
  ])->middleware('operador');
