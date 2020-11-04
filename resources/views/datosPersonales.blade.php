@extends('layouts.app')

@section("extraCss")
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="row row justify-content-center align-items-center">
        <div class="col-md-3 justify-content-center" id="menu">
            @component('layouts.menu')
        	@endcomponent
        </div>
        <div class="col-md-9 text-center">
            Datos Personales
            <br/>
            <div class="text-right">
            <a class="btn btn-md btn-primary" id="btnNuevo" href="{{ route('NewDatosPersonales') }}">Registrar Nuevo usuario</a> 
            </div>
            <br/>
            <table id="DatosPersonales" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Cédula</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection

@section("extraScript")
    <script>
        var urlDatosPersonales = "{{ route('DatosPersonalesGet') }}";
        var baseUrl = "{{ url('/') }}";
        var token = $("meta[name='csrf-token']").attr("content");
    </script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    
    <script src="{{ asset('js/DatosPersonales.js') }}"></script>
@endsection