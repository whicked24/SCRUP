<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\DatosPersonales;
use DB;
use Illuminate\Support\Facades\Log;
use Validator;

class DatosPersonalesController extends Controller
{
    public function getDatosPersonales()
    {
        $personas = DB::select('select * from users where eliminado = FALSE');
        return response()->json(['data'=>$personas]);
    }

    public function newDatosPersonales()
    {
        return view('datosPersonalesNuevo');
    }

    public function saveDatosPersonales(Request $request)
    {
        DB::insert('insert into users (vat, name, lastname, birthdate, phone, email, password, eliminado) values (?, ?, ?, ?, ?, ?, ?, FALSE)', [$request->cedula, $request->nombres, $request->apellidos, $request->fecha_nac, $request->telefono, $request->correo, bcrypt($request->contrasena)]);
        return view('datosPersonales');
    }

    public function editDatosPersonales($id)
    {
        $personas = DB::select('select * from users where id=?', [$id]);
        return view('datosPersonalesEditar', ['data'=>$personas]);
    }

    public function editSaveDatosPersonales(Request $request)
    {
        DB::update('update users set vat=?, name=?, lastname=?, birthdate=?, phone=?, email=? where id=?', [$request->cedula, $request->nombres, $request->apellidos, $request->fecha_nac, $request->telefono, $request->correo, $request->id]);
        return view('datosPersonales');
    }

    public function deleteDatosPersonales($id)
    {
        $personas = DB::update('update users set eliminado=TRUE where id=?', [$id]);

        return view('datosPersonales');



    }


}








