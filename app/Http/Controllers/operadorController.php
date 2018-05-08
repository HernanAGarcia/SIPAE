<?php

namespace SIPAE\Http\Controllers;

use Illuminate\Http\Request;

class operadorController extends Controller
{
    /**
     * 
     */
    public function inicio(){
        return view('operador.perfilOperador');
    }
}
