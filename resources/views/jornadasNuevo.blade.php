@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Registrar Nueva Jornada</h2>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('jornadasGuardar') }}">
                        {{ csrf_field() }}

                        <div class="form-group">

                            <div class="container-fluid ">


                                <div class="col-md-8">
                                    <label for="tipo" class="control-label">Tipo de Jornada</label>

                                    <select name="tipo" id="tipo" class="form-control" required autofocus>
                                        <option value="">Selecione</option>
                                        <option value="salud">Salud</option>
                                        <option value="alimentación">Alimentación</option>
                                        <option value="deportiva">Deportiva</option>
                                        <option value="cultural">Cultural</option>
                                        <option value="educativa">Educativa</option>
                                        <option value="veterinaria">Veterinaria</option>

                                    </select>


                                </div>


                                <div class="col-md-4">

                                    <label for="fecha_inicio" class="control-label">Fecha de Inicio</label>
                                    <input id="fecha_inicio" type="date" class="form-control" name="fecha_inicio"
                                        value="{{ old('fecha_inicio') }}" required autofocus />
                                </div>

                                

                            </div>


                            <div class="container-fluid ">


                                <div class="col-md-8">
                                    <label for="asunto" class="control-label">Asunto</label>
                                    <input id="asunto" type="text" class="form-control" name="asunto"
                                        value="{{ old('asunto') }}" required autofocus>
                                </div>


                                <div class="col-md-4">

                                    <label for="fecha_fin" class="control-label">Fecha de Fin</label>
                                    <input id="fecha_fin" type="date" class="form-control" name="fecha_fin"
                                        value="{{ old('fecha_fin') }}" required autofocus />
                                </div>

                            </div>



                            


                            <div class="container-fluid ">


                                <div class="col-md-6">
                                    <label for="tipo" class="control-label">Dirigido a</label>

                                    <select name="tipo" id="tipo" class="form-control" required autofocus>
                                        <option value="">Selecione</option>
                                        <option value="todos">Todos</option>
                                        <option value="niños">Niños</option>
                                        <option value="adultos">Adultos</option>
                                        <option value="adolescentes">Adolescentes</option>
                                        <option value="adultos_mayores">Adultos Mayores</option>
                                        <option value="discapacitados">Discapacitados</option>
                                        <option value="mascotas">Mascotas</option>

                                    </select>


                                </div>

                                <div class="col-md-6">
                                    <label for="estado" class="control-label">Estatus</label>

                                    <select name="estado" id="estado" class="form-control" required autofocus>
                                        <option value="">Selecione</option>
                                        <option value="por_hacer">Por Hacer</option>
                                        <option value="en_proceso">En Proceso</option>
                                        <option value="completada">Completada</option>
                                        <option value="postergada">Postergada</option>

                                    </select>


                                </div>

                            </div>

                            <div class="container-fluid ">

                                <div class="col-md-12">
                                    <label for="observaciones" class="control-label">Observaciones</label>

                                    <textarea name="observaciones" class="form-control" id="observaciones" cols="5"
                                        rows="5" value="{{ old('observaciones') }}" required autofocus></textarea>


                                </div>


                            </div>

                        </div>

                        <div class="form-group text-center">

                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                                <a class="btn btn-primary" href='{{route("jornadasListar")}}'>
                                    Regresar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection