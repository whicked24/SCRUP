<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estatu extends Model
{
	protected $primaryKey="id";
	
    public  function buscar(){
    	//return $this->hasOne('App\Jornada','fkestatus');
    	return $this->hasMany('App\Jornada', 'fkestatus','id');
    
    }

    public function tiposDatos(){

    return $this->hasMany('App\TipoDatos');

    }
    public function tiposDatos2(){

    return $this->belongsTo('App\TipoDatos','fkestatus');

    }
}
