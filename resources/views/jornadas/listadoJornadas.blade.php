@extends('layouts.app')

@section('content')
	<script src="{{ asset('js/sweetalert2.js') }}"></script>
<div class="row justify-content-lg-center">
	<div class="col-md-4">
		<h1>Listado de Jornadas</h1>
	</div>
	
</div>


<div class="row justify-content-end">
	<div class="col-md-8">

		<a href="{{ route('reporteJornadas') }}"  target="_blank" class="btn btn-round btn-sm btn-primary">PDF</a>
	

	</div>

	<div class="col-md-2">
	<form id="nuevo" method="GET" action="{{ route('formJornada') }}">
		<button type="submit" class="btn btn-round btn-primary btn-sm" >Nueva Jornada</button>
	</form>
		
	</div>

</div>
<br><br>
@if(Session::has('msg'))
<div class="row justify-content-end">
	<div class="col-md-4">
<script>
	var msj="<?php echo Session::get('msg') ?>";
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  html: '<b><p style="color:green; font-size:14px;">'+msj+'</p></b>',
  width:300,
  showConfirmButton: false,
  timer: 4000
})
</script>
		
	</div>

</div>
@elseif(Session::has('error'))

<div class="row justify-content-end">
	<div class="col-md-4">

<script>
	var msj="<?php echo Session::get('error') ?>";
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  html: '<b><p style="color:red; font-size:14px;">'+msj+'</p></b>',
  width:300,
  showConfirmButton: false,
  timer: 4000
})
</script>

	</div>

</div>

@elseif(Session::has('validator'))
<div class="row justify-content-end">
	<div class="col-md-4">

<script>
	var validator="<?php echo Session::get('validator') ?>";
	Swal.fire({
  position: 'top-end',
  icon: 'success',
  html: '<b><p style="color:red; font-size:14px;">'+validator+'</p></b>',
  width:300,
  showConfirmButton: false,
  timer: 4000
})
</script>

	</div>

</div>

@endif





<br>
<div class=" container table-responsive">
	
<table id="datatable" class="table table-hover table-striped">
	<thead class="thead-light"> 
		<th class="text-center">#</th>
		<th class="text-center">Tipo de Jornada</th>
		<th class="text-center">Creado</th>
		<th class="text-center">Estatus</th>
		<th class="text-center">Asunto</th>
		<th class="text-center">Opciones</th>
		<th class="text-center"> Registro</th>
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
		
		<td>
<dir class="row">
	<form action="{{ route('addjornadahistorico',$jornadas->id) }}" method="POST">
			{{ csrf_field() }}
	
	<div class="col-md-6">
			<input type="text" name="cedula"  id="cedula" class="form-control" style="display: inline;">
	</div>
	<div class="col-md-4">
			 <button type="submit" class="btn btn-round btn-primary btn-sm" style="display: inline;">Registrar</button>
	</div>
</form>
</dir>
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

