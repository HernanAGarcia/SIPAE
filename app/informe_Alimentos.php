<?php

namespace SIPAE;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class informe_Alimentos extends Model
{

protected $table = 'informe_alimentos';

protected $fillable = ['nombreArchivo','ruta'];


}
