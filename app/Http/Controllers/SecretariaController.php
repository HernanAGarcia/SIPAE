<?php

namespace SIPAE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\http\Controllers\Controllers;
use SIPAE\institucion;
use SIPAE\Sede_Institucion;
use Illuminate\Support\CollectionStdClass;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SecretariaController extends Controller
{


      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
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
    $archivos = Storage::disk('informeAlimentos')->files();
    $listaInstitucion = Sede_Institucion::listar()->get();
   return view('secretaria.informeAlimentos',compact('listaInstitucion','archivos'));
  }


  public function viewSecretariaAsistencias(){
    $archivos = Storage::disk('informeAlimentos')->files();
    $listaInstitucion = sede_institucion::listar()->get();
   return view('secretaria.informeAsistencias',compact('listaInstitucion','archivos'));
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
