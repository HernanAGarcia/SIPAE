<?php

namespace SIPAE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\http\Controllers\Controllers;
use SIPAE\institucion;
use SIPAE\Sede_Institucion;
use Illuminate\Support\CollectionStdClass;

class PaginasController extends Controller
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
    return view('secretaria.informeAlimentos');
  }

  public function viewSecretariaAsistencias(){

     $insts = DB::table('institucion')->get();

    return view('secretaria.informeAsistencias')->with('insts',$insts);
  
      $listaInstitucion=DB::table('institucion')->select('nombre','id')->get();
      return view('secretaria.informeAsistencias')->with('listaInstitucion',$listaInstitucion);
  }


  public function getSedes(Request $request, $id){
    if($request->ajax()){
      $sedes = Sede_Institucion::sedes($id);
      return response()->jason($sedes);
    }
  }

  public function viewSecretariaCertificaciones(){
    return view('secretaria.informeCertificacion');
  }

  public function viewSecretariaModificarDatos(){
    return view('secretaria.modificarDatos');
  }

}
