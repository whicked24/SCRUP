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
                <form action="{{ route('GenerarEstadisticaGlobal') }}" method="POST" class="form-horizontal" id="formCenso">
                    {{ csrf_field() }}
 
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="col-md-6">
                            <label for="buscar">DESDE</label>
                            <input type="date" class="form-control" name="desde" id="desde"  required>   
                        </div>

                        <div class="col-md-6">
                            <label for="buscar1">HASTA</label>
                            <input type="date" class="form-control" name="hasta" id="hasta"  required>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-12 mt-4">
                        <button id="generar" name="generar" type="submit" class="btn btn-lg btn-primary" >Generar</button>
                        <a href="{{ route('EstadisticaGlobal') }}" class="btn btn-lg btn-primary">Limpiar</a>
                    </div>
                    @if (isset($chartBebes))
                    <div class="col-md-4 pt-4">
                        <div>Bebes</div>
                        <div>
                        {!! $chartBebes->container() !!}
                        </div>
                    </div>
                    <div class="col-md-4 pt-4">
                        <div>Niños</div>
                        <div>
                        {!! $chartNinos->container() !!}
                        </div>
                    </div>
                    <div class="col-md-4 pt-4">
                        <div>Adolecentes</div>
                        <div>
                        {!! $chartAdolecentes->container() !!}
                        </div>
                    </div>
                    <div class="col-md-4 pt-4">
                        <div>Adultos</div>
                        <div>
                        {!! $chartAdultos->container() !!}
                        </div>
                    </div>
                    <div class="col-md-4 pt-4">
                        <div>Tercera Edad</div>
                        <div>
                        {!! $chartTerceraEdad->container() !!}
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
@if (isset($chartBebes))
{!! $chartBebes->script() !!}
{!! $chartNinos->script() !!}
{!! $chartAdolecentes->script() !!}
{!! $chartAdultos->script() !!}
{!! $chartTerceraEdad->script() !!}
@endif
@endsection
