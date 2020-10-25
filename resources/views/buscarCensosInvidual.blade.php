@extends('layouts.app')

@section("extraCss")
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12 text-center">
            <div class="page-header-info">
                <h4 class="alert alert-info text-center">Consejo comunal LUZ y Esperanza valle Azúl parroquia antimano  municipio libertador sector-valle azúl-caracas</h4>
            </div>

            <div class="panel-body">
                <form action="{{ route('GenerarEstadisticaIndividual') }}" method="POST" class="form-horizontal" id="formCenso">
                    {{ csrf_field() }}
 
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="col-md-4">
                            <label for="buscar">DESDE</label>
                            <input type="date" class="form-control" name="desde" id="desde"  required>   
                        </div>

                        <div class="col-md-4">
                            <label for="buscar1">HASTA</label>
                            <input type="date" class="form-control" name="hasta" id="hasta"  required>
                        </div>

                        <div class="col-md-4">
                            <label for="categoria">Categoria</label>
                            <select name="categoria" id="categoria" class="form-control">
                                <option value="1">Bebes</option>
                                <option value="2">Niños</option>
                                <option value="3">Adolecentes</option>
                                <option value="4">Adultos</option>
                                <option value="5">Tercera Edad</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-12 mt-4">
                        <button id="generar" name="generar" type="submit" class="btn btn-lg btn-primary" >Generar</button>
                        <a href="{{ route('EstadisticaGlobal') }}" class="btn btn-lg btn-primary">Limpiar</a>
                    </div>
                    @if (isset($chart))
                    <div class="col-md-12 pt-4">
                        <div>{{$nombre}}</div>
                        <div>
                        {!! $chart->container() !!}
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section("extraScript")
<script src="{{ asset('js/Chart.bundle.min.js') }}" charset="utf-8"></script>
@if (isset($chart))
{!! $chart->script() !!}
@endif
@endsection
