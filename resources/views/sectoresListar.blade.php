@extends('layouts.app')

@section("extraCss")
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12 text-center">
            <div class="page-header-info">
                <h4 class="alert alert-info text-center">
                   Consejo comunal Unidad San Juan ubicado en la Parroquia San Juan av.San Martin <br>Municipio libertador - Caracas </h4> 
            </div>
            <h2>Sectores</h2>
            <div class="text-right">
                <a class="btn btn-md btn-primary" id="nuevoSector" href="{{route('sectoresNuevo')}}">Nuevo Sector</a> 
            </div>
            <table id="tablaSectores" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Número</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Activo</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @if($sectores)
                    @foreach($sectores as $sector)
                        <tr>
                            <td>{{$sector->id}}</td>
                            <td>{{$sector->nombre}}</td>
                            <td>
                                @if($sector->activo)
                                Activo
                                @else
                                Inactivo
                                @endif
                            </td>
                            <td>
                                <a href='{{ url("/sectores/editar/{$sector->id}") }}'>
                                    <i class="far fa-edit fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Editar Sector"></i>
                                </a>
                                <a href='{{ url("/sectores/cambiar/estado/{$sector->id}") }}'>
                                    <i class="far fa-times-circle fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Desactivar Sector"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="text-center">
                            No existen datos registrados
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection

@section("extraScript")
    <script>
        var token = $("meta[name='csrf-token']").attr("content");
    </script>
@endsection