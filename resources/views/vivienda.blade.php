@extends('layouts.app')

@section('title', "censo2")
    


@section('content')


<div class="container-fluid">
    <div class="row row justify-content-center align-items-center">
        <div class="col-md-3 justify-content-center" id="menu">
            @component('layouts.menu')
        	@endcomponent
        </div>



<div class="col-md-9">
<h1>Servicios de vivienda</h1>

<form action=  {{url ('')}} method="POST">
    {{ csrf_field() }}


    <div class="form-group">
    <label for="edo_civil">Aguas Blancas</label>
    <select class="form-control" id="edo_civil" name="edo_civil">
      <option>##</option>
      estan en la base de datos
     
    </select>


<div class="form-check form-check-inline">
 <p>Tiene tanque</p> <input class="form-check-input" type="checkbox" id="trab1" value="option5">
  <label class="form-check-label" for="trab">SI</label>

  <input class="form-check-input" type="checkbox" id="trab2" value="option10">
  <label class="form-check-label" for="trab2">NO</label>
</div>


cuantos <input type="text" name="cuantos" id="cuantos">


<div class="form-group">
    <label for="edo_civil">Aguas servidas</label>
    <select class="form-control" id="edo_civil" name="edo_civil">
      <option>##</option>
      estan en la base de datos
     
    </select>



    <div class="form-group">
    <label for="edo_civil">Gas</label>
    <select class="form-control" id="edo_civil" name="edo_civil">
      <option>##</option>
      estan en la base de datos
     
    </select>


cuantos <input type="text" name="cuantos2" id="cuantos2">



    <div class="form-group">
    <label for="edo_civil">Sistema electrico</label>
    <select class="form-control" id="edo_civil" name="edo_civil">
      <option>##</option>
      estan en la base de datos
     
    </select>





    <div class="form-check form-check-inline">
 <p>tiene planta</p> <input class="form-check-input" type="checkbox" id="trab1" value="option5">
  <label class="form-check-label" for="trab">SI</label>

  <input class="form-check-input" type="checkbox" id="trab2" value="option10">
  <label class="form-check-label" for="trab2">NO</label>
</div>






    <div class="form-check form-check-inline">
 <p>bombillos ahorradores</p> <input class="form-check-input" type="checkbox" id="trab1" value="option5">
  <label class="form-check-label" for="trab">SI</label>

  <input class="form-check-input" type="checkbox" id="trab2" value="option10">
  <label class="form-check-label" for="trab2">NO</label>
</div>


    cuantos <input type="text" name="cuantos2" id="cuantos2">




      <div class="form-group">
    <label for="edo_civil">recolección de basura</label>
    <select class="form-control" id="edo_civil" name="edo_civil">
      <option>##</option>
      estan en la base de datos
     
    </select>



      <div class="form-group">
    <label for="edo_civil">transporte</label>
    <select class="form-control" id="edo_civil" name="edo_civil">
      <option>##</option>
      estan en la base de datos
     
    </select>








<h1>Servicios comunales </h1>


mercado <input type="text" name="mercado" id="mercado">


bodegas <input type="text" name="bodega" id="bodega">

farmacia <input type="text" name="farma" id="farma">

parque/plaza <input type="text" name="parque" id="parue">

etc<input type="text" name="etc" id="etc">



<button name="siguiente" id="siguiente" type="submit" class="btn btn-lg btn-primary" href="cargafamiliar.blade.php">Siguiente</button>

</form>
</div>

@endsection

@section("extraScript")
<script>
  $(document).ready(function(){
    var storage = localStorage['data'];
    if (storage){
      var data = JSON.parse(storage);
    }else{
      window.location.assign('{{ route("censo") }}');
    }

    $('#siguiente').on('click', function(e){
      e.preventDefault();
      
    });

  });
</script>
@endsection