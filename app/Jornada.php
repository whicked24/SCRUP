<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Jornada extends Model
{
    public  function buscar(){

    	return $this->hasMany('App\Estatu', 'id','fkestatus');
    }

    public static function lista(){
    	$id_sector = Auth::user()->id_sector;
    	$jornadas = DB::table('jornadas')
					->join('estatus', 'jornadas.fkestatus', '=', 'estatus.id')
					->join('tipo_jornadas', 'jornadas.fktipo_jornada', '=', 'tipo_jornadas.id')
					->join('tipo_beneficiarios', 'jornadas.fktipo_beneficiario', '=', 'tipo_beneficiarios.id')
					->where('fkid_sector','=',$id_sector)
					->select('jornadas.*', 'estatus.descripcion as estatus', 'tipo_jornadas.descripcion as jornadas','tipo_beneficiarios.descripcion as beneficiario')
					->get();

            
            return $jornadas;
    }

    public static function buscar_id($id){
        $id_sector = Auth::user()->id_sector;
        $jornadas = DB::table('jornadas')
                    ->join('estatus', 'jornadas.fkestatus', '=', 'estatus.id')
                    ->join('tipo_jornadas', 'jornadas.fktipo_jornada', '=', 'tipo_jornadas.id')
                    ->join('tipo_beneficiarios', 'jornadas.fktipo_beneficiario', '=', 'tipo_beneficiarios.id')
                     ->join('sectores', 'jornadas.fkid_sector', '=', 'sectores.id_sector')
                    ->where('fkid_sector','=',$id_sector)
                    ->where('jornadas.id','=',$id)
                    ->select('jornadas.*', 'estatus.descripcion as estatus', 'tipo_jornadas.descripcion as jornadas','tipo_beneficiarios.descripcion as beneficiario','sectores.sector')
                    ->get();
            return $jornadas;
    }
}


