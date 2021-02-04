<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataMaestra extends Model
{
    public static function consulta_simple(){

    	 return $this->hasManyThrough(estatus::class);
    }
}
