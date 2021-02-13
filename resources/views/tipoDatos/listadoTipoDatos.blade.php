@extends('layouts.app')

@section('content')

<div class="row justify-content-end">

	<div class="col-md-2">

		<button type="button" class="btn btn-round btn-primary btn-sm" >Nuevo</button>
	
		
	</div>

</div>

<div class="row justify-content-lg-center">
<div class="col-md-4">
		<h1>Datos Administrables  </h1>
</div>

</div>

<div class="container table-responsive">
<table id="tipostable" class="table table-striped table-hover">
		<thead>
		<tr>
			<th>#</th>
			<th>Descripcion</th>
			<th>Estatus</th>
			<th>--</th>
		</tr>
		</thead>
		<tbody>
			@foreach($tipos as $tipo)

			<tr>
				<td>{{ $tipo->id }}</td>
				<td >{{str_replace('_', ' ', strtoupper( $tipo->descripcion)) }}
	<a href="{{  route('formTipo',  [ 'name'=>$tipo->id])}}"><i class="far fa-edit fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Editar"></i></a>
				</td>

				
				<td>{{ $tipo->estatus }}</td>
			

				<td>
					<a href="{{  route('formTipo',  [ 'name'=>$tipo->id])}}"><i class="fas fa-plus fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Agregar"></i></a>

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
       var table = $('#tipostable').DataTable({
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
