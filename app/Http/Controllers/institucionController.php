<?php

namespace SIPAE\Http\Controllers;

use SIPAE\informe_Alimentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Carbon\Carbon;
use Input;
use File;
use DB;

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

  public function viewInicioInstitucion(){
    return view('institucion.perfilInstitucion');
  }

  public function viewInstitucionAsistencias(){
    return view('institucion.cargaListadoAsistencia');
  }

  public function viewInstitucionBeneficiarios(){
    $listados = Storage::disk('informeBeneficiarios')->files();
    return view('institucion.listaBeneficiarios')->with('listados',$listados);
  }

  public function viewInstitucionAlimentos(){
    $archivos = Storage::disk('informeAlimentos')->files();
    return view('institucion.archAlimentos')->with('archivos',$archivos);
  }

  //Metodo para subir el informe de alimentos registrado en cada colegio
  public function subirInformeAlimentos(Request $request){
    $file=$request->file('archivo');
    $nombre =Carbon::now()->toDateString()."-".$file->getClientOriginalName();
    Storage::disk('informeAlimentos')->put($nombre,\File::get($file));
    
    $archivos = Storage::disk('informeAlimentos')->files();
    return \View('institucion.archAlimentos')->with('archivos',$archivos);

  }

  //Metodo para obtener y listar los archivos
  public function listarArchivos(Request $request){
     $archivos = Storage::disk('informeAlimentos')->files();
     return \View('institucion.archAlimentos')->with('archivos',$archivos);
  }

  public function descargar($file){
    $pathtoFile = public_path().'\\informeAlimentos\\'.$file;
    return response()->download($pathtoFile);
  }


    public function descargarBeneficiarios($file){
      $pathtoFile = public_path().'\\informeBeneficiarios\\'.$file;
      return response()->download($pathtoFile);
    }

}//fin de controlador
