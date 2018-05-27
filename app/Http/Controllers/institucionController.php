<?php

namespace SIPAE\Http\Controllers;

use SIPAE\informe_Alimentos;
use SIPAE\Sede_Institucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use File;
use DB;
use Validator;

class institucionController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('institucion');
    }
  //Funciones para las vistas del perfil de institucion

  /**
   *
   */
  public function viewInicioInstitucion(){
    return view('institucion.perfilInstitucion');
  }

  /**
   *
   */
  public function viewInstitucionAsistencias(){
    $id= Auth::user()->Id_Sede_Institucion;
    $asistencias = File::files('informeAsistencias/'.$id);
    return \View('institucion.cargaListadoAsistencia')->with('asistencias',$asistencias);
  }

  /**
   *
   */
  public function viewInstitucionBeneficiarios(){
    $listados = Storage::disk('informeBeneficiarios')->files();
    return view('institucion.listaBeneficiarios')->with('listados',$listados);
  }

  /**
   *
   */
  public function viewInstitucionAlimentos(){
    $id= Auth::user()->Id_Sede_Institucion;
    $archivos = File::files('informeAlimentos/'.$id);
    return view('institucion.archAlimentos')->with('archivos',$archivos);
  }

  //Metodo para subir el informe de alimentos registrado en cada colegio
  public function subirInformeAlimentos(Request $request, $id){
    $rules = array('archivo' => 'max:5000|mimes:pdf');
    $messages = [
    'max'    => 'El archivo no debe ser mayor a 5 megabytes',
    'mimes' => 'El archivo debe ser un archivo de tipo: pdf',
  ];
    $validator = Validator::make(Input::all(), $rules, $messages );

    if($validator-> fails()){
      return redirect('/institucion/informeAlimentos')->withErrors($validator);
    }else {

    $file=$request->file('archivo');
    $nombre ="informeAlimentos/".$id."/".Carbon::now()->toDateString()."-".$file->getClientOriginalName();
    File::put($nombre,\File::get($file));
    }
    $archivos = File::files('informeAlimentos/'.$id);
    return \View('institucion.archAlimentos')->with('archivos',$archivos);
  }


  public function subirInformeAsistencia(Request $request, $id){

    $rules = array('archivo' => 'max:5000|mimes:pdf');
    $messages = [
    'max'    => 'El archivo no debe ser mayor a 5 megabytes',
    'mimes' => 'El archivo debe ser un archivo de tipo: pdf',
  ];
    $validator = Validator::make(Input::all(), $rules, $messages );

    if($validator-> fails()){
      return redirect('/institucion/infomeAsistencias')->withErrors($validator);
    }else {

    $file=$request->file('archivo');
    $nombre ="informeAsistencias/".$id."/".Carbon::now()->toDateString()."-".$file->getClientOriginalName();
    File::put($nombre,\File::get($file));
  }
    $asistencias = File::files('informeAsistencias/'.$id);
    return View('institucion.cargaListadoAsistencia')->with('asistencias',$asistencias);
  }

  /**
   *
   */
  public function listarArchivos(Request $request){
     $archivos = Storage::disk('informeAlimentos')->files();
     return \View('institucion.archAlimentos')->with('archivos',$archivos);
  }

  public function descargar($file, $file2, $file3){
      $pathtoFile = public_path().'//'.$file.'//'.$file2.'//'.$file3;
      return response()->download($pathtoFile);
  }

    /**
     *
     */
    public function descargarBeneficiarios($file){
      $pathtoFile = public_path().'//informeBeneficiarios//'.$file;
      return response()->download($pathtoFile);
    }

    /**
     *
     */
    public function viewModificarDatos(){
      $resultado = DB::table('sede_institucion')->where('id', '=', Auth::user()->Id_Sede_Institucion)->get();
      $institucion=$resultado->first();
      $telefono=$institucion->telefono;
      $direccion=$institucion->direccion;
      $rector=$institucion->rector;
      return view('institucion.modificarDatosIns',['rector' => $rector,'direccion'=>$direccion, 'telefono'=>$telefono]);
    }

    /**
     *
     */
    public function actualizarDatos(Request $request){

      $rector=  $request->get('rector');
      $direccion=  $request->get('direccion');
      $telefono=  $request->get('telefono');
      $nuevoPass= $request->get('nuevoPassword');

      $rules = array(
        'rector' => 'required|string|max:60',
        'direccion' => 'required|string|max:60',
        'telefono' => 'required|numeric|digits_between:7,15',
        'nuevoPassword' => 'required|between:6,20'
      );
      $messages = [
      'max'    => 'El campo :attribute no debe contener más de :max caracteres.',
      'required' => 'El campo :attribute es requerido.',
      'string'=> 'El campo :attribute puede contener distintos caracteres.',
      'between' => 'El campo Nueva Contraseña debe contener un número de caracteres entre: :min - :max.',
      'numeric' => 'El campo :attribute solo debe contener números.',
      'digits_between' => 'El campo :attribute debe tener entre :min - :max números.',
      ];
      $validator = Validator::make(Input::all(), $rules, $messages );


       if($validator-> fails()){
         // alert()->error('La contraseña debe tener como minimo 6 caracteres', 'Error')->persistent('Close');
         // return redirect()->back();
         return redirect('/institucion/modificarDatos')->withErrors($validator);
       }else{
          //insertar los datos nuevos
          DB::table('sede_institucion')
              ->where('id', Auth::user()->Id_Sede_Institucion)
              ->update(['rector'=>$rector,'direccion'=>$direccion,'telefono'=>$telefono]);

           //insertar la nueva clave
           DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['password' => bcrypt($nuevoPass)]);


             alert()->success('Los datos se han modificado', 'Exito')->persistent('Close');
             return redirect()->back();
       }
    }
}//fin de controlador
