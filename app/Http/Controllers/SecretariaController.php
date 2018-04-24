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
    $listaInstitucion = Sede_Institucion::listar()->get();
   return view('secretaria.informeAlimentos',compact('listaInstitucion','archivos'));
  }

  public function getFiles($id){
    $archivos = File::files('informeAlimentos/'.$id);
    return response()->json($archivos);
  }

  public function viewSecretariaAsistencias(){
    $listaInstitucion = Sede_Institucion::listar()->get();
   return view('secretaria.informeAsistencias',compact('listaInstitucion'));
  }


  public function viewSecretariaCertificaciones(){
    return view('secretaria.informeCertificacion');
  }

  public function viewSecretariaModificarDatos(){
    return view('secretaria.modificarDatos');
  }

}
