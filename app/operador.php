<?php

namespace SIPAE;

use Illuminate\Database\Eloquent\Model;

class operador extends Model
{
  protected $table = 'operador';
  protected $fillable = ['nombre','direccion'];
}
