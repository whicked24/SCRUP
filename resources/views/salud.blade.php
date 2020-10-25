
@extends('layouts.app')

@section('title', "salud")
    


@section('content')


<div class="container-fluid">
    <div class="row row justify-content-center align-items-center">
        <div class="col-md-3 justify-content-center" id="menu">
            @component('layouts.menu')
        	@endcomponent
        </div>



<div class="col-md-9">
<h1>Salud</h1>

<form action=  {{url ('')}} method="POST">
    {{ csrf_field() }}



    <p>¿Existen personas en su nucleo familiar que padecen de alguna enfermedad</p>


    <div class="form-check form-check-inline">
     <input class="form-check-input" type="checkbox" id="trab1" value="option5">
  <label class="form-check-label" for="trab">SI</label>

  <input class="form-check-input" type="checkbox" id="trab2" value="option10">
  <label class="form-check-label" for="trab2">NO</label>
</div>


<div class="form-group">
    <label for="ci">Cedula</label>
    <select class="form-control" id="" name="ci">
      <option>V</option>
      <option>E</option>
    </select>

    <label for="cedula"></label>
    <input type="text" class="form-control" id="cedula" placeholder="cedula">
  </div>


  Cual <input type="text" class="form-control" name="enfermedad[]" id="enfermedad" placeholder="">
  </div><button id="masEnfermedad" class="glyphicon glyphicon-plus" type="button"></button>

<p>Necesita usted de alguna ayuda especial para su nucleo</p>


  <div class="form-check form-check-inline">
     <input class="form-check-input" type="checkbox" id="trab1" value="option5">
  <label class="form-check-label" for="trab">SI</label>

  <input class="form-check-input" type="checkbox" id="trab2" value="option10">
  <label class="form-check-label" for="trab2">NO</label>
</div>


<div class="form-group">
    <label for="tipo"></label>
    <textarea class="form-control" id="tipo" rows="3" placeholder="Describa aqui que tipo de ayuda necesita para su hogar"></textarea>
  </div>


<button name="siguiente" type="submit" class="btn btn-lg btn-primary" href="censo2.blade.php">Guardar</button>


    </form>
</div>

@endsection

@section("extraScript")
<script>

//SI POSEE OTRA ENFERMEDAD SE SELECCIONA EL BOTON DE + Y APARACE OTRO CASILLA PARA ESCRIBIR-->

 $(document).ready(function(){
 	$("#masEnfermedad").on("click", function(e){
 		$("#masEnfermedadContainer").append("<input type='text' class='form-control' name='enfermedad[]' id='enfermedad' placeholder=''>");
 	});
 });
</script>





@endsection