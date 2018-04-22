<?php

namespace SIPAE;

use Illuminate\Database\Eloquent\Model;

class Informe_Asistencia extends Model
{
  protected $table = 'informe_asistencia';
  protected $fillable = ['nombre'];
}
