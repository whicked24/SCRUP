<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class TipoDatos extends Model
{
   public function estatusTipos(){

   	return $this->belongsTo('App\Estatu');

   }


   public static function listado(){

   	    	$tipo = DB::table('tipo_datos')
					->join('estatus', 'tipo_datos.fkestatus', '=', 'estatus.id')
					->select('tipo_datos.*', 'estatus.descripcion as estatus')
					->get();
          
            return $tipo;
   }


    public static function buscar_id($id){
      	$tipo = DB::table('tipo_datos')
					->join('estatus', 'tipo_datos.fkestatus', '=', 'estatus.id')
					 ->where('tipo_datos.id','=',$id)
					->select('tipo_datos.*', 'estatus.descripcion as estatus')
					->get();
            return $tipo;	
    }
}
