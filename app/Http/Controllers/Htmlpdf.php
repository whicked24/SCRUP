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
         return $pdf->stream('ejemplo.pdf');
 }


 public function vistaPlanillas(){

 	$tipos_planilla = App\tipo_planilla::all();

 	return view('planillas.formPlanillas',compact('tipos_planilla'));
 }

public function generarPlanilla(Request $request){

		$vsita='pdf.'.$request->planilla;
		$doc= $request->planilla."_".$request->cedula.".pdf";
		$pdf = PDF::loadView($vsita);
	    return $pdf->download($doc);


}

public function enviarmailpdf(){

	Mail::send('emails/templates/send-invoice', $messageData, function ($mail) use ($pdf) {
    $mail->from('john@styde.net', 'John Doe');
    $mail->to('user@styde.net');
    $mail->attachData($pdf->output(), 'test.pdf');
});
}


}
