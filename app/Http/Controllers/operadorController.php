<?php

namespace SIPAE\Http\Controllers;

use Illuminate\Http\Request;

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

    public function viewCertificado(){
        return view('operador.verCertificadosCobertura');
    }

    public function viewAnomalias(){
        return view('operador.reportAnomalias');
    }
}
