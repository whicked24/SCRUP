@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Registrar Sector</h2>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('sectoresEditarGuardar') }}">
                        {{ csrf_field() }}
                        <input id="id" name="id" type="hidden" value="{{$sector[0]->id}}">

                        <div class="form-group">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{$sector[0]->nombre}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guadar
                                </button>
                                <a class="btn btn-primary" href='{{route("sectoresListar")}}'>
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
