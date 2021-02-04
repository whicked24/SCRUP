<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Cache;
use DB;
use Auth;
use App\Charts\globalChart;


class CensoController extends Controller
{
    public function listar()
    {
        $censos = DB::select('SELECT c.id, c.id as numero_planilla, c.fecha_creacion as fecha, p.cedula, p.nombre, p.apellido FROM censo as c INNER JOIN personas as p ON c.id_jefe_familia = p.id WHERE c.eliminado = FALSE');
        return view('censoListar', compact('censos'));
    }

    public function nuevo()
    {
        $enfermedades = DB::select('SELECT id, descripcion FROM enfermedad');
        $discapacidades = DB::select('SELECT id, descripcion FROM discapacidad');

        $genero= DB::select('SELECT id, nombre FROM data_maestra WHERE tipo=?',['genero']);
        $estado_civil= DB::select('SELECT id, nombre FROM data_maestra WHERE tipo=?',['estado_civil']);
        $nivel_instruccion= DB::select('SELECT id, nombre FROM data_maestra WHERE tipo=?',['nivel_intruccion']);
        $nacionalidad= DB::select('SELECT id, nombre FROM data_maestra WHERE tipo=?',['nacionalidad']);
        $animales= DB::select('SELECT id, nombre FROM data_maestra WHERE tipo=?',['animales']);
        $plagas= DB::select('SELECT id, nombre FROM data_maestra WHERE tipo=?',['plaga']);
        $id_sector = Auth::user()->id_sector;
        $sector = DB::select('SELECT id_sector AS id, sector AS nombre FROM sectores WHERE id_sector=?',[$id_sector]);
        return view('censoNuevo', compact('enfermedades', 'discapacidades', 'sector','genero','estado_civil','nivel_instruccion','nacionalidad','animales','plagas'));
    }

    public function editar($id)
    {
        $censo = DB::select('SELECT c.id as numero_planilla, c.fecha_creacion as fecha, p.nacionalidad, p.cedula, p.nombre, p.apellido, p.id as id_persona FROM censo as c INNER JOIN personas as p ON c.id_jefe_familia = p.id WHERE c.id = ?', [$id]);
        return view('censoEditar', compact('censo'));
    }

    public function editarGuardar(Request $request)
    {
        DB::select('UPDATE censo SET fecha_creacion=? WHERE id=?', [$request->fecha, intval($request->id_censo)]);
        DB::select('UPDATE personas SET nombre=?, apellido=? WHERE id=?', [$request->nombre, $request->apellido, intval($request->id_persona)]);
        

       DB::select('UPDATE censo SET id=?, fecha_creacion=?, id_jefe_familia=?, nivel_instruccion=?, 
       tipo_institucion=?, profesion=?, nom_inst_laboral=?, ingreso_mensual=?, 
       id_vivienda=?, aguas_blancas=?, tanques_agua=?, aguas_servidas=?, 
       gas=?, cantidad_bombonas=?, sistema_electrico=?, planta_electrica=?, 
       bombillos_ahorradores=?, transporte=?, ayuda_familiar=?, eliminado=?, 
       nom_inst_educativa=?, recoleccion_basura=?
 WHERE id=?', [intval($request->nivel_instruccion), intval($request->tipo_institucion), $request->profesion, $request->nom_inst_laboral, intval($request->ingreso_mensual),intval($request->id_vivienda), intval($request->aguas_blancas),  intval($request->tanques_agua),  intval($request->aguas_servidas), intval($request->gas), intval($request->cantidad_bombonas), intval($request->sistema_electrico), intval($request->planta_electrica), intval($request->bombillos_ahorradores), intval($request->transporte), $request->ayuda_familiar, $request->elimindo, $request->nom_inst_educativa, $request->recoleccion_basura]);
        return $this->listar();
    }

    public function nuevoGuardar(Request $request)
    {
        Log::info('prueba');
        Log::info($request);
        //log::info(json_decode($request->animales));


        $jefe_familia_id = DB::select('SELECT id FROM personas WHERE cedula=? LIMIT 1', [intval($request->cedula)]);
        if (count($jefe_familia_id) > 0){
            $jefe_familia_id = $jefe_familia_id[0]->id;
        }else{
         $jefe_familia_id = DB::select('INSERT INTO personas (nombre,
                                                          apellido,
                                                          cedula,
                                                          fecha_nac,
                                                          estado_civil,
                                                          parentesco,
                                                          nacionalidad,
                                                          sexo)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?) RETURNING id',
                                    [$request->nombre,
                                     $request->apellido,
                                     $request->cedula,
                                     $request->fecha_nacimiento,
                                     intval($request->estado_civil),
                                     0,
                                     intval($request->nacionalidad),
                                     intval($request->sexo)])[0]->id;
        }
        

        $vivienda_id = DB::select('INSERT INTO vivienda (nro_casa,
                                                         tipo,
                                                         estado,
                                                         tenencia)
                                   VALUES (?, ?, ?, ?) RETURNING id',
                                   [intval($request->numero_vivienda),
                                    $request->tipo_vivienda,
                                    $request->estado_vivienda,
                                    $request->tenencia_vivienda])[0]->id;

        

        $censo = DB::select('INSERT INTO censo (fecha_creacion,
                                                id_jefe_familia,
                                                nivel_instruccion,
                                                tipo_institucion,
                                                profesion,
                                                nom_inst_laboral,
                                                ingreso_mensual,
                                                id_vivienda,
                                                aguas_blancas,
                                                tanques_agua,
                                                aguas_servidas,
                                                gas,
                                                cantidad_bombonas,
                                                sistema_electrico,
                                                planta_electrica,
                                                bombillos_ahorradores,
                                                transporte,
                                                ayuda_familiar,
                                                eliminado,
                                                nom_inst_educativa,
                                                recoleccion_basura) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) RETURNING id', 
                                    [$request->fecha, 
                                    $jefe_familia_id,
                                    intval($request->nivel_instruccion),
                                    intval($request->tipo_institucion_educativa),
                                    $request->profesion,
                                    $request->nombre_institucion_laboral,
                                    intval($request->ingreso_mensual),
                                    $vivienda_id,
                                    intval($request->aguas_blancas),
                                    intval($request->tanque_agua),
                                    intval($request->aguas_servidas),
                                    intval($request->gas),
                                    intval($request->bombona_gas),
                                    intval($request->sistema_electrico),
                                    intval($request->planta_electrica),
                                    intval($request->bombillos_ahorradores),
                                    intval($request->transporte),
                                    $request->ayuda_nucleo,
                                    FALSE,
                                    $request->nombre_institucion_educativa,
                                    intval($request->recoleccion_basura)])[0]->id;

        
        DB::select('INSERT INTO espacios_vivienda (cocina,
                                                   bano,
                                                   sala,
                                                   habitaciones,
                                                   id_censo)
                    VALUES (?, ?, ?, ?, ?)',
                    [intval($request->cocina),
                     intval($request->bano),
                     intval($request->sala),
                     intval($request->habitaciones),
                     $censo]);

        DB::select('INSERT INTO electrodomesticos (nevera,
                                                   cocina,
                                                   microondas,
                                                   lavadora,
                                                   televisor,
                                                   ventilador_aire,
                                                   id_censo)
                    VALUES (?, ?, ?, ?, ?, ?, ?)',
                    [intval($request->nevera),
                     intval($request->cocina_electroromestico),
                     intval($request->microondas),
                     intval($request->lavadora),
                     intval($request->televisor),
                     intval($request->ventilador_aire),
                     $censo]);

        if (count($request->plagas) > 0){
            $plagas['ratones'] = 0;
            $plagas['hormigas'] = 0;
            $plagas['cucarachas'] = 0;
            $plagas['moscas'] = 0;
            $plagas['otros'] = '';
            foreach ($request->plagas as $plaga){
                if ($plaga == 'ratones'){
                    $plagas['ratones'] = 1;
                }else if ($plaga == 'cucarachas'){
                    $plagas['cucarachas'] = 1;
                }else if ($plaga == 'hormigas'){
                    $plagas['hormigas'] = 1;
                }else if ($plaga == 'moscas'){
                    $plagas['moscas'] = 1;
                }else if ($plaga == 'otros'){
                    $plagas['otros'] = $request->plagas_otros_descripcion;
                }

                DB::select('INSERT INTO plagas (ratones,
                                                hormigas,
                                                cucarachas,
                                                moscas,
                                                otros,
                                                id_censo)
                            VALUES (?, ?, ?, ?, ?, ?)',
                            [$plagas['ratones'],
                             $plagas['hormigas'],
                             $plagas['cucarachas'],
                             $plagas['moscas'],
                             $plagas['otros'],
                             $censo]);
            }
        }

        if (count($request->servicios) > 0){
            $servicios['mercado'] = 0;
            $servicios['bodega'] = 0;
            $servicios['farmacia'] = 0;
            $servicios['plaza'] = 0;
            $servicios['otros'] = '';
            foreach ($request->servicios as $servicio){
                if ($servicio == 'mercado'){
                    $servicios['mercado'] = 1;
                }else if ($servicio == 'bodega'){
                    $servicios['bodega'] = 1;
                }else if ($servicio == 'farmacia'){
                    $servicios['farmacia'] = 1;
                }else if ($servicio == 'plaza'){
                    $servicios['plaza'] = 1;
                }else if ($servicio == 'otros'){
                    $servicios['otros'] = $request->servicios_otros_descripcion;
                }

                DB::select('INSERT INTO servicios_comunales (mercado,
                                                bodega,
                                                farmacia,
                                                plaza_parque,
                                                otros,
                                                id_censo)
                            VALUES (?, ?, ?, ?, ?, ?)',
                            [$servicios['mercado'],
                             $servicios['bodega'],
                             $servicios['farmacia'],
                             $servicios['plaza'],
                             $servicios['otros'],
                             $censo]);
            }
        }

        $enfermedades = json_decode($request->enfermedades);
        if (count($enfermedades) > 0){
            foreach ($enfermedades as $enfermedad){
                DB::select('INSERT INTO personas_enfer (id_enfer,
                                                        id_persona)
                            VALUES (?, ?)',
                            [intval($enfermedad),
                             $jefe_familia_id]);
            }
        }

        $paredes = json_decode($request->paredes);
        if (count($paredes) > 0){
            foreach ($paredes as $pared){
                DB::select('INSERT INTO paredes (tipo,
                                                 id_censo)
                            VALUES (?, ?)',
                            [intval($pared),
                             $censo]);
            }
        }

        $techos = json_decode($request->techos);
        if (count($techos) > 0){
            foreach ($techos as $techo){
                DB::select('INSERT INTO techo (tipo,
                                                 id_censo)
                            VALUES (?, ?)',
                            [intval($techo),
                             $censo]);
            }
        }

        $animales = json_decode($request->animales);
        if (count($animales) > 0){
            foreach ($animales as $animal){
                DB::select('INSERT INTO animales (tipo,
                                                 cantidad,
                                                 id_censo)
                            VALUES (?, ?, ?)',
                            [intval($animal[0]),
                             intval($animal[1]),
                             $censo]);
            }
        }

        $familiares = json_decode($request->familiares);
        if (count($familiares) > 0){
            foreach ($familiares as $familiar){

                $id_familiar = DB::select('SELECT id FROM personas WHERE cedula=? LIMIT 1', [intval($familiar[1])]);
                if (count($id_familiar) > 0){
                    $id_familiar = $id_familiar[0]->id;
                }else{
                    $id_familiar = DB::select('INSERT INTO personas (nombre,
                                                                     apellido,
                                                                     cedula,
                                                                     fecha_nac,
                                                                     estado_civil,
                                                                     parentesco,
                                                                     nacionalidad,
                                                                     sexo)
                                               VALUES (?, ?, ?, ?, ?, ?, ?, ?) RETURNING id',
                                               [$familiar[2],
                                                $familiar[3],
                                                intval($familiar[1]),
                                                $familiar[4],
                                                0,
                                                intval($familiar[5]),
                                                intval($familiar[0]),
                                                intval($familiar[6])])[0]->id;
                }

                DB::select('INSERT INTO carga_familiar (id_persona,
                                                        id_censo)
                                    VALUES (?, ?)',
                                    [$id_familiar,
                                     $censo]);

                $enfermedades_familiares = json_decode($request->enfermedades_familiares);
                if (count($enfermedades_familiares) > 0){
                    foreach ($enfermedades_familiares as $enfermedad_familiar){
                        if ($familiar[1] == $enfermedad_familiar[0]){
                            DB::select('INSERT INTO personas_enfer (id_enfer,
                                                                    id_persona)
                                        VALUES (?, ?)',
                                        [intval($enfermedad_familiar[1]),
                                        $id_familiar]);
                        }
                    }
                }

                $discapacidades_familiares = json_decode($request->discapacidades_familiares);
                if (count($discapacidades_familiares) > 0){
                    foreach ($discapacidades_familiares as $discapacidad_familiar){
                        if ($familiar[1] == $discapacidad_familiar[0]){
                            DB::select('INSERT INTO personas_dis (id_discapacidad,
                                                                  id_persona)
                                        VALUES (?, ?)',
                                        [intval($discapacidad_familiar[1]),
                                        $id_familiar]);
                        }
                    }
                }
                
            }
        }
        return 'Ok';
    }

    public function eliminar($id)
    {
        DB::select('UPDATE censo SET eliminado=TRUE WHERE id=?', [$id]);
        return $this->listar();
    }

    public function estadisticaGlobal()
    {
        return view('buscarCensos');
    }

    public function generarEstadisticaGlobal(Request $request)
    {
        $personas = DB::select('SELECT fecha_nac, sexo
                                FROM personas
                                WHERE id IN (
                                    SELECT id_jefe_familia AS id_persona
                                    FROM censo
                                    WHERE fecha_creacion>=? AND fecha_creacion<=?
                                    UNION
                                    SELECT id_persona
                                    FROM carga_familiar
                                    WHERE id_censo IN (
                                        SELECT id
                                        FROM censo
                                        WHERE fecha_creacion>=? AND fecha_creacion<=?
                                    )
                                )', [$request->desde, $request->hasta, $request->desde, $request->hasta]);
        
        $bebes = [0,0];
        $ninos = [0,0];
        $adolecentes = [0,0];                                        
        $adultos = [0,0];
        $tercera_edad = [0,0];
        foreach ($personas as $persona){
            $edad = date_diff(date_create($persona->fecha_nac), date_create('now'))->y;
            if ($edad < 1){
                if ($persona->sexo == 1){
                    $bebes[0]++;
                }else{
                    $bebes[1]++;
                }
            }else if ($edad > 0 and $edad < 12){
                if ($persona->sexo == 1){
                    $ninos[0]++;
                }else{
                    $ninos[1]++;
                }
            }else if ($edad > 11 and $edad < 18){
                if ($persona->sexo == 1){
                    $adolecentes[0]++;
                }else{
                    $adolecentes[1]++;
                }
            }if ($edad > 17){
                if ($persona->sexo == 1){
                    if ($edad < 60){
                        $adultos[0]++;
                    }else{
                        $tercera_edad[0]++;
                    }
                }else{
                    if ($edad < 55){
                        $adultos[1]++;
                    }else{
                        $tercera_edad[1]++;
                    }
                }
            }
        }
        
        $chartBebes = new globalChart;
        $chartBebes->labels(['Masculino', 'Femenino']);
        $datasetBebes = $chartBebes->dataset('Bebes', 'pie', $bebes);
        $datasetBebes->backgroundColor(collect(['#7158e2','#3ae374']));
        $datasetBebes->color(collect(['#7d5fff','#32ff7e']));

        $chartNinos = new globalChart;
        $chartNinos->labels(['Masculino', 'Femenino']);
        $datasetNinos = $chartNinos->dataset('Bebes', 'pie', $ninos);
        $datasetNinos->backgroundColor(collect(['#7158e2','#3ae374']));
        $datasetNinos->color(collect(['#7d5fff','#32ff7e']));

        $chartAdolecentes = new globalChart;
        $chartAdolecentes->labels(['Masculino', 'Femenino']);
        $datasetAdolecentes = $chartAdolecentes->dataset('Bebes', 'pie', $adolecentes);
        $datasetAdolecentes->backgroundColor(collect(['#7158e2','#3ae374']));
        $datasetAdolecentes->color(collect(['#7d5fff','#32ff7e']));

        $chartAdultos = new globalChart;
        $chartAdultos->labels(['Masculino', 'Femenino']);
        $datasetAdultos = $chartAdultos->dataset('Bebes', 'pie', $adultos);
        $datasetAdultos->backgroundColor(collect(['#7158e2','#3ae374']));
        $datasetAdultos->color(collect(['#7d5fff','#32ff7e']));

        $chartTerceraEdad = new globalChart;
        $chartTerceraEdad->labels(['Masculino', 'Femenino']);
        $datasetTerceraEdad = $chartTerceraEdad->dataset('Bebes', 'pie', $tercera_edad);
        $datasetTerceraEdad->backgroundColor(collect(['#7158e2','#3ae374']));
        $datasetTerceraEdad->color(collect(['#7d5fff','#32ff7e']));
        
        return view('buscarCensos', compact('chartBebes','chartNinos','chartAdolecentes','chartAdultos','chartTerceraEdad'));
    }

    public function estadisticaIndividual()
    {
        return view('buscarCensosInvidual');
    }

    public function generarEstadisticaIndividual(Request $request)
    {
        $personas = DB::select('SELECT fecha_nac, sexo
                                FROM personas
                                WHERE id IN (
                                    SELECT id_jefe_familia AS id_persona
                                    FROM censo
                                    WHERE fecha_creacion>=? AND fecha_creacion<=?
                                    UNION
                                    SELECT id_persona
                                    FROM carga_familiar
                                    WHERE id_censo IN (
                                        SELECT id
                                        FROM censo
                                        WHERE fecha_creacion>=? AND fecha_creacion<=?
                                    )
                                )', [$request->desde, $request->hasta, $request->desde, $request->hasta]);
        
        $edades = [0,0];
        foreach ($personas as $persona){
            $edad = date_diff(date_create($persona->fecha_nac), date_create('now'))->y;
            if ($request->categoria == 1){
                $nombre = "Bebes";
                if ($edad < 1){
                    if ($persona->sexo == 1){
                        $edades[0]++;
                    }else{
                        $edades[1]++;
                    }
                }
            }else if ($request->categoria == 2){
                $nombre = "Niños";
                if ($edad > 0 and $edad < 12){
                    if ($persona->sexo == 1){
                        $edades[0]++;
                    }else{
                        $edades[1]++;
                    }
                }
            }else if ($request->categoria == 3){
                $nombre = "Adolecentes";
                if ($edad > 11 and $edad < 18){
                    if ($persona->sexo == 1){
                        $edades[0]++;
                    }else{
                        $edades[1]++;
                    }
                }
            }else if ($request->categoria == 4){
                $nombre = "Adultos";
                if ($persona->sexo == 1){
                    if ($edad > 17 and $edad < 60){
                        $edades[0]++;
                    }
                }else{
                    if ($edad > 17 and $edad < 55){
                        $edades[1]++;
                    }  
                }
            }else{
                $nombre = "Tercera Edad";
                if ($persona->sexo == 1){
                    if ($edad > 59){
                        $edades[0]++;
                    }
                }else{
                    if ($edad > 54){
                        $edades[1]++;
                    }  
                } 
            }
        }
        
        $chart = new globalChart;
        $chart->labels(['Masculino', 'Femenino']);
        $dataset = $chart->dataset('Bebes', 'pie', $edades);
        $dataset->backgroundColor(collect(['#7158e2','#3ae374']));
        $dataset->color(collect(['#7d5fff','#32ff7e']));
        
        return view('buscarCensosInvidual', compact('chart','nombre'));
    }

/*public function editarCenso(Request $request)
    {
        Log::info('prueba');
        Log::info($request);
        //log::info(json_decode($request->animales));


        $jefe_familia_id = DB::select('SELECT id FROM personas WHERE cedula=? LIMIT 1', [intval($request->cedula)]);
        if (count($jefe_familia_id) > 0){
            $jefe_familia_id = $jefe_familia_id[0]->id;
        }else{
         $jefe_familia_id = DB::select('INSERT INTO personas (nombre,
                                                          apellido,
                                                          cedula,
                                                          fecha_nac,
                                                          estado_civil,
                                                          parentesco,
                                                          nacionalidad,
                                                          sexo)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?) RETURNING id',
                                    [$request->nombre,
                                     $request->apellido,
                                     $request->cedula,
                                     $request->fecha_nacimiento,
                                     intval($request->estado_civil),
                                     0,
                                     intval($request->nacionalidad),
                                     intval($request->sexo)])[0]->id;
        }
        

        $vivienda_id = DB::select('INSERT INTO vivienda (nro_casa,
                                                         tipo,
                                                         estado,
                                                         tenencia)
                                   VALUES (?, ?, ?, ?) RETURNING id',
                                   [intval($request->numero_vivienda),
                                    $request->tipo_vivienda,
                                    $request->estado_vivienda,
                                    $request->tenencia_vivienda])[0]->id;

        

        $censo = DB::select('INSERT INTO censo (fecha_creacion,
                                                id_jefe_familia,
                                                nivel_instruccion,
                                                tipo_institucion,
                                                profesion,
                                                nom_inst_laboral,
                                                ingreso_mensual,
                                                id_vivienda,
                                                aguas_blancas,
                                                tanques_agua,
                                                aguas_servidas,
                                                gas,
                                                cantidad_bombonas,
                                                sistema_electrico,
                                                planta_electrica,
                                                bombillos_ahorradores,
                                                transporte,
                                                ayuda_familiar,
                                                eliminado,
                                                nom_inst_educativa,
                                                recoleccion_basura) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) RETURNING id', 
                                    [$request->fecha, 
                                    $jefe_familia_id,
                                    intval($request->nivel_instruccion),
                                    intval($request->tipo_institucion_educativa),
                                    $request->profesion,
                                    $request->nombre_institucion_laboral,
                                    intval($request->ingreso_mensual),
                                    $vivienda_id,
                                    intval($request->aguas_blancas),
                                    intval($request->tanque_agua),
                                    intval($request->aguas_servidas),
                                    intval($request->gas),
                                    intval($request->bombona_gas),
                                    intval($request->sistema_electrico),
                                    intval($request->planta_electrica),
                                    intval($request->bombillos_ahorradores),
                                    intval($request->transporte),
                                    $request->ayuda_nucleo,
                                    FALSE,
                                    $request->nombre_institucion_educativa,
                                    intval($request->recoleccion_basura)])[0]->id;

        
        DB::select('INSERT INTO espacios_vivienda (cocina,
                                                   bano,
                                                   sala,
                                                   habitaciones,
                                                   id_censo)
                    VALUES (?, ?, ?, ?, ?)',
                    [intval($request->cocina),
                     intval($request->bano),
                     intval($request->sala),
                     intval($request->habitaciones),
                     $censo]);

        DB::select('INSERT INTO electrodomesticos (nevera,
                                                   cocina,
                                                   microondas,
                                                   lavadora,
                                                   televisor,
                                                   ventilador_aire,
                                                   id_censo)
                    VALUES (?, ?, ?, ?, ?, ?, ?)',
                    [intval($request->nevera),
                     intval($request->cocina_electroromestico),
                     intval($request->microondas),
                     intval($request->lavadora),
                     intval($request->televisor),
                     intval($request->ventilador_aire),
                     $censo]);

        if (count($request->plagas) > 0){
            $plagas['ratones'] = 0;
            $plagas['hormigas'] = 0;
            $plagas['cucarachas'] = 0;
            $plagas['moscas'] = 0;
            $plagas['otros'] = '';
            foreach ($request->plagas as $plaga){
                if ($plaga == 'ratones'){
                    $plagas['ratones'] = 1;
                }else if ($plaga == 'cucarachas'){
                    $plagas['cucarachas'] = 1;
                }else if ($plaga == 'hormigas'){
                    $plagas['hormigas'] = 1;
                }else if ($plaga == 'moscas'){
                    $plagas['moscas'] = 1;
                }else if ($plaga == 'otros'){
                    $plagas['otros'] = $request->plagas_otros_descripcion;
                }

                DB::select('INSERT INTO plagas (ratones,
                                                hormigas,
                                                cucarachas,
                                                moscas,
                                                otros,
                                                id_censo)
                            VALUES (?, ?, ?, ?, ?, ?)',
                            [$plagas['ratones'],
                             $plagas['hormigas'],
                             $plagas['cucarachas'],
                             $plagas['moscas'],
                             $plagas['otros'],
                             $censo]);
            }
        }

        if (count($request->servicios) > 0){
            $servicios['mercado'] = 0;
            $servicios['bodega'] = 0;
            $servicios['farmacia'] = 0;
            $servicios['plaza'] = 0;
            $servicios['otros'] = '';
            foreach ($request->servicios as $servicio){
                if ($servicio == 'mercado'){
                    $servicios['mercado'] = 1;
                }else if ($servicio == 'bodega'){
                    $servicios['bodega'] = 1;
                }else if ($servicio == 'farmacia'){
                    $servicios['farmacia'] = 1;
                }else if ($servicio == 'plaza'){
                    $servicios['plaza'] = 1;
                }else if ($servicio == 'otros'){
                    $servicios['otros'] = $request->servicios_otros_descripcion;
                }

                DB::select('INSERT INTO servicios_comunales (mercado,
                                                bodega,
                                                farmacia,
                                                plaza_parque,
                                                otros,
                                                id_censo)
                            VALUES (?, ?, ?, ?, ?, ?)',
                            [$servicios['mercado'],
                             $servicios['bodega'],
                             $servicios['farmacia'],
                             $servicios['plaza'],
                             $servicios['otros'],
                             $censo]);
            }
        }

        $enfermedades = json_decode($request->enfermedades);
        if (count($enfermedades) > 0){
            foreach ($enfermedades as $enfermedad){
                DB::select('INSERT INTO personas_enfer (id_enfer,
                                                        id_persona)
                            VALUES (?, ?)',
                            [intval($enfermedad),
                             $jefe_familia_id]);
            }
        }

        $paredes = json_decode($request->paredes);
        if (count($paredes) > 0){
            foreach ($paredes as $pared){
                DB::select('INSERT INTO paredes (tipo,
                                                 id_censo)
                            VALUES (?, ?)',
                            [intval($pared),
                             $censo]);
            }
        }

        $techos = json_decode($request->techos);
        if (count($techos) > 0){
            foreach ($techos as $techo){
                DB::select('INSERT INTO techo (tipo,
                                                 id_censo)
                            VALUES (?, ?)',
                            [intval($techo),
                             $censo]);
            }
        }

        $animales = json_decode($request->animales);
        if (count($animales) > 0){
            foreach ($animales as $animal){
                DB::select('INSERT INTO animales (tipo,
                                                 cantidad,
                                                 id_censo)
                            VALUES (?, ?, ?)',
                            [intval($animal[0]),
                             intval($animal[1]),
                             $censo]);
            }
        }

        $familiares = json_decode($request->familiares);
        if (count($familiares) > 0){
            foreach ($familiares as $familiar){

                $id_familiar = DB::select('SELECT id FROM personas WHERE cedula=? LIMIT 1', [intval($familiar[1])]);
                if (count($id_familiar) > 0){
                    $id_familiar = $id_familiar[0]->id;
                }else{
                    $id_familiar = DB::select('INSERT INTO personas (nombre,
                                                                     apellido,
                                                                     cedula,
                                                                     fecha_nac,
                                                                     estado_civil,
                                                                     parentesco,
                                                                     nacionalidad,
                                                                     sexo)
                                               VALUES (?, ?, ?, ?, ?, ?, ?, ?) RETURNING id',
                                               [$familiar[2],
                                                $familiar[3],
                                                intval($familiar[1]),
                                                $familiar[4],
                                                0,
                                                intval($familiar[5]),
                                                intval($familiar[0]),
                                                intval($familiar[6])])[0]->id;
                }

                DB::select('INSERT INTO carga_familiar (id_persona,
                                                        id_censo)
                                    VALUES (?, ?)',
                                    [$id_familiar,
                                     $censo]);

                $enfermedades_familiares = json_decode($request->enfermedades_familiares);
                if (count($enfermedades_familiares) > 0){
                    foreach ($enfermedades_familiares as $enfermedad_familiar){
                        if ($familiar[1] == $enfermedad_familiar[0]){
                            DB::select('UPDATE SET personas_enfer (id_enfer,
                                                                    id_persona)
                                        VALUES (?, ?)',
                                        [intval($enfermedad_familiar[1]),
                                        $id_familiar]);
                        }
                    }
                }

                $discapacidades_familiares = json_decode($request->discapacidades_familiares);
                if (count($discapacidades_familiares) > 0){
                    foreach ($discapacidades_familiares as $discapacidad_familiar){
                        if ($familiar[1] == $discapacidad_familiar[0]){
                            DB::select('UPDATE SET personas_dis (id_discapacidad,
                                                                  id_persona)
                                        VALUES (?, ?)',
                                        [intval($discapacidad_familiar[1]),
                                        $id_familiar]);
                        }
                    }
                }
                
            }
        }
        return 'Ok';
    }*/

}
