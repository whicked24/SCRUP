
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
<h1>Datos Socioeconomicos</h1>

<form action=  {{url ('')}} method="POST">
    {{ csrf_field() }}

<div class="form-group">
    <label for="tipoVivienda">Tipo de vivienda</label>
    <select class="form-control" id="tipoVivienda" name="tipoVivienda">
      <option value="c">Casa</option>
      <option value="a">Apartamento</option>
    </select>
</div>



   N° <input type="number" name="numeroVivienda" id="numeroVivienda" >


<div class="form-group">
    <label for="estadoVivienda">Estado de vivienda</label>
    <select class="form-control" id="estadoVivienda" name="estadoVivienda">
      <option value="n">Nueva</option>
      
    </select>
</div>

<div class="form-group">
    <label for="tenenciaVivienda">Tenencia de vivienda</label>
    <select class="form-control" id="tenenciaVivienda" name="tenenciaVivienda">
      <option value="p">Propia</option>
      <option value="a">Alquilada</option>
    </select>
</div>


<h1>Detalles De Vivienda</h1>

 <div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" id="detalleViviendaCocina" name="detalleViviendaCocina">
  <label class="form-check-label" for="inlineCheckbox1">Cocina</label>

  	 &nbsp;&nbsp;<input class="form-check-input" type="number" name="cocinaCantidadVivienda" id="cocinaCantidadVivienda">
 	 <label class="form-check-label" for="inlineCheckbox2"></label>

</div>


 <div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" id="detalleViviendaBano" name="detalleViviendaBano">
  <label class="form-check-label" for="inlineCheckbox1">Baño</label>

  	 &nbsp;&nbsp;<input class="form-check-input" type="number" name="banoCantidad" id="banoCantidad">
 	 <label class="form-check-label" for="inlineCheckbox2"></label>

</div>

 <div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" id="detalleViviendaSala" name="detalleViviendaSala">
  <label class="form-check-label" for="inlineCheckbox1">Sala</label>

  	 &nbsp;&nbsp;<input class="form-check-input" type="number" name="salaCantidad" id="salaCantidad">
 	 <label class="form-check-label" for="inlineCheckbox2"></label>

</div>


 <div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" id="detalleViviendaHabitacion" name="detalleViviendaHabitacion">
  <label class="form-check-label" for="inlineCheckbox1">Habitaciones</label>

  	 &nbsp;&nbsp;<input class="form-check-input" type="number" name="habitacionesCantidad" id="habitacionesCantidad">
 	 <label class="form-check-label" for="inlineCheckbox2"></label>

</div>



 <div class="form-group">
    <label for="paredes">Tipo de paredes</label>
    <select class="form-control" id="paredes" name="paredes">
      <option value="f">Frisadas</option>
      <option value="s">sin Frisar</option>
      <option value="b">bloque</option>
      <option value="m">madera</option>
      
    </select>
</div><button id="masparedes" class="glyphicon glyphicon-plus" type="button"></button>


<div class="form-group">
    <label for="techo">Tipo de techo</label>
    <select class="form-control" id="techo" name="techo">
      <option value="p">platabanda</option>
      <option value="z">zing</option>
      <option value="r">techo razo</option>
      
      
    </select>
</div><button id="mastechos" class="glyphicon glyphicon-plus" type="button"></button>

<h1>Electrodomesticos</h1>


<div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" name="electrodomesticoNevera" id="electrodomesticoNevera">
  <label class="form-check-label" for="inlineCheckbox1">Nevera</label>

  	 &nbsp;&nbsp;<input class="form-check-input" type="number" name="neveraCantidad" id="neveraCantidad">
 	 <label class="form-check-label" for="inlineCheckbox2"></label>

</div>

<div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" name="electrodomesticoCocina" id="electrodomesticoCocina">
  <label class="form-check-label" for="inlineCheckbox1">Cocina</label>

  	 &nbsp;&nbsp;<input class="form-check-input" type="number" name="cocinaCantidad" id="cocinaCantidad">
 	 <label class="form-check-label" for="inlineCheckbox2"></label>

</div>


<div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" name="electrodomesticoMicroondas" id="electrodomesticoMicroondas">
  <label class="form-check-label" for="inlineCheckbox1">Microondas</label>

  	 &nbsp;&nbsp;<input class="form-check-input" type="number" name="microondasCantidad" id="microondasCantidad">
 	 <label class="form-check-label" for="inlineCheckbox2"></label>

</div>


<div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" name="electrodomesticoLavadora" id="electrodomesticoLavadora">
  <label class="form-check-label" for="inlineCheckbox1">Lavadora</label>

  	 &nbsp;&nbsp;<input class="form-check-input" type="number" name="lavadoraCantidad" id="lavadoraCantidad">
 	 <label class="form-check-label" for="inlineCheckbox2"></label>

</div>

<div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" name="electrodomesticoTelevisor" id="electrodomesticoTelevisor">
  <label class="form-check-label" for="inlineCheckbox1">Televisor</label>

  	 &nbsp;&nbsp;<input class="form-check-input" type="number" name="televisorCantidad" id="televisorCantidad">
 	 <label class="form-check-label" for="inlineCheckbox2"></label>

</div>

<div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" name="electrodomesticoVentiladorAire" id="electrodomesticoVentiladorAire">
  <label class="form-check-label" for="inlineCheckbox1">Ventilador/Aire</label>

  	 &nbsp;&nbsp;<input class="form-check-input" type="number" name="ventiladorAireCantidad" id="ventiladorAireCantidad">
 	 <label class="form-check-label" for="inlineCheckbox2"></label>

</div>



<h1>Animales Domesticos</h1>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="animalesSi" name="animales" value="SI">
  <label class="form-check-label" for="trab">SI</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="animalesNo" name="animales" value="NO" checked>
  <label class="form-check-label" for="trab2">NO</label>
</div>



<div class="form-group hidden">
  <label for="techo">-seleccione-</label>
  <select class="form-control" id="tipoAnimal" name="tipoAnimal">
      <option value="p">perro</option>
      <option value="g">gato</option>
      <option value="l">loro</option>
  </select>
  cuantos <input type="number" name="cantidadAnimal" id="cantidadAnimal"  min="1" max="5">
  <button id="masanimales" class="glyphicon glyphicon-plus" type="button"></button>
</div>


<p>Presencia de insectos y roedores</p>



<div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" id="plagaRatones" name="plagas" value="Ratones">
  <label class="form-check-label" for="inlineCheckbox1">Ratones</label>

</div>



<div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" id="plagaCucarachas" name="plagas" value="Cucarachas">
  <label class="form-check-label" for="inlineCheckbox1">Cucarachas</label>

</div>


<div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" id="plagaHormigas" name="plagas" value="Hormigas">
  <label class="form-check-label" for="inlineCheckbox1">Hormigas</label>

</div>


<div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" id="plagasMoscas" name="plagas" value="Moscas">
  <label class="form-check-label" for="inlineCheckbox1">Moscas</label>

</div>


<div class="form-check form-check-inline">

  <input class="form-check-input" type="checkbox" id="plagasOtros" name="plagas" value="Otros">
  <label class="form-check-label" for="inlineCheckbox1">Otros</label>
  <input type="text" class="form-control" name="plagasOtrasDescripcion" id="plagasOtrasDescripcion">
</div>





<button id="siguiente" name="siguiente" type="submit" class="btn btn-lg btn-primary" href="vivienda.blade.php">Siguiente</button>

 <a href="{{route('censo')}}" name="button"  class="btn btn-lg btn-secondary">Anterior</a>

</form>
</div>

@endsection

@section("extraScript")
<script>

//SI POSEE OTRA ENFERMEDAD SE SELECCIONA EL BOTON DE + Y APARACE OTRO CASILLA PARA ESCRIBIR-->

 $(document).ready(function(){
  
  var token = $("meta[name='csrf-token']").attr("content"); 
  var storage = localStorage['data'];
    if (storage){
      var data = JSON.parse(storage);
      console.log(data);
    }else{
      window.location.assign('{{ route("censo") }}');
    }
  
  $('#siguiente').on('click', function(e){
    e.preventDefault();

    var viviendaCocina = 0;
    var viviendaBano = 0;
    var viviendaSala = 0;
    var viviendaHabitaciones = 0;

    if ($('#detalleViviendaCocina').prop('checked') == true){
      viviendaCocina = $('#cocinaCantidadVivienda').val();
    }
    if ($('#detalleViviendaBano').prop('checked') == true){
      viviendaBano = $('#banoCantidad').val();
    }
    if ($('#detalleViviendaSala').prop('checked') == true){
      viviendaSala = $('#salaCantidad').val();
    }
    if ($('#detalleViviendaHabitacion').prop('checked') == true){
      viviendaHabitaciones = $('#habitacionesCantidad').val();
    }

    var nevera = 0;
    var cocina = 0;
    var microondas = 0;
    var lavadora = 0;
    var televisor = 0;
    var ventilador_aire = 0;

    if ($('#electrodomesticoNevera').prop('checked') == true){
      nevera = $('#neveraCantidad').val();
    }
    if ($('#electrodomesticoCocina').prop('checked') == true){
      cocina = $('#cocinaCantidad').val();
    }
    if ($('#electrodomesticoMicroondas').prop('checked') == true){
      microondas = $('#microondasCantidad').val();
    }
    if ($('#electrodomesticoLavadora').prop('checked') == true){
      lavadora = $('#lavadoraCantidad').val();
    }
    if ($('#electrodomesticoTelevisor').prop('checked') == true){
      televisor = $('#televisorCantidad').val();
    }
    if ($('#electrodomesticoVentiladorAire').prop('checked') == true){
      ventilador_aire = $('#ventiladorAireCantidad').val();
    }

    var otras_plagas = '';
    if ($('#plagasOtros').prop('checked') == true){
      otras_plagas = $('#plagasOtrasDescripcion').val();
    }

  
    data['vivienda'] = {'tipo_vivienda': $('#tipoVivienda').val(),
                        'numero_vivienda': $('#numeroVivienda').val(),
                        'estado_vivienda': $('#estadoVivienda').val(),
                        'tenencia_vivienda': $('#tenenciaVivienda').val(),
                        'tipo_paredes': $('#paredes').val(),
                        'tipo_techo': $('#techo').val()}

    data['espacios_vivienda'] = {'cocina': viviendaCocina,
                                 'bano': viviendaBano,
                                 'sala': viviendaSala,
                                 'habitaciones': viviendaHabitaciones}

    data['electrodomesticos'] = {'nevera': nevera,
                                 'cocina': cocina,
                                 'microondas': microondas,
                                 'lavadora': lavadora,
                                 'televisor': televisor,
                                 'ventilador_aire': ventilador_aire}

    data['animales'] = {'tipo': $('#tipoAnimal').val(),
                        'cantidad': $('#cantidadAnimal').val()}

    data['plagas'] = {'ratones': $('#plagaRatones').prop('checked'),
                      'cucarachas': $('#plagaCucarachas').prop('checked'),
                      'hormigas': $('#plagaHormigas').prop('checked'),
                      'moscas': $('#plagasMoscas').prop('checked'),
                      'otras': otras_plagas}

    /*var plagas = [];
      $('input[name="plagas"]').each(function(index){
        if ($(this).is(':checked')){
          plagas.push($(this).val());
        }
      })*/

    //data['plagas'] = plagas
    console.log(data);
    localStorage['data'] = JSON.stringify(data);
    $.ajax({
        url: '{{ route("nuevoCenso") }}',
        headers: {'X-CSRF-TOKEN': token},
        type: 'post',
        data: JSON.stringify(data),
        contentType: 'application/json',
        dataType: 'json'
    }).done(function(data){
        console.log(data);
    }).fail(function(e){
        console.log("error");
    });
    //window.location.assign('{{ route("censo3") }}');

  });

  

  $('input[name="animales"]').on('click', function(){
    if ($(this).val() === 'SI')
    {
      $('#tipoAnimal').parent().removeClass('hidden');
    }else{
      $('#tipoAnimal').parent().addClass('hidden');
    }
  });

 	$("#masparedes").on("click", function(e){
 		$("#masparedesContainer").append("<select class='form-control' name='paredes[]' id='paredes'>");
 	});
 });



 $(document).ready(function(){
 	$("#mastechos").on("click", function(e){
 		$("#mastechosContainer").append("<select class='form-control' name='techo[]' id='techo'>");
 	});
 });


$(document).ready(function(){
 	$("#masanimales").on("click", function(e){
 		$("#masanimalesContainer").append("<input type='text' class='form-control' name='masanimales[]' id='masanimales' >");
 	});
 });
 


</script>




@endsection