<?php

namespace SIPAE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Input;

class institucionController extends Controller
{

  //Funciones para las vistas del perfil de institucion
  public function viewInicioInstitucion(){
    return view('institucion.perfilInstitucion');
  }

  public function viewInstitucionAsistencias(){
    return view('institucion.cargaListadoAsistencia');
  }

  public function viewInstitucionAlimentos(){
    return view('institucion.archAlimentos');
  }

  //Metodo para subir el informe de alimentos registrado en cada colegio
  public function subirArchivo(Request $request){
    $file=$request->file('archivo');
    $nombre =$file->getClientOriginalName().Carbon::now()->toDateString();

    Storage::disk('informeAlimentos')->put($nombre,\File::get($file));
    return \View('institucion.archAlimentos')->with('respuesta','Archivo Subido'); 

  }
}
