@extends('layouts.app')

@section("extraCss")
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12 text-center">
            <div class="page-header-info">
   <h4 class="alert alert-info text-center">Consejo comunal Unidad San Juan ubicado en la Parroquia San Juan av.San Martin <br>Municipio libertador - Caracas </h4> 
       
            </div>
            <h2>Censos</h2>
<div class="row justify-content-end">
    <div class="col-md-2">
        <form id="nuevo" method="GET" action="{{ route('censoNuevo') }}">
        <button type="submit" class="btn btn-round btn-primary btn-sm" >Nuevo Censo</button>
    </form>
        
    </div>
    
</div>
<br><br>
            <table id="tablaCensos" class="table table-striped">
                <thead>
                    <tr>
                        <th>Número</th>
                        <th>Fecha</th>
                        <th>Cédula Jefe de Familia</th>
                        <th>Nombre Jefe Familia</th>
                        <th>Apellido Jefe Familia</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($censos as $censo)
                        <tr>
                            <td>{{$censo->numero_planilla}}</td>
                            <td>{{$censo->fecha}}</td>
                            <td>{{$censo->cedula}}</td>
                            <td>{{$censo->nombre}}</td>
                            <td>{{$censo->apellido}}</td>
                            <td>
                                <a href='{{ url("/censo/editar/{$censo->id}") }}'>
                                    <i class="far fa-edit fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Editar Censo"></i>
                                </a>
                                <a href='{{ url("/censo/eliminar/{$censo->id}") }}'>
                                    <i class="far fa-times-circle fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Eliminar Censo"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
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
    <script src="{{ asset('js/datatables.min.js') }}"></script>
     <script>
       var table = $('#datatable').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
   
});
    </script>
@endsection