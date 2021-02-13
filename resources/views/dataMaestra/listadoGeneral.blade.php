@extends('layouts.app')

@section('content')

<div class="row justify-content-end">

	<div class="col-md-2">
	<form id="nuevo" method="GET" action="{{ route('formPlagas','plaga') }}">
		<button type="submit" class="btn btn-round btn-primary btn-sm" >Nuevo</button>
	</form>
		
	</div>

</div>

<div class="row justify-content-lg-center">
<div class="col-md-4">
		<h1>Datos Administrables</h1>
</div>

</div>

<div class="row justify-content-center">

	<div class="col-md-4">
	<select name="tipo" id="tipo" class="custom-select custom-select-lg mb-3" required="" title="SELECCIONE">
		<option value="">Seleccione...</option>
@foreach($tipos as $tipo)

<option value="{{$tipo->tipo}}">{{str_replace('_', ' ', strtoupper($tipo->tipo))}}</option>

@endforeach
</select>	
	</div>
<div id="route" name="route">
				
</div>



</div>
<div id="n">
	<p>HOLA</p>
</div>
@endsection

@section('extraScript')
<script>
	$('#tipo').change(function(){

		var tipo =$('#tipo').val();
	
		 var dato='<div id="route" name="route"><div class="col-md-2"><a href="{{ route("formGeneral","'+tipo+'") }}"><i class="far fa-edit fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Editar"></i></a></div></div>';
		 	 console.log(dato);
		 document.getElementById('route').innerHTML='<div id="route" name="route"><div class="col-md-2"><a href="{{ route("formGeneral","'+tipo+'") }}"><i class="far fa-edit fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Editar"></i></a></div></div>';
		 //document.getElementById('n').innerHTML='<div id="n"><p>'+tipo+'</p></div>';



	});


</script>

@endsection
