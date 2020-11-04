@extends('layouts.app')

@section('title', "censo")

@section('content')


<!--div class="container-fluid"-->
  <div class="row row justify-content-center align-items-center">
    <!--div class="col-md-3 justify-content-center" id="menu">
      @component('layouts.menu')
      @endcomponent
    </div-->

    <div class="col-md-12">
      <div class="page-header-info">
        <h4 class="alert alert-info text-center">Consejo comunal LUZ y Esperanza valle Azúl parroquia antimano  municipio libertador sector-valle azúl-caracas</h4>
      </div>
      <h1>Planilla de Censo</h1>
      <form action="{{url ('')}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        Fecha <input type="date" name="fecha" id="fecha" >
        <!--AUTOINCREMENTAL-->
        N°Planilla <input type="digits" name="n_planilla"  min="1" max="5" id="n_planilla">


        <!--div class="form-group">
          <label for="nombre_consejo">Consejo Comunal</label>
          <input class="form-control" name="nombre_consejo" type="text" value="Luz y esperanza valle azúl" readonly>
        </div>


        <div class="form-group">
          <label for="estado">Estado</label>
          <input class="form-control" name="estado" type="text" value="Distrito Capital" readonly> 
        </div>


        <div class="form-group">
          <label for="municipio">Municipio</label>
          <input class="form-control" name="municipio" type="text" value="Libertador" readonly>
        </div>



        <div class="form-group">
          <label for="parroquia">Parroquia</label>
          <input class="form-control" name="parroquia" type="text" value="Antimano" readonly>

        </div>


        <div class="form-group">
          <label for="sector">Sector</label>
          <input class="form-control" name="sector" type="text" value="Valle Azúl" readonly>

        </div-->



        <h1>Datos Personales</h1>


        Jefe de familia 

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="jefeFamiliaSi" name="jefeFamilia" value="SI">
          <label class="form-check-label" for="jefeFamiliaSi">SI</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="jefeFamiliaNo" name="jefeFamilia" value="NO" checked>
          <label class="form-check-label" for="jefeFamiliaNo">NO</label>
        </div>


<div class="col-md-2">
          <label for="ci">Cedula</label>
          <select class="form-control" id="ci" name="ci" >
            <option value="v">V</option>
            <option value="e">E</option>
            </select>
            </div>

           <div class="col-md-8"> 
          <label for="cedula"></label>
            <input type="text" class="form-control" name="cedula" id="cedula" placeholder="cedula">
          </div>


        <div class="col-md-8">
          <label for="nombre">Nombres</label>
          <input type="text" class="form-control" name="primerNombre" id="primerNombre" placeholder="primer nombre" required>

    
          <label for="nombre"></label>
          <input type="text" class="form-control" name="segundoNombre" id="segundoNombre" placeholder="Segundo nombre">
        </div>


        <div class="col-md-8">
          <label for="apellido">Apellidos</label>
          <input type="text" class="form-control" name="primerApellido" id="primerApellido" placeholder="primer apellido" required>
        </div>


        <div class="col-md-8">
          <label for="apellido"></label>
          <input type="text" class="form-control" name="segundoApellido" id="segundoApellido" placeholder="Segundo apellido">
        </div>


        

          <div class="col-md-4">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="">
          </div>


<!-- DEBE SALIR AUTOMATICAMENTE AL COLOCAR EN Q FECHA NACIO-->
          <div class="col-md-2">
            <label for="edad">Edad</label>
            <input type="number" class="form-control" name="edad" id="edad" readonly>
          </div>




          <div class="col-md-2">
           <p>sexo</p> <input class="form-check-input" type="radio" id="sexoFemenino" value="f" name="sexo" checked>
           <label class="form-check-label" for="sexoFemenino">F</label>

           <input class="form-check-input" type="radio" id="sexoMasculino" value="m" name="sexo">
           <label class="form-check-label" for="sexoMasculino">M</label>
         </div>






         <div class="col-md-2">
           <p>Discapacitado</p> <input class="form-check-input" type="radio" id="incapacitadoSi" value="SI" name="incapacitado">
           <label class="form-check-label" for="incapacitadoSi">SI</label>
           <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="incapacitadoNo" value="NO" name="incapacitado" checked>
            <label class="form-check-label" for="incapacitadoNo">NO</label>
          </div>



          <!--SI COLOCA Q SI APARECE ESTE CAMPO pero en vez d textarea q 
          sean checkboxes con el nombre de la enfermedad-->



          <div class="form-group hidden">
            <label for="tipo">Tipo</label>

            
          <div class="form-check form-check-inline">
           <input class="form-check-input" type="checkbox" id="tipoIncapacidad1" value="1" name="tipoIncapacidad" checked>
           <label class="form-check-label" for="sexoFemenino">sindrome de down</label>

           <input class="form-check-input" type="checkbox" id="tipoIncapacidad2" value="2" name="tipoIncapacidad">
           <label class="form-check-label" for="sexoMasculino">invalido</label>
         </div>


<!--esta q la vea solo el administardor  y no los voceros del concejo comunal-->
           Nueva Discapacidad <textarea class="form-control" name="incapacitadoDescripcion" id="incapacitadoDescripcion" rows="3"></textarea>
          </div>


           <div class="form-group">
            <label for="enfermedad">Enfermedad</label>
            <select class="form-control" id="enfermedad" name="enfermedad">
              <option value="0">Seleccione una enfermedad</option>
              <!--@foreach($enfermedades as $enfermedad)
                <option value="{{$enfermedad->id}}">{{$enfermedad->nombre}}</option>
              @endforeach-->
            </select>




          <div class="form-group">
            <label for="edo_civil">Edo. Civil</label>
            <select class="form-control" id="edo_civil" name="edo_civil">
              <option value="s">soltero</option>
              <option value="c">casado</option>
              <option value="v">viudo</option>
              <option value="d">divorciado</option>
            </select>


            <div class="form-group">
              <label for="nivel">Nivel Instrucción</label>
              <select class="form-control" id="nivel" name="nivel">
                <option value="p">Primaria</option>
                <option value="s">Segundaria</option>
                <option value="b">Bachiller</option>
                <option value="u">Universitaria</option>
              </select>


              <div class="form-check form-check-inline">
               <p>Trabaja Actualmente</p> <input class="form-check-input" type="radio" id="trabajaSi" value="SI" name="trabaja">
               <label class="form-check-label" for="trabajaSi">SI</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="trabajaNo" value="NO" name="trabaja" checked>
                <label class="form-check-label" for="trabajaNo">NO</label>
              </div>




              <div class="form-group hidden">
                <label for="oficio">Profesión u oficio</label>
                <textarea class="form-control" name="oficio" id="oficio" rows="3"></textarea>
              </div>



            <!--si coloca que si que se active para llenar estos datos-->


              <div class="form-group hidden">
                <label for="institucionLaboral">Tipo de instituto laboral</label>
                <select class="form-control" id="institucionLaboral" name="institucionLaboral">
                  <option value="">-----</option>
                  <option value="pub">Publica</option>
                  <option value="pri">Privada</option>
                  <option value="Pro">Cta. Propia</option>
                </select>
              </div>



            <div class="form-group hidden">
              <label for="nombre_institucion_laboral">Nombre de instituto laboral</label>
              <input type="text" class="form-control" name="nombre_institucion_laboral" id="nombre_institucion_laboral" placeholder="">
            </div>






            <div class="form-group hidden">
              <label for="ingreso" id="ingreso">Ingreso Mensual </label>
              
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="ingreso1" value="1" name="ingreso">
               <label class="form-check-label" for="ingreso1">40.000-100.000</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="ingreso2" value="2" name="ingreso" >
                <label class="form-check-label" for="ingreso2">100.000-150.000</label>
              </div>


               <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="ingreso3" value="3" name="ingreso">
               <label class="form-check-label" for="ingreso3">150.000-200.000</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="ingreso4" value="4" name="ingreso" >
                <label class="form-check-label" for="ingreso4">300.000-500.000</label>
              </div>


                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="ingreso5" value="5" name="ingreso">
               <label class="form-check-label" for="trabajaSi">500.000-1000.000</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="ingreso6" value="6" name="ingreso" >
                <label class="form-check-label" for="ingreso6">1000.000-2.000.000</label>
              </div>


            </div>



            


            <div class="form-check form-check-inline">
             <p>Estudia Actualmente</p>
             <input class="form-check-input" type="radio" id="estudiaSi" value="SI" name="estudia">
             <label class="form-check-label" for="estudiaSi">SI</label>
           </div>
           <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="estudiaNo" value="NO" name="estudia" checked>
            <label class="form-check-label" for="estudiaNo">NO</label>
          </div>


          <div class="form-group hidden">
            <label for="nivel_institucion_educativa">Institución Educativa</label>
            <select class="form-control" id="nivel_institucion_educativa" name="nivel_institucion_educativa">
              <option value="">-----</option>
              <option value="pub">publica</option>
              <option value="pri">privada</option>
            </select>
          </div>



          <div class="form-group hidden">
            <label for="nombre_inst">Nombre de institución Educativa</label>
            <input type="text" class="form-control" name="nombre_inst" id="nombre_inst" placeholder="">
          </div>



          <button id="siguiente" name="siguiente" type="submit" class="btn btn-lg btn-primary" href="censo2.blade.php">Siguiente</button>

        </form>
      </div>








      @endsection

      @section("extraScript")
      <script>

//SI POSEE OTRA ENFERMEDAD SE SELECCIONA EL BOTON DE + Y APARACE OTRO CASILLA PARA ESCRIBIR-->
var urlNuevoCenso = '{{ route("nuevoCenso") }}';
var token = $("meta[name='csrf-token']").attr("content"); 
$(document).ready(function(){
  /*$("#masEnfermedad").on("click", function(e){
   $("#masEnfermedadContainer").append("<input type='text' class='form-control' name='enfermedad[]' id='enfermedad' placeholder=''>");
  });*/
  $('input[name="incapacitado"]').on('click', function(){
    if ($(this).val() === 'SI')
    {
      $('#incapacitadoDescripcion').parent().removeClass('hidden');
    }else{
      $('#incapacitadoDescripcion').parent().addClass('hidden');
      $('#incapacitadoDescripcion').val('');
    }
  });

  $('input[name="trabaja"]').on('click', function(){
    if ($(this).val() === 'SI')
    {
      $('#oficio').parent().removeClass('hidden');
      $('#institucionLaboral').parent().removeClass('hidden');
      $('#nombre_institucion_laboral').parent().removeClass('hidden');
      $('#ingreso').parent().removeClass('hidden');
    }else{
      $('#oficio').parent().addClass('hidden');
      $('#institucionLaboral').parent().addClass('hidden');
      $('#nombre_institucion_laboral').parent().addClass('hidden');
      $('#ingreso').parent().addClass('hidden');
    }
  });

  $('input[name="estudia"]').on('click', function(){
    if ($(this).val() === 'SI')
    {
      $('#nivel_institucion_educativa').parent().removeClass('hidden');
      $('#nombre_inst').parent().removeClass('hidden');
    }else{
      $('#nivel_institucion_educativa').parent().addClass('hidden');
      $('#nombre_inst').parent().addClass('hidden');
    }
  });

  $("#fecha_nacimiento").on('change', function(e){
    e.preventDefault();
    var fecha_nacimiento = $(this).val();
    var edad = 0;
    if (Date.parse(fecha_nacimiento)){
      var hoy = new Date();
      fecha_nacimiento = new Date(fecha_nacimiento);
      edad = hoy.getFullYear() - fecha_nacimiento.getFullYear();
      var mes = hoy.getMonth() - fecha_nacimiento.getMonth();
      if (mes < 0 || (mes === 0 && hoy.getDate() < fecha_nacimiento.getDate())){
        edad--;
      }
    }
    $('#edad').val(edad);
  });

  $("#siguiente").on('click', function(e){
    e.preventDefault();

    var enfermedades = [];
    $('input[name="enfermedad[]"]').each(function(index){
      enfermedades.push($(this).val());
    })

    var sindromeDown = false;
    if($('#tipoIncapacidad1:checked').prop('checked') == true){
      sindromeDown = true;
    }

    var invalido = false;
    if($('#tipoIncapacidad2:checked').prop('checked') == true){
      invalido = true;
    }
    
    data = {'censo':{'fecha':$('#fecha').val(),
                     'numero_planilla': $('#n_planilla').val()
                    },
            'personal':{'jefe_familia': $('input[name="jefeFamilia"]:checked').val(),
                        'primer_nombre': $('#primerNombre').val(),
                        'segundo_nombre': $('#segundoNombre').val(),
                        'primer_apellido': $('#primerApellido').val(),
                        'segundo_apellido': $('#segundoApellido').val(),
                        'nacionalidad': $('#ci').val(),
                        'cedula': $('#cedula').val(),
                        'fecha_nacimiento': $('#fecha_nacimiento').val(),
                        'sexo': $('input[name="sexo"]:checked').val(),
                        'incapacitado': $('#incapacitadoDescripcion').val(),
                        'estado_civil': $('#edo_civil').val(),
                        'nivel_instruccion': $('#nivel').val(),
                        'id_enfermedad': $('#enfermedad').val()
                        },
            'discapacidad':{'sindrome_down': sindromeDown,
                            'invalido': invalido,
                            'otra_discapacidad': $('#incapacitadoDescripcion').val()
                          },
            }
    if ($('input[name="trabaja"]:checked').val() === 'SI'){
      data['socioeconomico'] = {
        'oficio': $('#oficio').val(),
        'tipo_institucion': $('#institucionLaboral').val(),
        'nombre_institucion': $('#nombre_institucion_laboral').val(),
        'ingreso_mensual': $('input[name="ingreso"]:checked').val()
      }
    }
    if ($('input[name="estudia"]:checked').val() === 'SI'){
      data['estudios'] = {
        'tipo_institucion': $('#nivel_institucion_educativa').val(),
        'nombre_institucion': $('#nombre_inst').val(),
      }
    }
    localStorage['data'] = JSON.stringify(data);
    window.location.assign('{{ route("censo2") }}');

  });

});
</script>





@endsection