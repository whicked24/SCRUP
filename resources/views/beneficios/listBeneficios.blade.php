@extends('layouts.app')

@section('title', "censo2")
    


@section('content')

<div class="row justify-content-lg-center">
	<div class="col-md-6 col-lg-6">

	
<div class="card">
  <div class="card-header">
   Gestión de  Beneficio
  </div>
  <div class="card-body">
  	<form action="" method="POST">
  		

   <label for="beneficio">Beneficio</label>
    <input type="text" id="beneficio" name="beneficio" onkeyup="return  validar_upper(event)" maxlength="20" class="form-control" placeholder="Ingrese un nuevo beneficio..." required="">
    <br>
    <label for="tipo_persona">Seleccione...</label>
    <select class="selectpicker form-control" id="tipo_persona" title="Select a number" data-hide-disabled="true" multiple data-actions-box="true">
  
    </select>
    <br>   <br>   <br>
    <div class="text-center">
    	<button type="submit" class="btn btn-primary btn-round">Registrar</button>
    </div>
    

    </form>
  </div>
</div>


</div>
</div>
<script>
    function createOptions(number) {
  var options = [], _options;

  for (var i = 0; i < number; i++) {
    var option = '<option value="' + i + '">Option ' + i + '</option>';
    options.push(option);
  }

  _options = options.join('');
  

  $('#tipo_persona')[0].innerHTML = _options;
}

createOptions(4);
</script>
@endsection