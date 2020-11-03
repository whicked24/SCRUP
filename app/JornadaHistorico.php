<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class JornadaHistorico extends Model
{
    
    public static function validarbeneficio($cedula,$idjornada){


        $beneficiario = DB::table('jornada_historicos')
					->select(DB::raw('count(*) as cantidad'))
					->where('cedula','=',$cedula)
					->where('fkidjornada','=',$idjornada)
					->whereDate('created_at','=',date('Y-m-d'))

       			    ->get();
            return $beneficiario;

    }




    public static function reporteFechaJornada(){


        $beneficiario = DB::table('jornada_historicos')
					->select('jornada_historicos.*')
					->whereDate('created_at','=',date('Y-m-d'))

       			    ->get();
            return $beneficiario;

    }



}
