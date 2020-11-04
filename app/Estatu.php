<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estatu extends Model
{
    public  function buscar(){
    	//return $this->hasOne('App\Jornada','fkestatus');
    	return $this->hasMany('App\Jornada', 'fkestatus','id');
    
    }
}
