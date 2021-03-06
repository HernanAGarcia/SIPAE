<?php

namespace SIPAE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\http\Controllers\Controllers;
use SIPAE\institucion;
use SIPAE\Sede_Institucion;
use Illuminate\Support\CollectionStdClass;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use SIPAE\imports\UsersImport;
use Carbon\Carbon;
use Alert;
use Log;
use Validator;
use Excel;


class SecretariaController extends Controller
{


      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //$this->middleware('secretaria');
    }


  /**
   * Retornar la vista del perfil de institución
   */
  public function viewSecretaria(){
    return view('secretaria.perfilSecretaria');
  }

  /**
   * Retornar la vista de listado beneficiarios del perfil de secretaria
   */
  public function viewSecretariaListadosPAE(){
    $listados = Storage::disk('informeBeneficiarios')->files();
    return view('secretaria.listadoBeneficiarios')->with('listados',$listados);
  }


  /**
   * Función para devolver la vista del formulario para registrar una institucion
   */
  public function viewRegInstitucion(){
    return view('secretaria.registroInstitucion');
  }

  /**
   * Funcion que devuelve la vista para actualizar o editar los datos de una institución
   * que se encuentra registrada en el sistema
   */
  public function viewActualizarInstitucion($id){

    //para traer los datos de la institucion de sede_instituciones 
    $result=DB::table('sede_institucion')->where('id','=',$id)->get();


      foreach ($result as $r) {
        $nombreActual=$r->nombre;
        $nitActual=$r->nit;
        $rectorActual=$r->rector;
        $direccionActual=$r->direccion;
        $telefonoActual=$r->telefono;
        $correoActual=$r->email;
      }
      
     //luego devolver la vista de actualizar con los datos 
      return view('secretaria.actualizarInstitucion',['nombre'=>$nombreActual,'nit'=>$nitActual,'rector'=>$rectorActual,
        'direccion'=>$direccionActual,'telefono'=>$telefonoActual,'correo'=>$correoActual,'id'=>$id]);
  }

  /**
   */
  public function actualizarInstitucion($id,Request $request){
    
    
  }

  /**
   * Retornar la vista para ver el listado de las instituciones instituciones
   */
  public function viewListadoInstitucion(){
    $instituciones=DB::table('sede_institucion')->select('id','nombre', 'rector')->get();
    
    return view('secretaria.listadoInstituciones')->with('instituciones',$instituciones);
  }

  /**
   * Retornar la vista para registrar el Operador
   */
  public function viewRegOperador(){
    return view('secretaria.registroOperador');
  }

  /**
   *
   */
  public function viewSecretariaListadoAlimentos(Request $request){
    $listaInstitucion = Sede_Institucion::listar()->get();
   return view('secretaria.informeAlimentos',compact('listaInstitucion','archivos'));
  }

  /**
   *
   */
  public function getFiles($id){
    $archivos = File::files('informeAlimentos/'.$id);
    return response()->json($archivos);
  }

  /**
   *
   */
  public function descargarInformes($file, $file2, $file3){
    $pathtoFile = public_path().'//'.$file.'//'.$file2.'//'.$file3;
    return response()->download($pathtoFile);
  }

  /**
   *
   */
  public function viewSecretariaAsistencias(){
    $listaInstitucion = sede_institucion::listar()->get();
   return view('secretaria.informeAsistencias',compact('listaInstitucion','archivos'));
  }

  /**
   *
   */
  public function getAsistencias($id){
    $archivos = File::files('informeAsistencias/'.$id);
    return response()->json($archivos);
  }

  /**
   *
   */
  public function viewSecretariaCertificaciones(){
    $certificados = Storage::disk('informeCobertura')->files();
    return view('secretaria.informeCertificacion')->with('certificados',$certificados);
    //return view('secretaria.informeCertificacion');
  }

  /**
   *
   */
  public function viewSecretariaModificarDatos(){
    return view('secretaria.modificarDatos');
  }

  /**
   * Función la cual permite registrar instituciones en el sistema
   */
  public function registrarInstitucion(Request $request){

    $nombreInstitucion= $request->get('nombreInstitucion');
    $nit= $request->get('NIT');
    $codigo= $request->get('NIT');
    $rector= $request->get('rector');;
    $direccion= $request->get('direccion');;
    $telefono= $request->get('telefono');;
    $correoElectronico= $request->get('email');;
    $password= $request->get('password');
    $idSecretaria= Auth::user()->id;



    $rules = array(
      'nombreInstitucion' => 'required|string|max:60',
      'NIT' => 'required|numeric|min:0',
      'rector' => 'required|string|max:60',
      'direccion' => 'required|string|max:60',
      'telefono' => 'required|numeric|digits_between:7,15',
      'email' => 'required|email|max:60',
      'password' => 'required|between:6,20'
    );
    $messages = [
    'max' => 'El campo :attribute no debe contener más de :max caracteres.',
    'min' => 'El campo :attribute solo debe contener números.',
    'required' => 'El campo :attribute es requerido.',
    'string'=> 'El campo :attribute puede contener distintos caracteres.',
    'between' => 'El campo Nueva Contraseña debe contener un número de caracteres entre: :min - :max.',
    'numeric' => 'El campo :attribute solo debe contener números.',
    'email' => 'El campo :attribute debe contener una dirección de correo electronico.',
    'digits_between' => 'El campo :attribute debe tener entre :min - :max números.',
    ];

    $validator = Validator::make(Input::all(), $rules, $messages );
    $verificacion=$this->verificarRegistro($nit,$correoElectronico);
    $verificarRector=$this->verificarRector($rector);


      if($validator-> fails()){
          return redirect('/secretaria/registrarInstituciones')->withErrors($validator);
      }elseif (!$verificacion) {
        alert()->error('El Nit o el Correo de la institucion ya existe. Registro Invalido', 'Error')->persistent('Close');
        return redirect()->back();
      }else if(!$verificarRector){
        alert()->error('El nombre del rector no puede contener números. Registro Invalido', 'Error')->persistent('Close');
        return redirect()->back();
      }
      else{
        //ingresar a la tabla de instituciones
         $idInstitucion=DB::table('sede_institucion')->insertGetId(['nombre'=>$nombreInstitucion,'rector'=>$rector,
         'codigo'=>$codigo,'nit'=>$nit, 'email'=>$correoElectronico,'direccion'=>$direccion,
         'telefono'=>$telefono]);

         // se crean los directorios donde se almacenara los reportes de cada institucion
         Storage::makeDirectory('informeAsistencias//'.$idInstitucion);
         Storage::makeDirectory('informeAlimentos//'.$idInstitucion);

           //ingresar en la tabla de usuarios para el inicio de sesion
           DB::table('users')->insert(['nombre_Usuario'=>$nombreInstitucion,'email'=>$correoElectronico,
           'password'=>Hash::make($password),'role'=>'institucion','Id_Sede_Institucion'=>$idInstitucion,'Id_Secretaria'=>$idSecretaria]);
           alert()->success('Registro completo', 'Aceptado')->persistent('Close');

          // Storage::MakeDirectory(public_path('my_new_directory'));

           return redirect()->back();
      }
 }

 
  /**
   * Función la cual permite registrar el operador en el sistema
   */
  public function registrarOperador(Request $request){

    $nombreOperador= $request->get('nombreOperador');
    $nit= $request->get('NIT');
    $codigo= $request->get('NIT');
    $direccion= $request->get('direccion');;
    $telefono= $request->get('telefono');;
    $correoElectronico= $request->get('email');;
    $password= $request->get('password');
    $idSecretaria= Auth::user()->id;



    $rules = array(
      'nombreOperador' => 'required|string|max:60',
      'NIT' => 'required|numeric|min:0',
      'direccion' => 'required|string|max:60',
      'telefono' => 'required|numeric|digits_between:7,15',
      'email' => 'required|email|max:60',
      'password' => 'required|between:6,20'
    );
    $messages = [
    'max' => 'El campo :attribute no debe contener más de :max caracteres.',
    'min' => 'El campo :attribute solo debe contener números.',
    'required' => 'El campo :attribute es requerido.',
    'string'=> 'El campo :attribute puede contener distintos caracteres.',
    'between' => 'El campo Nueva Contraseña debe contener un número de caracteres entre: :min - :max.',
    'numeric' => 'El campo :attribute solo debe contener números.',
    'email' => 'El campo :attribute debe contener una dirección de correo electronico.',
    'digits_between' => 'El campo :attribute debe tener entre :min - :max números.',
    ];

    $validator = Validator::make(Input::all(), $rules, $messages );
    $verificacion=$this->verificarRegistroOperador($nit,$correoElectronico);
    

      if($validator-> fails()){
          return redirect('/secretaria/registrarOperador')->withErrors($validator);
      }elseif (!$verificacion) {
        alert()->error('El Nit o el Correo del Operador ya existe. Registro Invalido', 'Error')->persistent('Close');
        return redirect()->back();
      }
      else{
        //ingresar a la tabla de instituciones
         $idInstitucion=DB::table('operador')->insertGetId(['nombre'=>$nombreOperador,
         'codigo'=>$codigo,'nit'=>$nit, 'email'=>$correoElectronico,'direccion'=>$direccion,
         'telefono'=>$telefono]);
         // se crean los directorios donde se almacenara los reportes de cada institucion
          //File::makeDirectory('informeAsistencias//'.$idInstitucion);
         // File::makeDirectory('informeAlimentos//'.$idInstitucion);

           //ingresar en la tabla de usuarios para el inicio de sesion
           DB::table('users')->insert(['nombre_Usuario'=>$nombreOperador,'email'=>$correoElectronico,
           'password'=>Hash::make($password),'role'=>'operador','Id_Sede_Institucion'=>$idInstitucion,'Id_Secretaria'=>$idSecretaria]);
           alert()->success('Registro completo', 'Aceptado')->persistent('Close');

          // Storage::MakeDirectory(public_path('my_new_directory'));

           return redirect()->back();
      }


 }

 /**
  * Método que valida que el rector no tenga numeros.
  */
 public function verificarRector($rector){
  if (preg_match ("/^[a-zA-Z[:space:]]+$/", $rector)) {
    return true;
  }
  return false;
 }

/**
 * 
 */
 public function verificarRegistroOperador($nit,$correo){
  $codigo=DB::table('operador')->where('codigo', $nit)->exists();
  $email= DB::table('operador')->where('email', $correo)->exists();

  if($codigo=='1' || $email=='1'){
    return false;
  }else if($codigo=='1' && $email=='1'){
    return false;
  }
  return true;

}

 /**
  * Funcion para verificar el registro de una institucion nueva en el sistema
  * verifica que la institución no se encuentre registrada en el sistema por medio
  * del codigo del nit y el correo de la institución que se manejan como atributos únicos
  */
 public function verificarRegistro($nit,$correo){
    $codigo=DB::table('sede_institucion')->where('codigo', $nit)->exists();
    $email= DB::table('sede_institucion')->where('email', $correo)->exists();

    if($codigo=='1' || $email=='1'){
      return false;
    }else if($codigo=='1' && $email=='1'){
      return false;
    }
    return true;

  }

  /**
   *
   */
public function actualizarDatos(Request $request){
  $nuevoPass= $request->get('nuevosPassword');
  if(strlen($nuevoPass)<6){
    alert()->error('La contraseña debe tener como minimo 6 caracteres', 'Error')->persistent('Close');
    return redirect()->back();
  }else{
     DB::table('users')
         ->where('id', Auth::user()->id)
         ->update(['password' => bcrypt($nuevoPass)]);
         alert()->success('La contraseña se ha cambiado', 'Exito')->persistent('Close');
          return redirect()->back();
  }
}


  public function descargar($file){
    $pathtoFile = public_path().'//informeCobertura//'.$file;
    return response()->download($pathtoFile);
  }

  public function descargarListados($file){
    $pathtoFile = public_path().'//informeBeneficiarios//'.$file;
    return response()->download($pathtoFile);
  }


  public function verCertificado($file){
    $pathtoFile = public_path().'//informeCobertura//'.$file;
    return response()->file($pathtoFile);
  }

  public function verReportes($file, $file2, $file3){
    $pathtoFile = public_path().'//'.$file.'//'.$file2.'//'.$file3;
    return response()->file($pathtoFile);
  }



  public function subirArchivo(Request $request){

    $rules = array('archivo' => 'max:5000|mimes:xlsx,xls');
    $messages = [
    'max'    => 'El archivo no debe ser mayor a 5 megabytes',
    'mimes' => 'El archivo debe ser un archivo de tipo: xlsx,xls',
  ];
    $validator = Validator::make(Input::all(), $rules, $messages );

    if($validator-> fails()){
      return redirect('/secretaria/certificaciones')->withErrors($validator);
    }else {
    $file=$request->file('archivo');
    $nombre =Carbon::now()->toDateString()."-".$file->getClientOriginalName();
    Storage::disk('informeCobertura')->put($nombre,\File::get($file));
    }
    //para insertar en la base de datos

    //  $archivos = Storage::disk('informeAlimentos')->files();
    //  return \View('institucion.archAlimentos')->with('archivos',$archivos);

    $certificados = Storage::disk('informeCobertura')->files();
    return \View('secretaria.informeCertificacion')->with('certificados',$certificados);

  }



  public function subirListado(Request $request){
    ini_set('max_execution_time', 6000);

    $rules = array('archivo' => 'max:5000|mimes:xlsx,xls');
    $messages = [
    'max'    => 'El archivo no debe ser mayor a 5 megabytes',
    'mimes' => 'El archivo debe ser un archivo de tipo: xlsx,xls',
  ];
    $validator = Validator::make(Input::all(), $rules, $messages );

    // if($validator-> fails()){
    //   return redirect('/secretaria/beneficiarios')->withErrors($validator);
    // }else {

      Excel::import(new UsersImport, request()->file('archivo'));
    //   // $file=$request->file('archivo');
    //   $nombre =Carbon::now()->toDateString()."-".$file->getClientOriginalName();
    //   Storage::disk('informeBeneficiarios')->put($nombre,\File::get($file));
    // }
    //   //para insertar en la base de datos

    //   //  $archivos = Storage::disk('informeAlimentos')->files();
    //   //  return \View('institucion.archAlimentos')->with('archivos',$archivos);

      $listados = Storage::disk('informeBeneficiarios')->files();
      return \View('secretaria.listadoBeneficiarios')->with('listados',$listados);

  }


}//fin del controller
