@extends('layouts.app')

@section("extraCss")
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12 text-center">
            <h2>Usuarios</h2>


                     <div class="container">
                       <div class="text-right">
                
      <a href="{{ route('register') }}"><i class="fas fa-plus fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Nuevo"></i></a>
            </div>    
            </div>
            <br/>
            <table id="datatable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cédula</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->lastname}}</td>
                            <td>{{$usuario->vat}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>
                                @if($usuario->type == 1)
                                    Jefe Comunal
                                @else
                                    Vocero
                                @endif
                            </td>
                            <td>
                                <a href='{{ url("/usuarios/editar/{$usuario->id}") }}'>
                                    <i class="far fa-edit fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Editar Usuario"></i>
                                </a>
                                <!--a href='#'>
                                    <i class="far fa-times-circle fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Eliminar producto"></i>
                                </a-->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection

@section("extraScript")
 <script src="{{ asset('js/datatables.min.js') }}"></script>
     <script>
       var table = $('#datatable').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
   
});
    </script>
    <script>
        var token = $("meta[name='csrf-token']").attr("content");
    </script>
@endsection