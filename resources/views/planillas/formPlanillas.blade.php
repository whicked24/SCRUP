
@extends('layouts.app')

@section('content')
<br><br>
<div class="container">


<div class="card">
 <b><h4 class="card-header">Solicitud de planillas</h4></b> 
  <div class="card-body">

<form action="{{ route('generarPlanilla') }}" method="POST" target="_blank">
 {{ csrf_field() }}

<div class="row justify-content-lg-center">
	
<div class="col-md-4 col-lg-4 text-center">
	<label for="cedula" > Cédula</label>
<input type="text" name="cedula"  id="cedula" placeholder="Ingrese cedula a consultar" class="form-control" required="">
</div>


<div class="col-md-6 col-lg-6 text-center">
	<label for="planilla"> Planilla</label>
<select class="custom-select custom-select-lg mb-3" id="planilla" name="planilla" required="">
	<option value="0">Seleccione...</option>
	@foreach($tipos_planilla as $planilla)
	<option value="{{$planilla->codigo}}">{{$planilla->descripcion}}</option>

	@endforeach
</select>
</div>

</div>
<br><br><br>
<div class="row justify-content-lg-center">
<div class="col-md-3 col-lg-3">
	<button class="btn btn-primary btn-round ">Generar</button>
	</div>
	</div>
</form>

  </div>
</div>

@endsection