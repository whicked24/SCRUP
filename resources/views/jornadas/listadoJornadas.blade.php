@extends('layouts.app')

@section('content')

<div class="row justify-content-lg-center">
	<div class="col-md-4">
		<h1>Listado de Jornadas</h1>
	</div>
	
</div>
<div class="row justify-content-end">
	<div class="col-md-2">
		<form id="nuevo" method="GET" action="{{ route('formJornada') }}">
		<button type="submit" class="btn btn-round btn-primary btn-sm" >Nueva Jornada</button>
	</form>
		
	</div>
	
</div>
<div class=" container table-responsive">
	
<table id="datatable" class="table table-hover table-striped">
	<thead class="thead-light"> 
		<th class="text-center">#</th>
		<th class="text-center">Tipo de Jornada</th>
		<th class="text-center">Creado</th>
		<th class="text-center">Estatus</th>
		<th class="text-center">Asunto</th>
		<th class="text-center">Opciones</th>
	</thead>
	<tbody>


		<?php $i=0; ?>


	 @foreach($jornada as $jornadas)

	<?php $i++; ?>
	 	<tr>
		<th  class="text-center" scope="row" >{{ $i }}</th>
		<td class="text-center">{{ $jornadas->jornadas }}</td>
		<td class="text-center">{{   $jornadas->created_at }}</td>
		<td class="text-center">{{ $jornadas->estatus }}</td>
		<td class="text-center">{{ $jornadas->asunto }}</td>
		<td class="text-center" style="display: inline-flex;">
			<div style="padding: 5px;">
		<button  id="ver" name="ver" class="btn btn-round btn-sm btn-success" onclick="return detalle('{{ $jornadas->id }}')" 	>Ver ...</button>
		</div>
		
<div style="padding: 5px;">

	<a class="btn btn-round btn-sm btn-primary" href="{{ route('editarJornadasform',$jornadas->id) }}">Modificar</a>
	
</div>


<div style="padding: 5px;">

	<form action="{{ route('eliminarJornadas',$jornadas->id) }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('delete') }}
		<button class="btn btn-round btn-sm btn-danger" >Eliminar</button>
			</form>
</div>
		
				
		</td>
		</tr>
		  @endforeach
	</tbody>
</table>
</div>
@endsection


@section("extraScript")
<script src="{{ asset('ajax/jornadasAjax.js') }}"></script>

@endsection


<table>
	<thead>
		<th class="text-center">#</th>
		<th class="text-center">Tipo de Jornada</th>
		<th class="text-center">Creado</th>
		<th class="text-center">Estatus</th>
		<th class="text-center">Asunto</th>
		<th class="text-center">Opciones</th>
	</thead>
</table>