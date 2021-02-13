@extends('layouts.app')

@section('content')



<hr>
@if($datos=="" || $datos==null)

<form action="{{route('agregarDatos')}}" method="POST">
@else 

<form action="{{route('editarDatos',$datos[0]->id)}}" method="POST">
{{ method_field('PUT') }}
@endif


<div class="container row justify-content-lg-center"> 
<div class="col-md-10">

	<h3>@if($datos=="" || $datos==null)Nuevo Registro Tipo @else Edición  de @endif  {{strtoupper($datos[0]->tipo)}}  </h3>

 {{ csrf_field() }}
@if($datos=="" || $datos==null) 

    <div class="mb-3 row">
    <label for="estatus" class="col-sm-2 col-form-label">Tipo</label>
    <div class="col-sm-6">
<select name="tipo" id="tipo" class="custom-select custom-select-lg mb-3">
  <option value="">Seleccione...</option>
  @foreach($datos_sql as $row)
<option value="{{$row->tipo}}">{{ str_replace('_', ' ', strtoupper($row->tipo)) }}</option>
  @endforeach
</select>
    </div>
    
  </div>
@else
  <div class="mb-3 row">
    <label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
    <div class="col-sm-6">
    	<input type="hidden" name="tipo" id="tipo" value="{{$datos[0]->tipo}}">
      <input type="text" readonly  class="form-control" id="tipo_n" name="tipo_n" value="<?php echo    strtoupper($datos[0]->tipo) ?>" >
    </div>
  </div>
@endif 


    <div class="mb-3 row">
    <label for="nombre" class="col-sm-2 col-form-label">Descripcion</label>
    <div class="col-sm-6">
      <input type="text"  class="form-control" id="nombre"  name="nombre" value="<?php echo $datos[0]->nombre; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="codigo" class="col-sm-2 col-form-label">Codigo</label>
    <div class="col-sm-6">
      <input type="text"  class="form-control" id="codigo" name="codigo" value="<?php echo $datos[0]->codigo; ?>" >
    </div>
  </div>

    <div class="mb-3 row">
    <label for="estatus" class="col-sm-2 col-form-label">Estatus</label>
    <div class="col-sm-6">
<select name="estatus" id="estatus" class="custom-select custom-select-lg mb-3">
  <option value="">Seleccione...</option>
  <option value="1" <?php if($datos[0]->fkestatus==1){echo 'selected';} ?>>Activo</option>
  <option value="2" <?php if($datos[0]->fkestatus==2){echo 'selected';} ?>>Inactivo</option>
</select>
    </div>
    
  </div>


   </div>
   <div class="container row justify-content-lg-left"> 
   		<div class="col-md-3">
	 
  </div>


	<div class="col-md-4">
	 <button type="submit" class="btn btn-primary btn-sm btn-block">@if($datos=="" || $datos==null)Registrar @else Editar @endif</button>
  	</div>


   </div>
   </form>
 
@endsection
