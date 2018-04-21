<?php

namespace SIPAE;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Carbon\Carbon;

class informeAlimentos extends Model
{

  protected $table = 'informeAlimentos';

protected $fillable = ['nombre','ruta'];

public function setRutaAttribute($ruta){
  $this->attributes['ruta']=Carbon::now().$ruta->getOriginalName();
  $nombre= Carbon::now().$ruta->getOriginalName();
  Storage::disk('informeAlimentos')->put($nombre,\File::get($ruta));
}
=======

class informeAlimentos extends Model
{
    //
>>>>>>> master
}
