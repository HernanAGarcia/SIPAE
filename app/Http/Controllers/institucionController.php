<?php

namespace SIPAE\Http\Controllers;

use SIPAE\informeAlimentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Carbon\Carbon;
use Input;
use File;

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

    //obtener nombres de los archivos en carpeta informeAlimentos
   
    
    return view('institucion.archAlimentos')->with('archivos',$archivos);
  } 

  //Metodo para subir el informe de alimentos registrado en cada colegio
  public function subirArchivo(Request $request){
    $file=$request->file('archivo');
    $nombre =Carbon::now()->toDateString()."-".$file->getClientOriginalName();
       
    Storage::disk('informeAlimentos')->put($nombre,\File::get($file));

    //para insertar en la base de datos
    $informe = new informeAlimentos;

    $informe->nombrearchivo = $nombre;
    $informe->ruta="aqui va la ruta del servidor";
    $informe->id_Sede_Institucion='1';
    $informe->save();

    $archivos = Storage::disk('informeAlimentos')->files();
    return \View('institucion.archAlimentos')->with('archivos',$archivos); 

  }

  //Metodo para obtener y listar los archivos
  public function listarArchivos(Request $request){

    //obtener nombres de los archivos en carpeta informeAlimentos
     $archivos = Storage::disk('informeAlimentos')->files();
     return \View('institucion.archAlimentos')->with('archivos',$archivos); 
  }

  public function descargar($file){

    $pathtoFile = public_path().'\\informeAlimentos\\'.$file;
    return response()->download($pathtoFile);
  }
}
