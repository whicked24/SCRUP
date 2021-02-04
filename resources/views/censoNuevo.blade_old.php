@extends('layouts.app')
@section('title', "censo")

@section("extraCss")
<link href="{{ asset('css/smoke.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center"-->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header-info">
              <h4 class="alert alert-info text-center">Consejo comunal Unidad San Juan ubicado en la Parroquia San Juan av.San Martin <br>Municipio libertador - Caracas </h4> 
                </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Planilla de Censo</h1>
                </div>
                <div class="panel-body">
                    <form action="#" method="POST" class="form-horizontal" id="formCenso" name="formCenso">
                        {{ csrf_field() }}
                        <!--button name="prueba" id="prueba">Prueba</button-->
 
                        <div class="form-group col-md-6">
                            <label for="type" class="col-md-4 control-label"> Sector</label>
                            <div class="col-md-8">
                                <select id="type" class="form-control" name="type" readonly>
                                    <option value="{{$sector[0]->id}}">{{$sector[0]->nombre}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 m-0 p-0">
                            <div class="form-group col-md-6">
                                <label for="fecha" class="col-md-4 control-label">Fecha</label>
                                <div class="col-md-8">
                                    <input id="fecha" type="date" class="form-control" name="fecha" readonly>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="numero_planilla" class="col-md-4 control-label">Número de planilla</label>
                                <div class="col-md-8">
                                    <input id="numero_planilla" type="text" class="form-control" name="numero_planilla" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 m-0 p-0" data-name="censo" data-page="1">
                            <h3 class="text-center">Jefe de familia</h3>
                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="cedula" class="col-md-4 control-label">Cédula</label>
                                    <div class="col-md-2">
                                        <select name="nacionalidad" id="nacionalidad" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="1">V</option>
                                            <option value="2">E</option>
                                        </select>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <input id="cedula" type="digits" class="form-control" name="cedula" required maxlength="8" minlenght="6">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="nombre" class="col-md-4 control-label">Nombre</label>
                                    <div class="col-md-8">
                                        <input id="nombre" type="text" class="form-control w-100" name="nombre" required maxlength="18">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="apellido" class="col-md-4 control-label">Apellido</label>
                                    <div class="col-md-8">
                                        <input id="apellido" type="text" class="form-control" name="apellido" required maxlength="18">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                <label for="sexo" class="col-md-4 control-label">Sexo</label>
                                    <div class="col-md-8">
                                        <select name="sexo" id="sexo" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="fecha_nacimiento" class="col-md-4 control-label">Fecha de nacimiento</label>
                                    <div class="col-md-8">
                                        <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="edad" class="col-md-4 control-label">Edad</label>
                                    <div class="col-md-8">
                                        <input id="edad" type="text" class="form-control" name="edad" readonly value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="enfermedad" class="col-md-4 control-label">Enfermedades</label>
                                    <div class="col-md-6">
                                        <select name="enfermedad" id="enfermedad" class="form-control">
                                            <option value="">seleccione</option>
                                            @foreach($enfermedades as $enfermedad)
                                            <option value="{{ $enfermedad->id }}">{{ $enfermedad->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="far fa-edit fa-2x mx-1 pointer" data-toggle="tooltip" data-placement="bottom" title="Agregar" data-name="agregarEnfermedad"></i>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <div>
                                        <table id="tablaEnfermedades" class="table table-striped">
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="estado_civil" class="col-md-4 control-label">Estado civil</label>
                                    <div class="col-md-8">
                                        <select name="estado_civil" id="estado_civil" class="form-control" required>
                                            <option value="">seleccione</option>
                                            <option value="1">Soltero</option>
                                            <option value="2">Casado</option>
                                            <option value="3">Divorciado</option>
                                            <option value="4">Viudo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">                            
                                    <label for="nivel_instruccion" class="col-md-4 control-label">Nivel de instrucción</label>
                                    <div class="col-md-8">
                                        <select name="nivel_instruccion" id="nivel_instruccion" class="form-control" required>
                                            <option value="">seleccione</option>
                                            <option value="1">Primaria</option>
                                            <option value="2">Secundaria</option>
                                            <option value="3">Bachiller</option>
                                            <option value="4">Universitaria</option>
                                            <option value="5">NINGUNA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="profesion" class="col-md-4 control-label">Profesión</label>
                                    <div class="col-md-8">
                                        <input id="profesion" type="text" class="form-control" name="profesion" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="trabaja" class="col-md-4 control-label">¿Trabaja actualmente?</label>
                                    <div class="col-md-8">
                                        <input name="trabaja" id="trabaja_si" type="radio" value="1"/> Si
                                        <input name="trabaja" id="trabaja_no" type="radio" value="0" checked/> No
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <div class="col-md-12 p-0 hidden" data-name="trabaja">
                                        <label for="nombre_institucion_laboral" class="col-md-4 control-label">Nombre de la institución</label>
                                        <div class="col-md-8">
                                            <input name="nombre_institucion_laboral" id="nombre_institucion_laboral" type="text" class="form-control"/>    
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="col-md-12 p-0 hidden" data-name="trabaja">
                                        <label for="ingreso_mensual" class="col-md-4 control-label">Ingreso mensual</label>
                                        <div class="col-md-8">
                                            <select name="ingreso_mensual" id="ingreso_mensual" class="form-control" >
                                                <option value="">seleccione</option>
                                                <option value="1">rango 1</option>
                                                <option value="2">rango 2</option>
                                                <option value="3">rango 3</option>
                                                <option value="4">rango 4</option>
                                                <option value="5">rango 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="estudia" class="col-md-4 control-label">¿Estudia actualmente?</label>
                                    <div class="col-md-8">
                                        <input name="estudia" id="estudia_si" type="radio" value="1"/> Si
                                        <input name="estudia" id="estudia_no" type="radio" value="0" checked/> No
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="col-md-12 p-0 hidden" data-name="estudia">
                                        <label for="tipo_institucion_educativa" class="col-md-4 control-label">Tipo de institución</label>
                                        <div class="col-md-8">
                                            <select name="tipo_institucion_educativa" id="tipo_institucion_educativa" class="form-control">
                                                <option value="">seleccione</option>
                                                <option value="1">Publica</option>
                                                <option value="2">Privada</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <div class="col-md-12 p-0 pt-4 hidden" data-name="estudia">
                                        <label for="nombre_institucion_educativa" class="col-md-4 control-label">Nombre de la institución</label>
                                        <div class="col-md-8">
                                            <input name="nombre_institucion_educativa" id="nombre_institucion_educativa" type="text" class="form-control"/>    
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-lg" data-name="siguiente" data-to="2" id="siguiente">Siguiente</button>
                            </div>
                        </div>
  
                        <div class="col-md-12 m-0 p-0 hidden" data-name="censo" data-page="2">
                            <h3 class="text-center">Datos socioeconomicos</h3>
                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="tipo_vivienda" class="col-md-4 control-label">Tipo de vivienda</label>
                                    <div class="col-md-8">
                                        <select name="tipo_vivienda" id="tipo_vivienda" class="form-control">
                                            <option value="">-</option>
                                            <option value="1">Casa</option>
                                            <option value="2">Apartamento</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="numero_vivienda" class="col-md-4 control-label">Número de casa</label>
                                    <div class="col-md-8">
                                        <input id="numero_vivienda" type="text" class="form-control" name="numero_vivienda">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="estado_vivienda" class="col-md-4 control-label">Estado de vivienda</label>
                                    <div class="col-md-8">
                                        <select name="estado_vivienda" id="estado_vivienda" class="form-control">
                                            <option value="">-</option>
                                            <option value="1">Inestable</option>
                                            <option value="2">Alto riesgo</option>
                                            <option value="3">Vulnerable</option>
                                            <option value="4">Firme</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="tenencia_vivienda" class="col-md-4 control-label">Tenencia de casa</label>
                                    <div class="col-md-8">
                                        <select name="tenencia_vivienda" id="tenencia_vivienda" class="form-control">
                                            <option value="">-</option>
                                            <option value="1">Propia</option>
                                            <option value="2">Alquilada</option>
                                            <option value="3">Compartida</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-center">Detalles de vivienda</h3>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-3">
                                    <label for="cocina" class="col-md-7 control-label">Cocina</label>
                                    <div class="col-md-5">
                                        <input name="cocina" id="cocina" type="number" class="form-control" value="0"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="bano" class="col-md-7 control-label">Baño</label>
                                    <div class="col-md-5">
                                        <input name="bano" id="bano" type="number" class="form-control" value="0"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="sala" class="col-md-7 control-label">Sala</label>
                                    <div class="col-md-5">
                                        <input name="sala" id="sala" type="number" class="form-control" value="0"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="habitaciones" class="col-md-7 control-label">Habitaciones</label>
                                    <div class="col-md-5">
                                        <input name="habitaciones" id="habitaciones" type="number" class="form-control" value="0"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="pared" class="col-md-4 control-label">Tipo de paredes</label>
                                    <div class="col-md-6">
                                        <select name="pared" id="pared" class="form-control" required>
                                            <option value="">seleccione</option>
                                            <option value="1">Sin frizar</option>
                                            <option value="2">Frizada</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="far fa-edit fa-2x mx-1 pointer" data-toggle="tooltip" data-placement="bottom" title="Agregar" data-name="agregarPared"></i>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-md-12">
                                        <table id="tablaParedes" class="table table-striped">
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="techo" class="col-md-4 control-label">Tipo de techo</label>
                                    <div class="col-md-6">
                                        <select name="techo" id="techo" class="form-control" required>
                                            <option value="">seleccione</option>
                                            <option value="1">Zinc</option>
                                            <option value="2">Ladrillo</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="far fa-edit fa-2x mx-1 pointer" data-toggle="tooltip" data-placement="bottom" title="Agregar" data-name="agregarTecho"></i>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="col-md-12">
                                        <table id="tablaTechos" class="table table-striped">
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div>

                            <h3 class="text-center">Electrodomesticos</h3>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-4">
                                    <label for="nevera" class="col-md-6 control-label">Nevera</label>
                                    <div class="col-md-6">
                                        <input name="nevera" id="nevera" type="number" class="form-control" value="0"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="cocina_electroromestico" class="col-md-6 control-label">Cocina</label>
                                    <div class="col-md-6">
                                        <input name="cocina_electroromestico" id="cocina_electroromestico" type="number" class="form-control" value="0"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="microondas" class="col-md-6 control-label">Microondas</label>
                                    <div class="col-md-6">
                                        <input name="microondas" id="microondas" type="number" class="form-control" value="0"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-4">
                                    <label for="lavadora" class="col-md-6 control-label">Lavadora</label>
                                    <div class="col-md-6">
                                        <input name="lavadora" id="lavadora" type="number" class="form-control" value="0"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="televisor" class="col-md-6 control-label">Televisor</label>
                                    <div class="col-md-6">
                                        <input name="televisor" id="televisor" type="number" class="form-control" value="0"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="ventilador_aire" class="col-md-6 control-label">Ventilador/Aire</label>
                                    <div class="col-md-6">
                                        <input name="ventilador_aire" id="ventilador_aire" type="number" class="form-control" value="0"/>
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-center">Animales domesticos</h3>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="animal" class="col-md-4 control-label">Animales</label>
                                    <div class="col-md-4">
                                        <select name="animal" id="animal" class="form-control">
                                            <option value="">seleccione</option>
                                            <option value="1">Perro</option>
                                            <option value="2">Gato</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input name="animal_cantidad" id="animal_cantidad" type="number" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Cantidad" value="0"/>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="far fa-edit fa-2x mx-1 pointer" data-toggle="tooltip" data-placement="bottom" title="Agregar" data-name="agregarAnimal"></i>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="col-md-12">
                                        <table id="tablaAnimales" class="table table-striped">
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div>

                            <h3 class="text-center">Plagas</h3>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-4">
                                    <label for="plagas_ratones" class="col-md-6 control-label">Ratones</label>
                                    <div class="col-md-6">
                                        <input name="plagas[]" id="plagas_ratones" type="checkbox" value="ratones"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="plagas_cucarachas" class="col-md-6 control-label">Cucarachas</label>
                                    <div class="col-md-6">
                                        <input name="plagas[]" id="plagas_cucarachas" type="checkbox" value="cucarachas"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="plagas_hormigas" class="col-md-6 control-label">Hormigas</label>
                                    <div class="col-md-6">
                                        <input name="plagas[]" id="plagas_hormigas" type="checkbox" value="hormigas"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-4">
                                    <label for="plagas_moscas" class="col-md-6 control-label">Moscas</label>
                                    <div class="col-md-6">
                                        <input name="plagas[]" id="plagas_moscas" type="checkbox" value="moscas"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="plagas_otros" class="col-md-6 control-label">Otros</label>
                                    <div class="col-md-6">
                                        <input name="plagas[]" id="plagas_otros" type="checkbox" value="otros"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <div class="col-md-12">
                                        <input name="plagas_otros_descripcion" id="plagas_otros_descripcion" type="text" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Descrición otros"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-lg" data-name="atras" data-to="1">Atras</button>
                                <button class="btn btn-primary btn-lg" data-name="siguiente" data-to="3">Siguiente</button>
                            </div> 
                        </div>

                        <div class="col-md-12 m-0 p-0 hidden" data-name="censo" data-page="3">
                            <h3 class="text-center">Servicios de vivienda</h3>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="aguas_blancas" class="col-md-4 control-label">Aguas blancas</label>
                                    <div class="col-md-8">
                                        <select name="aguas_blancas" id="aguas_blancas" class="form-control">
                                            <option value="">-</option>
                                            <option value="1">Aguaducto</option>
                                            <option value="2">Pila publica</option>
                                            <option value="3">Camión</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="tanque_agua" class="col-md-4 control-label">Tanque de agua</label>
                                    <div class="col-md-8">
                                        <input id="tanque_agua" type="number" class="form-control" name="tanque_agua" value="0"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="aguas_servidas" class="col-md-4 control-label">Aguas servidas</label>
                                    <div class="col-md-8">
                                        <select name="aguas_servidas" id="aguas_servidas" class="form-control">
                                            <option value="">-</option>
                                            <option value="1">Tuberia</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="recoleccion_basura" class="col-md-4 control-label">Recolección de basura</label>
                                    <div class="col-md-8">
                                        <select name="recoleccion_basura" id="recoleccion_basura" class="form-control">
                                            <option value="">-</option>
                                            <option value="1">Container</option>
                                            <option value="2">Bajante</option>
                                            <option value="3">Aire libre</option>
                                            <option value="4">Quemada</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="gas" class="col-md-4 control-label">Gas</label>
                                    <div class="col-md-8">
                                        <select name="gas" id="gas" class="form-control">
                                            <option value="">-</option>
                                            <option value="1">Bombona</option>
                                            <option value="2">Tuberia</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="bombonas_gas" class="col-md-4 control-label">Bombonas</label>
                                    <div class="col-md-8">
                                        <input id="bombona_gas" type="number" class="form-control" name="bombona_gas" value="0"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="sistema_electrico" class="col-md-4 control-label">Sistema electrico</label>
                                    <div class="col-md-8">
                                        <select name="sistema_electrico" id="sistema_electrico" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="1">Publico</option>
                                            <option value="2">Privado</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="planta_electrica" class="col-md-4 control-label">Planta electrica</label>
                                    <div class="col-md-8">
                                        <input id="planta_electrica" type="number" class="form-control" name="planta_electrica" value="0"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="bombillos_ahorradores" class="col-md-4 control-label">Bombillos ahorradores</label>
                                    <div class="col-md-8">
                                        <input id="bombillos_ahorradores" type="number" class="form-control" name="bombillos_ahorradores" value="0" required/>
                                    </div>                                    
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="transporte" class="col-md-4 control-label">Transporte</label>
                                    <div class="col-md-8">
                                        <select name="transporte" id="transporte" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="1">Publico</option>
                                            <option value="2">Privado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-center">Servicios comunales</h3>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-4">
                                    <label for="servicios_mercado" class="col-md-6 control-label">Mercado</label>
                                    <div class="col-md-6">
                                        <input name="servicios[]" id="servicios_mercado" type="checkbox" value="mercado"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="servicios_bodega" class="col-md-6 control-label">Bodega</label>
                                    <div class="col-md-6">
                                        <input name="servicios[]" id="servicios_bodega" type="checkbox" value="bodega"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="servicios_farmacia" class="col-md-6 control-label">Farmacia</label>
                                    <div class="col-md-6">
                                        <input name="servicios[]" id="servicios_farmacia" type="checkbox" value="farmacia"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-4">
                                    <label for="servicios_plaza" class="col-md-6 control-label">Parque plaza</label>
                                    <div class="col-md-6">
                                        <input name="servicios[]" id="servicios_plaza" type="checkbox" value="plaza"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="servicios_otros" class="col-md-6 control-label">Otros</label>
                                    <div class="col-md-8">
                                        <input name="servicios[]" id="servicios_otros" type="checkbox" value="otros"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <div class="col-md-12">
                                        <input name="servicios_otros_descripcion" id="servicios_otros_descripcion" type="text" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Descrición otros"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-lg" data-name="atras" data-to="2">Atras</button>
                                <button class="btn btn-primary btn-lg" data-name="siguiente" data-to="4">Siguiente</button>
                            </div>   
                        </div>

                        <div class="col-md-12 m-0 p-0 hidden" data-name="censo" data-page="4">
                            
                            <h3 class="text-center">Carga familiar</h3>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="nombre_familiar" class="col-md-4 control-label">Nombres</label>
                                    <div class="col-md-8">
                                        <input id="nombre_familiar" type="text" class="form-control" name="nombre_familiar" />
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="apellido_familiar" class="col-md-4 control-label">Apellidos</label>
                                    <div class="col-md-8">
                                        <input id="apellido_familiar" type="text" class="form-control" name="apellido_familiar"/>
                                    </div>
                                </div>
                            </div> 

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="cedula_familiar" class="col-md-4 control-label">Cédula</label>
                                    <div class="col-md-2">
                                        <select name="nacionalidad_familiar" id="nacionalidad_familiar" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="1">V</option>
                                            <option value="2">E</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="cedula_familiar" type="text" class="form-control" name="cedula_familiar"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="fecha_nacimiento_familiar" class="col-md-4 control-label">Fecha de nacimiento</label>
                                    <div class="col-md-8">
                                        <input id="fecha_nacimiento_familiar" type="date" class="form-control" name="fecha_nacimiento_familiar"/>
                                    </div>
                                </div>
                            </div> 

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="parentesco_familiar" class="col-md-4 control-label">Parentesco</label>
                                    <div class="col-md-8">
                                        <select name="parentesco_familiar" id="parentesco_familiar" class="form-control">
                                            <option value="">-</option>
                                            <option value="1">Padre</option>
                                            <option value="2">Madre</option>
                                            <option value="3">Hijo</option>
                                            <option value="4">Sobrino</option>
                                            <option value="5">Esposo(a)</option>
                                            <option value="6">Hemano(a)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="sexo_familiar" class="col-md-4 control-label">Sexo</label>
                                    <div class="col-md-8">
                                        <select name="sexo_familiar" id="sexo_familiar" class="form-control">
                                            <option value="">-</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 

                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-lg mb-4" id="agregar_familiar">Agregar familiar</button>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-12">
                                    <div class="col-md-12">
                                        <table id="tablaFamiliares" class="table table-striped">
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> 

                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-lg" data-name="atras" data-to="3">Atras</button>
                                <button class="btn btn-primary btn-lg" data-name="siguiente" data-to="5">Siguiente</button>
                            </div>
                        </div>

                        <div class="col-md-12 m-0 p-0 hidden" data-name="censo" data-page="5">

                            <h3 class="text-center">Enfermedades</h3> 

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">                                
                                    <label for="cedula_familiar_enfermedad" class="col-md-4 control-label">Familiar</label>
                                    <div class="col-md-8">
                                        <select name="cedula_familiar_enfermedad" id="cedula_familiar_enfermedad" class="form-control" required>
                                            <option value="">Seleccione</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">                                
                                    <label for="enfermedad_familiar" class="col-md-4 control-label">Enfermedades</label>
                                    <div class="col-md-6">
                                        <select name="enfermedad_familiar" id="enfermedad_familiar" class="form-control">
                                            <option value="">seleccione</option>
                                            @foreach($enfermedades as $enfermedad)
                                            <option value="{{ $enfermedad->id }}">{{ $enfermedad->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="far fa-edit fa-2x mx-1 pointer" data-toggle="tooltip" data-placement="bottom" title="Agregar" data-name="agregarEnfermedadFamiliar"></i>
                                    </div>
                                </div>
                            </div> 

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-12"> 
                                    <div class="col-md-12">
                                        <table id="tablaEnfermedadesFamiliares" class="table table-striped">
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div>

                            <h3 class="text-center">Discapacidades</h3>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-6">
                                    <label for="cedula_familiar_discapacidad" class="col-md-4 control-label">Familiar</label>
                                    <div class="col-md-8">
                                        <select name="cedula_familiar_discapacidad" id="cedula_familiar_discapacidad" class="form-control">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="discapacidad_familiar" class="col-md-4 control-label">Discapacidades</label>
                                    <div class="col-md-6">
                                        <select name="discapacidad_familiar" id="discapacidad_familiar" class="form-control">
                                            <option value="">seleccione</option>
                                            @foreach($discapacidades as $discapacidad)
                                            <option value="{{ $discapacidad->id }}">{{ $discapacidad->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="far fa-edit fa-2x mx-1 pointer" data-toggle="tooltip" data-placement="bottom" title="Agregar" data-name="agregarDiscapacidadFamiliar"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-12">
                                    <div class="col-md-12">
                                        <table id="tablaDiscapacidadesFamiliares" class="table table-striped">
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-lg" data-name="atras" data-to="4">Atras</button>
                                <button class="btn btn-primary btn-lg" data-name="siguiente" data-to="6">Siguiente</button>
                            </div>
                        </div>

                        <div class="col-md-12 m-0 p-0 hidden" data-name="censo" data-page="6">

                            <h3 class="text-center">¿Necesita ayuda para su nucleo?</h3>

                            <div class="col-md-12 m-0 p-0">
                                <div class="form-group col-md-12">
                                    <div class="col-md-12">
                                        <input id="ayuda_nucleo" type="text" class="form-control" name="ayuda_nucleo" >
                                    </div>
                                </div> 
                            </div>

                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-lg" data-name="atras" data-to="5">Atras</button>
                                <button class="btn btn-primary btn-lg" id="guardar" >Guardar</button>
                            </div>
                            
                            <div class="col-md-12 m-0 p-0">
                            </div>

                        </div>                              
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section("extraScript")
<script>
    var urlGuardarNuevo = '{{ route("nuevoGuardar") }}';
    var urlCensoListar = '{{ route("censoListar") }}';
</script>
<script src="{{ asset('js/validate-1.13.1.min.js') }}"></script>
<script src="{{ asset('js/censo.min.js') }}"></script>
<!-- Smoke -->
<script src="{{ asset('js/smoke.min.js') }}"></script>
<script src="{{ asset('lang/es.min.js ') }}"></script>

<script type="text/javascript">


$('#cedula').click(function(e) {
    e.preventDefault();
    //alert('Ingrese N°CI Minimo 6 Digitos');
  if ($('#cedula').smkValidate()) {
    // Code here
    $.smkAlert({
      text: 'Listo!',
      type: 'success',
      time: 2
          });
  //}else{
    //alert("fallo");
  }


})


$('#nombre').click(function(e) {
    e.preventDefault();
    //alert('Ingrese su nombre');
  if ($('#nombre').smkValidate()) {
    // Code here
    $.smkAlert({
      text: 'Listo!',
      type: 'success',
      patter:'A-Zaz',
      time: 2
          });
  //}else{
    //alert("fallo");
  }

});


$('#apellido').click(function(e) {
    e.preventDefault();
    //alert('Ingrese apellido');
  if ($('#apellido').smkValidate()) {
    // Code here
    $.smkAlert({
      text: 'Listo!',
      type: 'success',
      time: 2
          });
  //}else{
    //alert("fallo");
  }





})



</script>

@endsection