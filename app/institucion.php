<?php

namespace SIPAE;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class institucion extends Model
{

    public function setPathAttribute($path){
        $this->attributes['path']= Carbon::now()->second.$path->getOriginalName();
        $name=Carbon::now()->second.$path->getOriginalName();
        \Storage::disk('local')->put($name, \File::get($path));
    }
}
