@extends('layouts.app')

@section('content')




<hr>
<form action="{{route('agregarTipo')}}" method="POST">
<div class="container row justify-content-lg-center"> 
<div class="col-md-10">
	<h3>Registro de Enfermedades</h3>
 {{ csrf_field() }}

    <div class="mb-3 row">
    <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
    <div class="col-sm-6">
      <input type="text"  class="form-control" id="descripcion"  name="descripcion" >
    </div>
  </div>




  </div>
   </div>
   <div class="container row justify-content-lg-left"> 
   		<div class="col-md-3">
	 
  </div>
	<div class="col-md-4">
	 <button type="submit" class="btn btn-primary btn-sm btn-block">Registrar</button>
  </div>
   </div>
   </form>
 
@endsection
