@extends('layouts.app')

@section("extraCss")
    <link href="{{ asset('css/datatable.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row row justify-content-center align-items-center">
        <div class="col-md-3 justify-content-center" id="menu">
            @component('layouts.menu')
        	@endcomponent
        </div>

         
        
        <div class="col-md-9 text-center">
            Registro de Datos Personales
            <br/>
            <form method="post" action="{{ route('SaveDatosPersonales') }}" class="text-left">
                {{ csrf_field() }}
                <div class="form-group">

                    <label for="nombres">Nombres</label>
                    <input name="nombres" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input name="apellidos" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cedula">Cédula</label>
                    <input name="cedula" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fecha_nac">Fecha de Nacimiento</label>
                    <input name="fecha_nac" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input name="telefono" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input name="correo" type="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña</label>
                    <input name="contrasena" type="password" class="form-control">
                </div>
                <button name="guardar" type="submit" class="btn btn-lg btn-primary">Guardar</button>


                <a href="{{route('datosPersonales')}}" name="button"  class="btn btn-lg btn-secondary">Regresar</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section("extraScript")
    <script>
        var urlDatosPersonales = "{{ route('DatosPersonalesGet') }}";
        var urlDatosPersonalesEdit = "{{ url('/') }}";
        var token = $("meta[name='csrf-token']").attr("content");
    </script>
    <script src="{{ asset('js/DatosPersonales.js') }}"></script>
@endsection
