<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Tipo_jornadaController extends Controller
{
    

	public function listarTipo(){

	$tipoJornada=App\Tipo_jornada::all();
	
	

	return view('tipoJornada.listarTipo',compact('tipoJornada'));
	}	


	public function formTipo(){



return view('tipoJornada.formTipo');
	}


	public function agregarTipo(Request $request){


		dd($request);

	}
}
