<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App;
class Htmlpdf extends Controller
{
 

 public function reportePersonas(){



 }


 public function reporteJornadas(Request $request){

 		$historico=App\JornadaHistorico::reporteFechaJornada();
	
 		//dd($historico);

        $pdf = PDF::loadView('pdf.reporteJornadas',compact('historico'));
		//para descargar el archivo
		//  return $pdf->download('ejemplo.pdf');	
		//para MOSTRAR EN UNA NUEVA PESTAÑA el archivo
         return $pdf->stream('ejemplo.pdf');
 }



}
