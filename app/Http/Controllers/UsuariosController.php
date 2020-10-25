<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Usuarios;
use DB;
use Log;
use Validator;
use Auth;

class UsuariosController extends Controller
{

    public function listar()
    {
        $idUsuarioActivo = Auth::user()->id;
        $usuarios = DB::select('SELECT id, name, lastname, vat, email, type FROM users');
        Log::info($usuarios);
        return view('usuariosListar', compact('usuarios'));
    }

    public function editar($id)
    {
        $usuario = DB::select('SELECT id, name, lastname, vat, email, type, id_sector FROM users WHERE id = ?', [$id]);
        $sectores = DB::select('SELECT id_sector AS id, sector AS nombre FROM sectores WHERE activo=TRUE');
        return view('usuariosEditar', compact('usuario', 'sectores'));
    }

    public function editarGuardar(Request $request)
    {
        Log::info('aqui');
        Log::info($request);
        DB::select('UPDATE users SET name=?, lastname=?, vat=?, email=?, type=?, id_sector=? WHERE id=?', [$request->name, $request->lastname, $request->vat, $request->email, $request->type,  $request->sector, $request->id]);
        Log::info('termino');
        return $this->listar();
    }

    public function getUsuarios()
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
        DB::insert('insert into users (vat, name, lastname, birthdate, phone, email, password, id_sector, eliminado) values (?, ?, ?, ?, ?, ?, ?, ?, FALSE)', [$request->cedula, $request->nombres, $request->apellidos, $request->fecha_nac, $request->telefono, $request->correo, bcrypt($request->contrasena), $request->sector ]);
        return view('datosPersonales');
    }

    public function editDatosPersonales($id)
    {
        $personas = DB::select('select * from users where id=?', [$id]);
        return view('datosPersonalesEditar', ['data'=>$personas]);
    }

    public function editSaveDatosPersonales(Request $request)
    {
        DB::update('update users set vat=?, name=?, lastname=?, birthdate=?, phone=?, email=?, id_sector=? where id=?', [$request->cedula, $request->nombres, $request->apellidos, $request->fecha_nac, $request->telefono, $request->correo, $request->sector, $request->id]);
        return view('datosPersonales');
    }

    public function deleteDatosPersonales($id)
    {
        $personas = DB::update('update users set eliminado=TRUE where id=?', [$id]);

        return view('datosPersonales');



    }


}








