@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('usuariosEditarGuardar') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $usuario[0]->id }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $usuario[0]->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $usuario[0]->lastname }}" required>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('vat') ? ' has-error' : '' }}">
                            <label for="vat" class="col-md-4 control-label">Cédula</label>

                            <div class="col-md-6">
                                <input id="vat" type="text" class="form-control" name="vat" value="{{ $usuario[0]->vat }}" required>

                                @if ($errors->has('vat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario[0]->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Tipo de usuaio</label>

                            <div class="col-md-6">
                                <select id="type" class="form-control" name="type" required>
                                    @if($usuario[0]->type == 1)
                                    <option value="1" selected>Jefe Comunal</option>
                                    <option value="2">Vocero</option>
                                    @else
                                    <option value="1">Jefe Comunal</option>
                                    <option value="2" selected>Vocero</option>
                                    @endif
                                </select><br>
                            </div>



                           
                        <div class="form-group">
                            <label for="sector" class="col-md-4 control-label"> Perteneciente al Sector</label>

                            <div class="col-md-6">
                                <select id="sector" class="form-control" name="sector" required>
                                    <option value="">Seleccione</option>
                                    @foreach($sectores as $sector)
                                    <option value="{{$sector->id}}" @if($sector->id==$usuario[0]->id_sector) selected @endif>{{$sector->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                <a class="btn btn-primary" href='{{route("usuariosListar")}}'>
                                    Regresar
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
