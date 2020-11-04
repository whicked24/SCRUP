@extends('layouts.app')

@section("extraCss")
<link rel="stylesheet" href="{{asset('css/datatable.min.css')}}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12 text-center">
            <div class="page-header-info">
                <h4 class="alert alert-info text-center">
                     Consejo comunal Unidad San Juan ubicado en la Parroquia San Juan av.San Martin <br>Municipio libertador - Caracas
                </h4>
            </div>
            <h2>Jornadas</h2>
            <div class="text-right">
                <a class="btn btn-md btn-primary" id="nuevaJonada" href="{{route('jornadasNuevo')}}">Nueva Jornada</a>
                <!-- <a class="btn btn-md btn-primary" id="testpdf" href="{{route('testpdf')}}">test</a>  -->
            </div>
            <table id="tablaJornadas" class="table table-striped">
                <thead>
                    <th class="text-center">Id</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Fecha Inicio</th>
                    <th class="text-center">Fecha Fin</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Encagado</th>
                    <th class="text-center">Acción</th>
                </thead>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <th class="text-center">Id</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Fecha Inicio</th>
                    <th class="text-center">Fecha Fin</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Encagado</th>
                    <th class="text-center">Acción</th>
                </tfoot>
            </table> 
        </div>
    </div>
</div>
@endsection

@section("extraScript")
    <script src="{{asset('js/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#tablaJornadas").DataTable({
            "destroy" : true,
            "ajax" : {
                "type" : "post",
                "data" : "",
                "url" : "{{route('jornadasTodos')}}",
                "headers": {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            },
            "columns" : [
                {"data" : "id"},
                {"data" : "tipo"},
                {"data" : "fecha_inicio"},
                {"data" : "fecha_fin"},
                {"data" : "estado"},
                {"data" : "encargado"},
                {"defaultContent" : " <button id='modificar' type='button' class='btn btn-success'>Editar</button>"
                                    + " <button id='eliminar' type='button' class='btn btn-warning'>Eliminar</button>"}
            ],
            "language" : {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
        });
    </script>
@endsection