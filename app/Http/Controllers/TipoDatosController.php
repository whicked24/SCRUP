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

class TipoDatosController extends Controller
{
  public function listadotipo(){

$tipos=App\TipoDatos::listado();

return view('tipoDatos.listadoTipoDatos',compact('tipos'));
}

public function formTipo($name){

$tipos=App\TipoDatos::buscar_id($name);

return view('tipoDatos.formTipoDatos',compact('tipos'));
}

public function editarTipoDatos(Request $request){
//print_r($_POST);



}


}
