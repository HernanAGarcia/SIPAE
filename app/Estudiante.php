<?php

namespace SIPAE;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
  protected $table = 'estudiante';
  protected $fillable = ['nombre'];
}
