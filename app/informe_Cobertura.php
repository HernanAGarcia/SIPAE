<?php

namespace SIPAE;

use Illuminate\Database\Eloquent\Model;

class informe_Cobertura extends Model
{
  protected $table = 'informe_cobertura';

  protected $fillable = ['nombreArchivo','ruta'];

}
