<?php

namespace App\Http\Controllers;

use PDF;

class Generador extends Controller
{
    public function imprimir()
    {
        $pdf = PDF::loadView('ejemplo');
        return $pdf->download('ejemplo.pdf');
    }

}
