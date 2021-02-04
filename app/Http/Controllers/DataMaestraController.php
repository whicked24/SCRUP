<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Cache;
use DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Charts\globalChart;

class DataMaestraController extends Controller
{
  

public function form(){


return view('dataMaestra.form',compact('jornada'));
}


public function listarAnimales(){

$animales = DB::select("SELECT id,tipo,nombre,codigo,case when(fkestatus='1') then 'Activo'
	when(fkestatus='2') then 'Inactivo'
end as estatus  FROM data_maestra WHERE tipo=?",['animales']);




return view('dataMaestra.listarAnimales',compact('animales'));
}

public function formAnimales($nombre){


return view('dataMaestra.formAnimales',compact('jornada'));
}

public function agregarAnimales(Request $request){
	$request->validate([
    'tipo' => ['required', 'string'],
    'nombre' => ['required', 'string'],
    'codigo' => ['required', 'string'],
  
]);
$animales=DB::select("INSERT INTO data_maestra(tipo,nombre,codigo)VALUES(?,?,?)",[$request->tipo,$request->nombre,$request->codigo]);


 return redirect('adminitracion/animales');
}


public function listarPlagas(){

$plagas = DB::select("SELECT id,tipo,nombre,codigo,case when(fkestatus='1') then 'Activo'
	when(fkestatus='2') then 'Inactivo'
end as estatus  FROM data_maestra WHERE tipo=?",['plaga']);


return view('dataMaestra.listarPlagas',compact('plagas'));
}

public function formPlagas(){


return view('dataMaestra.formPlagas',compact('jornada'));
}
public function agregarPlagas(Request $request){
	$request->validate([
    'tipo' => ['required', 'string'],
    'nombre' => ['required', 'string'],
    'codigo' => ['required', 'string'],
  
]);
$animales=DB::select("INSERT INTO data_maestra(tipo,nombre,codigo)VALUES(?,?,?)",[$request->tipo,$request->nombre,$request->codigo]);


 return redirect('adminitracion/plagas');
}

public function listarEnfermedades(){

$enfermedades = DB::select("SELECT id,tipo,nombre,codigo,case when(fkestatus='1') then 'Activo'
	when(fkestatus='2') then 'Inactivo'
end as estatus  FROM data_maestra WHERE tipo=? ",['enfermedades']);


return view('dataMaestra.listarEnfermedades',compact('enfermedades'));
}

public function formEnfermedades(){


return view('dataMaestra.formEnfermedades');
}
public function agregarEnfermedades(Request $request){
	$request->validate([
    'tipo' => ['required', 'string'],
    'nombre' => ['required', 'string'],
    'codigo' => ['required', 'string'],
  
]);
$animales=DB::select("INSERT INTO data_maestra(tipo,nombre,codigo)VALUES(?,?,?)",[$request->tipo,$request->nombre,$request->codigo]);


 return redirect('adminitracion/enfermedades');
}

}
