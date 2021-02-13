@extends('layouts.app')

@section('content')




<hr>
<form action="{{route('editarTipoDatos')}}" method="POST">
<div class="container row justify-content-lg-center"> 
<div class="col-md-10">
	<h3>Editar  {{ str_replace('_', ' ', strtoupper($tipos[0]->descripcion)) }}</h3>
 {{ csrf_field() }}
 
    <div class="mb-3 row">
    <label for="nombre" class="col-sm-2 col-form-label">Descripcion</label>
    <div class="col-sm-6">
      <input type="text"  class="form-control" id="descripcion"  name="descripcion"  value="{{ $tipos[0]->descripcion }}">
    </div>

  </div>
      <div class="mb-3 row">
    <label for="ruta" class="col-sm-2 col-form-label">Ruta</label>
    <div class="col-sm-6">
      <input type="text"  class="form-control" id="ruta"  name="ruta"  value="{{ $tipos[0]->url }}">
    </div>

  </div>
    <div class="mb-3 row">
    <label for="menu" class="col-sm-2 col-form-label">Menu</label>
    <div class="col-sm-6">
<select name="menu" id="menu"  class="custom-select custom-select-lg mb-3">
  <option value="">Seleccione...</option>
  <option value="true"<?php if($tipos[0]->fkestatus==true){echo 'selected';} ?>>Activar</option>
  <option value="false"<?php if($tipos[0]->fkestatus==false){echo 'selected';} ?>>Inactivar</option>
</select>
    </div>
    
  </div>
    <div class="mb-3 row">
    <label for="estatus" class="col-sm-2 col-form-label">Estatus</label>
    <div class="col-sm-6">
<select name="estatus" id="estatus" class="custom-select custom-select-lg mb-3">
  <option value="">Seleccione...</option>
  <option value="1" <?php if($tipos[0]->fkestatus==1){echo 'selected';} ?>>Activar</option>
  <option value="2" <?php if($tipos[0]->fkestatus==2){echo 'selected';} ?>>Inactivar</option>
</select>
    </div>
    
  </div>


  
     </div>
  </div>
  <br>  <br>
        <div class="container row justify-content-lg-left"> 
          <div class="col-md-3">

          </div>
          <div class="col-md-4">
          <button type="submit" class="btn btn-primary btn-sm btn-block">Editar</button>
          </div>
        </div>
   </form>
 
@endsection
