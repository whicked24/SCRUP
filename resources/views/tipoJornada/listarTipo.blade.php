@extends('layouts.app')

@section('content')

<div class="row justify-content-end">

	<div class="col-md-2">
	<form id="nuevo" method="GET" action="{{ route('formTipo','tipoJornada') }}">
		<button type="submit" class="btn btn-round btn-primary btn-sm" >Nuevo</button>
	</form>
		
	</div>

</div>

<div class="row justify-content-lg-center">
<div class="col-md-4">
		<h1>Listado de animales</h1>
</div>

</div>


<div class="container table-responsive">
<table class="table table-striped table-hover">
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
	<td><a href="" class="btn btn-primary btn-sm btn-round">Editar</a></td>

 	</tr>
 	@endforeach
 </tbody>
</table>

</div>
@endsection


