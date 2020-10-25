
@extends('layouts.app')

@section('content')



<?php if (isset($data) && $data!="") {  ?>
<form action="{{ route('editarJornadas',$data[0]->id) }}" method="POST" autocomplete="off">
	{{ method_field('PUT') }}

<?php  }else{ ?>
<form action="{{ route('addJornadas') }}" method="POST" autocomplete="off">
<?php } ?>



 {{ csrf_field() }}
	<div class="container">




<div class="card text-center">
  <div class="card-header">
  	<h4 class="tittle"> Registro de Jornadas</h4>
  
  </div>
  <div class="card-body">
    
		<div class="row justify-content-lg-center">
			<div class="col-md-6">
				  <div class="form-group">
    <label for="jornada">Tipo/Jornada</label>
   	<select  id="jornada" name="jornada" class="custom-select custom-select-lg mb-3">
		<option value="0">Seleccione..</option>
		 @foreach($tipoJornada as $jornada)
		<option value="{{ $jornada->id }}" <?php if (isset($data) && $data!="") { if($jornada->id==$data[0]->fktipo_jornada){echo "selected";} }?>>{{ $jornada->descripcion }}</option>
	   @endforeach
	</select>
   
  </div>
			</div>
			<div class="col-md-6">
				  <div class="form-group ">
  	 <label  for="beneficiario">Tipo/Beneficiario</label>
   <select name="beneficiario" id="beneficiario" class="custom-select custom-select-lg mb-3">
		<option>Seleccione...</option>
		 @foreach($tipo_beneficiario as $beneficiario)
		<option value="{{ $beneficiario->id }}" <?php if (isset($data) && $data!="") { if($beneficiario->id==$data[0]->fktipo_beneficiario){echo "selected";} }?>>{{ $beneficiario->descripcion }}</option>
	   @endforeach
	</select>
     </div>
			</div>
		</div>

					<div class="row justify-content-lg-center">
<div class="col-md-6">
  <div class="form-group">
    <label for="asunto">Asunto</label>
   <input type="text" id="asunto" name="asunto" class="form-control" maxlength="100" value="<?php if (isset($data) && $data!="") { echo $data[0]->asunto; }?>">
  </div>
</div>

<div class="col-md-6">

	
    <div class="form-group">
    <label for="descripcion">Descripcion</label>
  <input type="text" id="descripcion" name="descripcion" class="form-control" maxlength="100" value="<?php if (isset($data) && $data!="") { echo $data[0]->descripcion; }?>">
  </div>
</div>

	</div>

			<div class="row justify-content-lg-center">
<div class="col-md-6">
 <div class="form-group">
    <label for="fecha_inicio">Fecha Inicio</label>
  <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="<?php  if (isset($data) && $data!="") { echo date('Y-m-d', strtotime($data[0]->fecha_inicio)); } ?>">
  </div>
</div>

<div class="col-md-6">

 <div class="form-group">
    <label for="fecha_fin">Fecha Fin</label>
 <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="<?php  if (isset($data) && $data!="") { echo date('Y-m-d', strtotime($data[0]->fecha_fin )); } ?>">
  </div>
</div>

	</div>


<div class="row justify-content-lg-center">
			<div class="col-md-6">
			       <div class="form-group">
			    <label for="tiempo">Tiempo</label>
			 <input type="time" name="tiempo" id="tiempo" class="form-control" >
			  </div>
			</div>

			<div class="col-md-6">
			      <div class="form-group">
			    		<label for="estatus">Estatus</label>
						<select name="estatus" id="estatus" class="custom-select custom-select-lg mb-3">
							<option>Seleccione...</option>
								 @foreach($estatus as $estatus)
									<option value="{{ $estatus->id }}" <?php if (isset($data) && $data!="") { if($estatus->id==$data[0]->fkestatus){echo "selected";} }?>>{{ $estatus->descripcion }}</option>
								   @endforeach
						</select>
			  		</div>
				</div>
	</div>

				<div class="row justify-contet-lg-center">
					<div class="col-md-12 text-center">





					  <button type="submit" class="btn btn-primary form-control"><?php if (isset($data) && $data!="") { echo "Editar"; }else{ echo "Guardar";} ?></button>
					</div>
				</div>
</div>
</form>
  </div>
  <div class="card-footer text-muted">
    
  </div>
</div>
<br>
	<div class="row justify-contet-lg-center">
					<div class="col-md-3 text-center">
					  <a href="{{route('listadoJornadas') }}" class="btn btn-round btn-primary btn-sm">  Regresar</a>
					</div>
				</div>

@endsection