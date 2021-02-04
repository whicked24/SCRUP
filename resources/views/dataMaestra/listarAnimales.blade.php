@extends('layouts.app')

@section('content')

<div class="row justify-content-end">

	<div class="col-md-2">
	<form id="nuevo" method="GET" action="{{ route('formAnimales','animales') }}">
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
 	<th>Tipo</th>
 	<th>Nombre</th>
 	<th>Codigo</th>
 	<th>Estatus</th>
 	<th>-</th>
 	</tr>
 </thead>
 <tbody>

 	@foreach($animales as $animal)
 	<tr>
 	<td>{{ $animal->id }}</td>
 	<td>{{ $animal->tipo }}</td>
 	<td>{{ $animal->nombre }}</td>
 	<td>{{ $animal->codigo }}</td>
 	<td>{{ $animal->estatus }}</td>
	<td><a href="" class="btn btn-primary btn-sm btn-round">Editar</a></td>

 	</tr>
 	@endforeach
 </tbody>
</table>

</div>
@endsection


