<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\enviarModel;

class enviar extends Controller
{
    puiblic function envioDePrueba(Request $request)
	{
		$request->apellido;
		enviarModel::guardar($request);
	}
}
