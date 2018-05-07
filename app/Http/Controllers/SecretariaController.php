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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Alert;


class SecretariaController extends Controller
{


      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('secretaria');
    }


  /**
   * 
   */
  public function viewSecretaria(){
    return view('secretaria.perfilSecretaria');
  }

  /**
   * 
   */
  public function viewSecretariaListadosPAE(){
    return view('secretaria.cargarListados');
  }

  /**
   * 
   */
  public function viewRegInstitucion(){
    return view('secretaria.registroInstitucion');
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
    $archivos = File::files('informeAlimentos\\'.$id);
    return response()->json($archivos);
  }

  /**
   * 
   */
  public function descargarInforme($file, $file2, $file3){
    $pathtoFile = public_path().'\\'.$file.'\\'.$file2.'\\'.$file3;
    return response()->download($pathtoFile);
  }


  /**
   * 
   */
  public function viewSecretariaAsistencias(){
    //$archivos = Storage::disk('informeAlimentos')->files();
    $listaInstitucion = sede_institucion::listar()->get();
   return view('secretaria.informeAsistencias',compact('listaInstitucion','archivos'));
  }

  /**
   * 
   */
  public function getAsistencias($id){
    $archivos = File::files('informeAsistencias\\'.$id);
    return response()->json($archivos);
  }

  /**
   * 
   */
  public function descargarAsistencia($file, $file2, $file3){
    $pathtoFile = public_path().'\\'.$file.'\\'.$file2.'\\'.$file3;
    return response()->download($pathtoFile);
  }

  /**
   * 
   */
  public function viewSecretariaCertificaciones(){
    return view('secretaria.informeCertificacion');
  }

  /**
   * 
   */
  public function viewSecretariaModificarDatos(){
    return view('secretaria.modificarDatos');
  }

  /**
   * 
   */
  public function registrarInstitucion(Request $request){

    $nombreInstitucion= $request->get('nombreInstitucion');
    $nit= $request->get('NIT');
    $rector= $request->get('rector');;
    $direccion= $request->get('direccion');;
    $telefono= $request->get('telefono');;
    $correoElectronico= $request->get('email');;
    $password= $request->get('password');

    $idSecretaria= Auth::user()->id;

    
      $verificacion=$this->verificarRegistro($nit,$correoElectronico);
     if(!$verificacion){
          alert()->error('El Nit y el Correo de la institucion ya existe', 'Error')->persistent('Close');
          return redirect()->back();
      }else{
  
        //ingresar a la tabla de instituciones
         $idInstitucion=DB::table('sede_institucion')->insertGetId(['nombre'=>$nombreInstitucion,'rector'=>$rector,
         'codigo'=>$nit, 'email'=>$correoElectronico,'direccion'=>$direccion,
         'telefono'=>$telefono]);


           //ingresar en la tabla de usuarios para el inicio de sesion
           DB::table('users')->insert(['nombre_Usuario'=>$nombreInstitucion,'email'=>$correoElectronico,
           'password'=>Hash::make($password),'role'=>'institucion','Id_Sede_Institucion'=>$idInstitucion,'Id_Secretaria'=>$idSecretaria]);
           alert()->success('Registro completo', 'Aceptado')->persistent('Close');
           return redirect()->back();
      }
    
    
 }

 public function verificarRegistro($nit,$correo){
    $codigo=DB::table('sede_institucion')->where('codigo', $nit)->exists();
    $email= DB::table('sede_institucion')->where('email', $correo)->exists();

    if($codigo=='1' && $email=='1'){
      return false;
    }
    return true;
   
  }
}
