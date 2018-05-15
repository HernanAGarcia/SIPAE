<?php

namespace SIPAE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Input;
use File;
use DB;
use Alert;

class operadorController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('operador');
    }


    /**
     *
     */
    public function inicio(){
        return view('operador.perfilOperador');
    }

    /**
     *
     */
    public function certificados(){

      $certificado = Storage::disk('informeCobertura')->files();
      return view('operador.certificadosCobertura')->with('certificado',$certificado);
      //return view('operador.certificadosCobertura');
    }

    /**
     *
     */
    public function anomalias(){
      return view('operador.reporteAnomalias');
    }



    /**
     *
     */
    public function descargar($file){
      $pathtoFile = public_path().'//informeCobertura//'.$file;
      return response()->download($pathtoFile);
    }

    /**
     *
     */
    public function viewModificarDatos(){
      return view('operador.modificarDatosOp');
    }

    /**
     *
     */
    public function actualizarDatos(Request $request){
      $nuevoPass= $request->get('nuevosPassword');
      if(strlen($nuevoPass)<6){
        alert()->error('La contraseña debe tener como minimo 6 caracteres', 'Error')->persistent('Close');
        return redirect()->back();
      }else{
         DB::table('users')
             ->where('id', Auth::user()->id)
             ->update(['password' => bcrypt($nuevoPass)]);
             alert()->success('La contraseña se ha cambiado', 'Exito')->persistent('Close');
              return redirect()->back();
      }
    }

}//fin de controlador
