<?php

namespace SIPAE\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{

// Funcion que retorna la vista del index|
      public function index(){
        return view('index');
      }

//funcion que retorna la vista del perfil de secretaria
      public function viewSecretaria(){
        return view('perfilSecretaria');
      }

//funcion que retorna el perfil de institucion
      public function viewInstitucion(){
        return view('perfilInstitucion');
      }
}
