<?php

namespace SIPAE\Http\Controllers;

use Illuminate\Http\Request;

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
    return view('secretaria.informeAsistencias');
  }

  public function viewSecretariaCertificaciones(){
    return view('secretaria.informeCertificacion');
  }

  public function viewSecretariaModificarDatos(){
    return view('secretaria.modificarDatos');
  }

  //Funciones para las vistas del perfil de institucion
  public function viewInicioInstitucion(){
    return view('institucion.perfilInstitucion');
  }

  public function viewInstitucionAsistencias(){
    return view('institucion.cargaListadoAsistencia');
  }


}
