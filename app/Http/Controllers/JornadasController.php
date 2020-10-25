<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Cache;
use DB;
use App\Charts\globalChart;
use PDF;

class JornadasController extends Controller
{
    public function listar()
    {
        return view('jornadasListar');
    }

    public function todos(Request $request)
    {
        $jornadas = DB::select("SELECT j.id, 
                                       j.tipo,
                                       j.fecha_inicio,
                                       j.fecha_fin,
                                       j.estado,
                                       CONCAT(u.name, ' ', u.lastname) AS encargado
                                FROM jornadas AS j
                                INNER JOIN users AS u ON
                                j.id_user = u.id");
        $data = json_encode(['data' => $jornadas]);
        return $data;
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
        DB::select('UPDATE sectores SET sector=? WHERE id_sector = ?', [$request->nombre, $request->id]);
        
        return $this->listar();
    }

    public function testpdf()
    {
        $pdf = PDF::loadHTML('<h1>hola</h1>');
        $pdf->download('prueba.pdf');
    }


}
