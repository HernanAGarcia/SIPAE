<?php

namespace SIPAE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\http\Controllers\Controllers;
use SIPAE\institucion;
use SIPAE\Sede_Institucion;
use Illuminate\Support\CollectionStdClass;
use Illuminate\Support\Facades\Storage;

class SecretariaController extends Controller
{

  // Funcion que retorna la vista del index|
  public function login(){
    return view('auth.login');
  }

  //funcion que retorna la vista del perfil de secretaria
  public function viewSecretaria(){
    return view('secretaria.perfilSecretaria');
  }

  //Retorna la vista que permite cargar el listado de estudiantes del PAE
  public function viewSecretariaListadosPAE(){
    return view('secretaria.cargarListados');
  }

  public function viewSecretariaListadoAlimentos(){
    //return view('secretaria.informeAlimentos');
    $archivos = Storage::disk('informeAlimentos')->files();
    $listaInstitucion = institucion::listar()->get();
   return view('secretaria.informeAlimentos',compact('listaInstitucion','archivos'));


  // $archivos = Storage::disk('informeAlimentos')->files();
   //return view('institucion.archAlimentos')->with('archivos',$archivos);
  }


  public function viewSecretariaAsistencias(){
    $listaInstitucion = institucion::listar()->get();
   return view('secretaria.informeAsistencias',compact('listaInstitucion'));
  }

  public function getSedes($id){
      $sedeInstitucion = Sede_Institucion::listarSedes($id);
      return response()->json($sedeInstitucion);
  }

  public function viewSecretariaCertificaciones(){
    return view('secretaria.informeCertificacion');
  }

  public function viewSecretariaModificarDatos(){
    return view('secretaria.modificarDatos');
  }

}
