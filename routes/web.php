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

/**
 * Ruta para el index de la plataforma, la página de login
 */
Route::get('/',[
  'uses'=>'Auth\LoginController@index',
  'as'=>'inicio'])->middleware('guest');

/**
 * Ruta del Login de la aplicación
 */
Route::post('/login','Auth\LoginController@login')->name('login');

/**
 * Ruta para utilizar el método de logout del controlador
 */
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

/**
 * Ruta para obtener las instituciones
 */
Route::get('/sedes/{id}','SecretariaController@getSedes')->middleware('secretaria');

/**
 * Ruta para traer la vista de la pagina de inicio del perfil de secretaria
 */
Route::get('/secretaria', [
  'uses'=> 'SecretariaController@viewSecretaria',
  'as' => 'secretaria'
])->middleware('secretaria');

/**
 * Ruta para mostrar la pagina de los listados de beneficiarios del Programa de alimentacion escolar
 */
Route::get('/secretaria/beneficiarios', [
  'uses'=> 'SecretariaController@viewSecretariaListadosPAE',
  'as' => 'secretaria.ListadoPae'
])->middleware('secretaria');

/**
 * Ruta para mostrar la vista del listado de instituciones que pertenecen al 
 * programa de alimentación escolar
 */
Route::get('/secretaria/ListadoInstituciones', [
  'uses'=> 'SecretariaController@viewListadoInstitucion',
  'as' => 'secretaria.listadoInstituciones'
])->middleware('secretaria');

/**
 * Ruta para mostrar el formulario en el cual se debe registrar una institución educativa
 */
Route::get('secretaria/RegInstitucion',[
  'uses'=>'SecretariaController@viewRegInstitucion',
  'as' => 'secretaria.registroInstitucion'
])->middleware('secretaria');

/**
 * Ruta para mostrar el formulario para actualizar los datos de una institucion educativa registrada
 */
Route::get('/secretaria/actualizarIns/{id}',[
  'uses'=>'SecretariaController@viewActualizarInstitucion',
  'as'=>'secretaria.viewActualizarInstitucion'
])->middleware('secretaria');

/**
 * Ruta para mostrar el formulario de registro de un operador
 */
Route::get('/secretaria/registrarOperador', [
  'uses'=> 'SecretariaController@viewRegOperador',
  'as' => 'secretaria.registrarOperador'
])->middleware('secretaria');

/**
 * Ruta para mostrar la vista de los listados de informes de alimentos entregados por el operador
 */
Route::get('/secretaria/alimentos', [
  'uses'=> 'SecretariaController@viewSecretariaListadoAlimentos',
  'as' => 'secretaria.infoAlimentos'
])->middleware('secretaria');

/**
 * Ruta para mostrar la vista de los listados de asistencia que suben las instituciones
 * a la plataforma
 */
Route::get('/secretaria/asistencias', [
  'uses'=> 'SecretariaController@viewSecretariaAsistencias',
  'as' => 'secretaria.infoAsistencias'
])->middleware('secretaria');

/**
 * ruta para devolver la vista de los listados de certificaciones subidos a la 
 * plataforma por parte de los operadores
 */
Route::get('/secretaria/certificaciones', [
  'uses'=> 'SecretariaController@viewSecretariaCertificaciones',
  'as' => 'secretaria.infoCertificaciones'
])->middleware('secretaria');

/**
 * Ruta para mostrar la vista de modificar los datos del perfil de
 * secretaria de educacion
 */
Route::get('/secretaria/modificarDatos', [
  'uses'=> 'SecretariaController@viewSecretariaModificarDatos',
  'as' => 'secretaria.modificarDatos'
])->middleware('secretaria');

/**
 * 
 */
Route::post('/secretaria/registrarInstituciones',[
  'uses'=>'SecretariaController@registrarInstitucion',
  'as'=> 'registrarInstitucion'
])->middleware('secretaria');

/**
 * Ruta para actualizar los datos de una institucion en la base de datos
 */
Route::post('/secretaria/actualizarInstitucion/{id}',[
  'uses'=>'SecretariaController@actualizarInstitucion',
  'as'=>'secretaria.actualizarInstitucion'
])->middleware('secretaria');

/**
 * 
 */
Route::post('/secretaria/registrarOperador',[
  'uses'=>'SecretariaController@registrarOperador',
  'as'=> 'registrarOperador'
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
