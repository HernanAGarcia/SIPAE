<?php

namespace SIPAE\Http\Controllers;

use Illuminate\Http\Request;

class operadorController extends Controller
{
    public function incio(){
        return view('secretaria.perfilSecretaria');
    }
}
