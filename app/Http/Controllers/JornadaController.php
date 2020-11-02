<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Auth;

class JornadaController extends Controller
{
    public function listadoJornadas(){
		
    	$jornada =  App\Jornada::lista();
    	
    	return view('jornadas.listadoJornadas',compact('jornada'));

       }

   public function formJornada($id=null){
 		
        $estatus=App\Estatu::find(['3','4','5','6']);
        $tipo_beneficiario=App\Tipo_beneficiario::all();
        $tipoJornada=App\Tipo_jornada::all();
         $data="";
      	
	return view('jornadas.formJornadas',compact('estatus','tipoJornada','tipo_beneficiario','data'));

   }


   public function addJornadas(Request $request){

  	$id_sector = Auth::user()->id_sector;
  	
   	$nuevaJornada= new App\Jornada();
   	$request->validate([
    'asunto' => ['required', 'string'],
    'descripcion' => ['required', 'string'],
    'jornada' => ['required', 'integer'],
    'beneficiario' => ['required', 'integer'],
    'fecha_inicio' => ['required', 'string'],
    'estatus' => ['required', 'integer'],
]);
   	$nuevaJornada->asunto=$request->asunto;
   	$nuevaJornada->descripcion=$request->descripcion;
   	$nuevaJornada->fktipo_jornada=$request->jornada;
   	$nuevaJornada->fktipo_beneficiario=$request->beneficiario;
   	$nuevaJornada->fecha_inicio=$request->fecha_inicio;
   	$nuevaJornada->fecha_fin=$request->fecha_fin;
  	$nuevaJornada->tiempo_estimado=$request->tiempo;
  	$nuevaJornada->fkestatus=$request->estatus;
  	$nuevaJornada->fkid_sector=$id_sector;

    $nuevaJornada->save();

   	 return redirect('/jornada');
   }

 //return view('jornadas.listadoJornadas',compact('jornada'));

   public function detalleJornadas($id){

     $jornada =  App\Jornada::buscar_id($id);     
      
     $xml='';
     $xml.='<div class="card">
  <h5 class="card-header"><b>Detalle Jornada de "'.$jornada[0]->jornadas.'"</b></h5>
  <div class="card-body">
    <h5 class="card-title">Asunto: <b>"'.$jornada[0]->asunto.'"</b></h5>
    <p class="card-text">Descripcion: '.$jornada[0]->descripcion.' Inicia:<b>'.$jornada[0]->fecha_inicio.'</b></p>
    <p class="card-text">Elaborada: '.$jornada[0]->created_at.' En el Sector: <b>'.$jornada[0]->sector.' actual mente se encuentra '.$jornada[0]->estatus.'</b></p>
     </div>
</div>';
  
      
     echo json_encode(array('xml' => $xml ));
}


  public function eliminarJornadas($id){

    $jornada= App\Jornada::find($id);

    $jornada->delete();

        return redirect('/jornada');

  }

public function editarJornadasform($id){

$data =  App\Jornada::buscar_id($id);
$estatus=App\Estatu::find(['3','4','5','6']);
$tipo_beneficiario=App\Tipo_beneficiario::all();
$tipoJornada=App\Tipo_jornada::all();   

  return view('jornadas.formJornadas',compact('estatus','tipoJornada','tipo_beneficiario','data'));
}


public function editarJornadas(Request $request,$id){
    $nuevaJornada =  App\Jornada::find($id);
    $nuevaJornada->id=$id;
    $nuevaJornada->asunto=$request->asunto;
    $nuevaJornada->descripcion=$request->descripcion;
    $nuevaJornada->fktipo_jornada=$request->jornada;
    $nuevaJornada->fktipo_beneficiario=$request->beneficiario;
    $nuevaJornada->fecha_inicio=$request->fecha_inicio;
    $nuevaJornada->fecha_fin=$request->fecha_fin;
    $nuevaJornada->tiempo_estimado=$request->tiempo;
    $nuevaJornada->fkestatus=$request->estatus;
  

    $nuevaJornada->save();
    return redirect('/jornada');
}


public function addjornadahistorico(Request $request,$id){

  $jornada= App\Jornada::find($id);

  $jornadaHistorico= new App\JornadaHistorico();

$jornadaHistorico->fkidjornada=$jornada->id;
$jornadaHistorico->cedula=$request->cedula;
$jornadaHistorico->asunto=$jornada->asunto;
$jornadaHistorico->descripcion=$jornada->descripcion;
$jornadaHistorico->fktipo_jornada=$jornada->fktipo_jornada;
$jornadaHistorico->fktipo_beneficiario=$jornada->fktipo_beneficiario;
$jornadaHistorico->fecha_inicio=$jornada->fecha_inicio;
$jornadaHistorico->fecha_fin=$jornada->fecha_fin;
$jornadaHistorico->fkestatus=$jornada->fkestatus;
$jornadaHistorico->fkid_sector=$jornada->fkid_sector;

//dd($jornada->id);

$jornadaHistorico->save();

  return back();
}



}