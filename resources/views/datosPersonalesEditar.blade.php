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
            <form method="post" action="{{ route('EditSaveDatosPersonales') }}" class="text-left">
                {{ csrf_field() }}
                <input name="id" type="hidden" value="{{ $data[0]->id }}">
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input name="nombres" type="text" class="form-control" value="{{ $data[0]->name }}">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input name="apellidos" type="text" class="form-control" value="{{ $data[0]->lastname }}">
                </div>
                <div class="form-group">
                    <label for="cedula">Cédula</label>
                    <input name="cedula" type="text" class="form-control" value="{{ $data[0]->vat }}">
                </div>
                <div class="form-group">
                    <label for="fecha_nac">Fecha de Nacimiento</label>
                    <input name="fecha_nac" type="text" class="form-control" value="{{ $data[0]->birthdate }}">
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input name="telefono" type="text" class="form-control" value="{{ $data[0]->phone }}">
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input name="correo" type="email" class="form-control" value="{{ $data[0]->email }}">
                </div>
                <button name="modificar" type="submit" class="btn btn-lg btn-primary">Modificar</button>
                <a class="btn btn-lg btn-danger" id="btnCancelar" href="{{ route('datosPersonales') }}">Cancelar</a> 
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
