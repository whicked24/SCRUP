<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Cache;
use DB;
use App\Charts\globalChart;

class SectoresController extends Controller
{
    public function listar()
    {
        $sectores = DB::select('SELECT id_sector as id, 
                                       sector as nombre, 
                                       activo 
                                FROM sectores
                                ORDER BY id_sector');
        return view('sectoresListar', compact('sectores'));
    }

    public function nuevo()
    {
        return view('sectoresNuevo');
    }

    public function guardar(Request $request)
    {
        DB::select('INSERT INTO sectores (sector,
                                          activo)
                    VALUES (?, ?)',
                    [$request->nombre,
                    true]);
        return $this->listar();
    }

    public function cambiarEstado($id)
    {
        $activo = DB::select('SELECT activo FROM sectores WHERE id_sector = ?', [$id]);
        if ($activo[0]->activo){
            $activo = false;
        }else{
            $activo = true;
        }
        DB::select('UPDATE sectores SET activo=? WHERE id_sector=?',[$activo, $id]);
        return $this->listar();
    }

    public function editar($id)
    {
        $sector = DB::select('SELECT id_sector AS id, 
                                     sector AS nombre
                              FROM sectores WHERE id_sector = ?', [$id]);
        //dd($sector);
        
        return view('sectoresEditar', ['sector'=>$sector]);
    }

    public function editarGuardar(Request $request)
    {   
        //dd($request);
        DB::select('UPDATE sectores SET sector=? WHERE id_sector = ?', [$request->nombre, $request->id]);
        
        return $this->listar();
    }


}
