<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index');

Route::get('/home','HomeController@index')->name('home');

Auth::routes();

Route::get('/usuarios', 'UsuariosController@listar')->name('usuariosListar');

Route::get('/usuarios/editar/{id}', 'UsuariosController@editar')->name('usuariosEditar');

Route::post('/usuarios/editar', 'UsuariosController@editarGuardar')->name('usuariosEditarGuardar');

Route::get('/censo', 'CensoController@listar')->name('censoListar');

Route::get('/censo/nuevo', 'CensoController@nuevo')->name('censoNuevo');

Route::get('/censo/editar/{id}', 'CensoController@editar')->name('censoEditar');

Route::post('/censo/editar', 'CensoController@editarGuardar')->name('censoEditarGuardar');

Route::get('/censo/eliminar/{id}', 'CensoController@eliminar')->name('censoEliminar');

Route::get('/censo/estadistica/global', 'CensoController@estadisticaGlobal')->name('EstadisticaGlobal');

Route::post('/censo/estadistica/global/generar', 'CensoController@generarEstadisticaGlobal')->name('GenerarEstadisticaGlobal');

Route::get('/censo/estadistica/individual', 'CensoController@estadisticaIndividual')->name('EstadisticaIndividual');

Route::post('/censo/estadistica/individual/generar', 'CensoController@generarEstadisticaIndividual')->name('GenerarEstadisticaIndividual');

Route::post('/censo/nuevo/guadar', 'CensoController@nuevoGuardar')->name('nuevoGuardar');

Route::post('/datos/personales/get', 'DatosPersonalesController@getDatosPersonales')
->name('DatosPersonalesGet')->middleware('web');

Route::get('/datos/personales/nuevo', 'DatosPersonalesController@newDatosPersonales')
->name('NewDatosPersonales')->middleware('web');;

Route::post('/datos/personales/guardar', 'DatosPersonalesController@saveDatosPersonales')->name('SaveDatosPersonales')->middleware('web');

Route::post('/datos/personales/edit/guardar', 'DatosPersonalesController@editSaveDatosPersonales')->name('EditSaveDatosPersonales');

Route::get('/datos/personales/{id}/delete', 'DatosPersonalesController@deleteDatosPersonales')->name('DeleteDatosPersonales');




Route::get('/censo/socioeconomico', 'CensoController@censo2')->name('censo2');

Route::get('/censo/vivienda', 'CensoController@censo3')->name('censo3');


Route::post('/censo/nuevo', 'CensoController@saveCenso')->name('nuevoCenso');

Route::get('/sectores', 'SectoresController@listar')->name('sectoresListar');

Route::get('/sectores/nuevo', 'SectoresController@nuevo')->name('sectoresNuevo');

Route::post('/sectores/nuevo/guardar', 'SectoresController@guardar')->name('sectoresGuardar');

Route::get('/sectores/cambiar/estado/{id}', 'SectoresController@cambiarEstado')->name('sectoresCambiarEstado');

Route::get('/sectores/editar/{id}', 'SectoresController@editar')->name('sectoresEditar');

Route::post('/sectores/editar/guardar', 'SectoresController@editarGuardar')->name('sectoresEditarGuardar');






//*******************************************JORNADAS NUEVO MODULO***************************************///

Route::get('/jornada', 'JornadaController@listadoJornadas')->name('listadoJornadas');
Route::get('/jornada/nuevo', 'JornadaController@formJornada')->name('formJornada');
Route::post('/jornada/nuevo', 'JornadaController@addJornadas')->name('addJornadas');
Route::get('/jornada/detalle/{id?}', 'JornadaController@detalleJornadas')->name('detalleJornadas');
Route::get('/jornada/editar/{id?}', 'JornadaController@editarJornadasform')->name('editarJornadasform');
Route::put('/jornada/editar/{id?}', 'JornadaController@editarJornadas')->name('editarJornadas');
Route::delete('/jornada/eliminar/{id?}', 'JornadaController@eliminarJornadas')->name('eliminarJornadas');

////********************************************************************************************************///


//*******************************************JORNADA SHISTORY***************************************///
Route::post('/jornada/add/{id?}', 'JornadaController@addjornadahistorico')->name('addjornadahistorico');

Route::get('/reporte/pdf', 'Htmlpdf@reporteJornadas')->name('reporteJornadas');


////********************************************************************************************************///



//*******************************************PLANILLAS PDF***************************************///
Route::get('/planilla/', 'Htmlpdf@vistaPlanillas')->name('vistaPlanillas');

Route::post('/planilla/', 'Htmlpdf@generarPlanilla')->name('generarPlanilla');


////********************************************************************************************************///




Route::get('/beneficios', 'BeneficiosController@beneficios')->name('beneficios');

Route::get('/imprimir', 'Generador@imprimir')->name('print');

Route::get('/testpdf', 'JornadasController@testpdf')->name('testpdf');

Route::get('/testPhp', function () {
    phpinfo();
});