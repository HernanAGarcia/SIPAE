<?php

namespace SIPAE;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sede_Institucion extends Model
{
    protected $table = 'sede_Institucion';
    protected $fillable = ['nombre'];


    public static function listarSedes($id){
    //  $sedesInst=DB::table('Sede_Institucion')->where('Id_Institucion','=',$id)->get();
      return Sede_Institucion::where('Id_Institucion','=',$id)->get();

    }


    public static function mostrarCodigo($id){
    //  $sedesInst=DB::table('Sede_Institucion')->where('Id_Institucion','=',$id)->get();
      //return Sede_Institucion::where('id','=',$id)->get();
      $sede = DB::table('Sede_Institucion')
                     ->select('codigo')
                     ->where('id','=',$id)
                     ->get();
    return $sede;
    }


    public static function rutas($id){
    //  $sedesInst=DB::table('Sede_Institucion')->where('Id_Institucion','=',$id)->get();
    //$archivos = File::files("informeAlimentos/1");
      return File::files('informeAlimentos/1');

    }



    public function scopeListar($query){
        return $query->select('nombre','id', 'codigo');
    }
}
