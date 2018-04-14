<?php

namespace SIPAE;

use Illuminate\Database\Eloquent\Model;

class Sede_Institucion extends Model
{
    protected $table = 'sedesInstitucion';
    protected $fillable = ['nombre'];


    public static function sedes($id){

      return Sede_Institucion::where('Id_Institucion','=',$id)->get();

    }
}
