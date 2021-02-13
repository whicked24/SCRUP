<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Cache;
use DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Charts\globalChart;
use App;

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
public function listadoGeneral(){

$tipos=DB::select("SELECT DISTINCT tipo FROM  public.data_maestra ");


return view('dataMaestra.listadoGeneral',compact('tipos'));
}




public function formGeneral($name){

$tipos=DB::select("SELECT * FROM  public.data_maestra WHERE tipo =?",[$name]);




return view('dataMaestra.formGeneral',compact('tipos'));

}









////////////ACAAAAAAA///////////////////////////////
public function adminDataFrom($id=null){

    if ($id=="" || $id==null) {
        $datos_sql=DB::select("SELECT DISTINCT tipo FROM data_maestra");
       $datos="";
    return view('dataMaestra.formGeneral',compact('datos','datos_sql'));
    }else{

       $datos=DB::select("SELECT * FROM  public.data_maestra WHERE id =?",[$id]); 
       return view('dataMaestra.formGeneral',compact('datos'));
    }




}


    public function agregarDatos(Request $request){

$sql_insert=DB::select("INSERT INTO public.data_maestra(tipo,nombre,codigo)VALUES(?,?,?)",[$request->tipo,$request->nombre,$request->codigo]);


return redirect()->route('home');
}
    public function editarDatos(Request $request,$id){
$sql_insert=DB::select("UPDATE  public.data_maestra SET tipo=?,nombre=?,codigo=?,fkestatus=? WHERE id=?",[$request->tipo,$request->nombre,$request->codigo,$request->estatus,$id]);

return redirect()->route('home');
}
    public function eliminarDatos($id){

$sql_insert=DB::select("DELETE FROM  public.data_maestra  WHERE id=?",[$id]);

return back();

}

}
