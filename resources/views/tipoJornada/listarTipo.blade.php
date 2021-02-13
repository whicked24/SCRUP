@extends('layouts.app')

@section('content')


<div class="row justify-content-lg-center">
<div class="col-md-4">
		<h1>Tipos de Jornadas</h1>
</div>

</div>
            <div class="container">
                       <div class="text-right">
                
      <a href="{{ route('formTipo','tipoJornada') }}"><i class="fas fa-plus fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Nuevo"></i></a>
            </div>    
            </div>

<div class="container table-responsive">
<table class="table table-striped table-hover" id="datatable">
 <thead>
 	<tr>
 	<th>#</th>
 	 <th>Descripcion</th>
  	<th>Estatus</th>
 	<th>-</th>
 	</tr>
 </thead>
 <tbody>

 	@foreach($tipoJornada as $tipo)
 	<tr>
 	<td>{{ $tipo->id }}</td>
 	<td>{{ $tipo->descripcion }}</td>
 	<td>
 		@if($tipo->fkestatus==1){{ Activo }}
 		@else {{ Inactivo }}
 		@endif
 	</td>
	       <td>                     
                                <a href='{{ url("/sectores/editar/{$tipo->id}") }}'>
                                    <i class="far fa-edit fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Editar Sector"></i>
                                </a>
                                <a href='{{ url("/sectores/cambiar/estado/{$tipo->id}") }}'>
                                    <i class="far fa-times-circle fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Desactivar Sector"></i>
                                </a>
        </td>           

 	</tr>
 	@endforeach
 </tbody>
</table>

</div>
@endsection


@section("extraScript")

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


