<?php

namespace SIPAE;

use Illuminate\Database\Eloquent\Model;

class informeCobertura extends Model
{
  protected $table = 'informe_cobertura';

  protected $fillable = ['nombreArchivo','ruta'];

}
