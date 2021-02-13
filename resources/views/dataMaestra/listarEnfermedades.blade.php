@extends('layouts.app')

@section('content')



<div class="row justify-content-lg-center">
<div class="col-md-5">
		<h1>Listado de Enfermedades</h1>
</div>



</div>
<div class="container">
     <div class="text-right">
        <a href="{{ route('adminDataFrom') }}"><i class="fas fa-plus fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Nuevo"></i></a>
   </div>  
</div>

<div class="container table-responsive">
<table class="table table-striped table-hover" id="datatable">
 <thead>
 	<tr>
 	<th>#</th>
 	
 	<th>Nombre</th>
 	<th>Codigo</th>
 	<th>Estatus</th>
 	<th>-</th>
 	</tr>
 </thead>
 <tbody>

 	@foreach($enfermedades as $enfermedad)
 	<tr>
 	<td>{{ $enfermedad->id }}</td>
 	
 	<td>{{ $enfermedad->nombre }}</td>
 	<td>{{ $enfermedad->codigo }}</td>
 	<td>{{ $enfermedad->estatus }}</td>
	<td>
		                   
<a href='{{  route("adminDataFrom",$enfermedad->id)  }}'>
<i class="far fa-edit fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Editar"></i>
</a>
<a href='{{ route("eliminarDatos",$enfermedad->id)  }}'>
<i class="far fa-times-circle fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Eliminar"></i>
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


