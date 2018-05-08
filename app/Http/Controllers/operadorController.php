<?php

namespace SIPAE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Carbon\Carbon;
use Input;
use File;
use DB;

class operadorController extends Controller
{
    /**
     *
     */
    public function inicio(){
        return view('operador.perfilOperador');
    }


    public function certificados(){

      $certificado = Storage::disk('informeCobertura')->files();
      return view('operador.certificadosCobertura')->with('certificado',$certificado);
      //return view('operador.certificadosCobertura');
    }


    public function anomalias(){
      return view('operador.reporteAnomalias');
    }




    public function descargar($file){
      $pathtoFile = public_path().'\\informeCobertura\\'.$file;
      return response()->download($pathtoFile);
    }


}//fin de controlador
