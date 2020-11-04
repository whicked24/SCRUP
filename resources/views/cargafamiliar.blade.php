 

@extends('layouts.app')

@section('title', "cargafamiliar")
    


@section('content')


<div class="container-fluid">
    <div class="row row justify-content-center align-items-center">
        <div class="col-md-3 justify-content-center" id="menu">
            @component('layouts.menu')
          @endcomponent
        </div>



<div class="col-md-9">


 <h1>Carga Familiar</h1>

    <div class="form-group">
    <label for="nombre">Nombres</label>
    <input type="text" class="form-control" id="nombre" placeholder="primer nombre">
  </div>
    

<div class="form-group">
    <label for="nombre"></label>
    <input type="text" class="form-control" id="nombre" placeholder="Segundo nombre">
  </div>


 <div class="form-group">
    <label for="apellido">Apellidos</label>
    <input type="text" class="form-control" id="apellido" placeholder="primer apellido">
  </div>
    

<div class="form-group">
    <label for="apellido"></label>
    <input type="text" class="form-control" id="apellido" placeholder="Segundo apellido">
  </div>


<div class="form-group">
    <label for="ci">Cedula</label>
    <select class="form-control" id="" name="ci">
      <option>V</option>
      <option>E</option>
    </select>




<div class="form-group">
    <label for="cedula"></label>
    <input type="text" class="form-control" id="cedula" placeholder="cedula">
  </div>



<div class="form-group">
    <label for="cedula">Fecha de Nacimiento</label>
    <input type="date" class="form-control" id="fecha_nacimiento" placeholder="">
  </div>



<div class="form-group">
    <label for="cedula">Edad</label>
    <input type="number" class="form-control" id="edad" placeholder="">
  </div>





 <div class="form-check form-check-inline">
 <p>sexo</p> <input class="form-check-input" type="checkbox" id="trab1" value="option5">
  <label class="form-check-label" for="trab">F</label>

  <input class="form-check-input" type="checkbox" id="trab2" value="option10">
  <label class="form-check-label" for="trab2">M</label>
</div>




	

<div class="form-group">
    <label for="parentesco">Parentesco</label>
    <select class="form-control" id="parentesco" name="parentesco">
      <option>padre</option>
      <option>madre</option>
      <option>hijo</option>
      <option>sobrino</option>
      <option>tio</option>
      <option>abuelo</option>
      
    </select>
</div><button id="masparentesco" class="glyphicon glyphicon-plus" type="button"></button>







<p> Necesita usted alguna ayuda personal para su nucleo </p>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="trab1" value="option5">
  <label class="form-check-label" for="trab">SI</label>
  <input class="form-check-input" type="checkbox" id="trab2" value="option10">
  <label class="form-check-label" for="trab2">NO</label>
</div>



<div class="form-group">
    <label for="tipo"></label>
    <textarea class="form-control" id="tipo" rows="3"></textarea>
  </div>





<button name="siguiente" type="submit" class="btn btn-lg btn-primary" href="salud.blade.php">Guardar</button>







</form>
</div>

@endsection

@section("extraScript")
<script>


 $(document).ready(function(){
  $("#masparentesco").on("click", function(e){
    $("#masparentescoContainer").append("<select class='form-control' name='parentesco[]' id='parentesco'>");
  });
 });

 </script>




@endsection