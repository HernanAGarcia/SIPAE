<?php

namespace SIPAE;

use Illuminate\Database\Eloquent\Model;

class Sede_Institucion extends Model
{
    protected $table = 'sede_Institucion';
    protected $fillable = ['nombre'];


    public static function listarSedes($id){
    //  $sedesInst=DB::table('Sede_Institucion')->where('Id_Institucion','=',$id)->get();
      return Sede_Institucion::where('Id_Institucion','=',$id)->get();

    }
}
