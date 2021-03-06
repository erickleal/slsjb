@extends('layouts.app') 
@section('title','Login Administrador')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
             <div class="panel panel-default">
                <div class="panel-heading" align="center">
                    <font  size="4" face="verdana">Administrador</font>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/administradores/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                            <label for="rut" class="col-md-4 control-label">RUT :</label>

                            <div class="col-md-6">
                                <input id="rut" type="rut" class="form-control" name="rut" value="{{ old('rut') }}" required autofocus>

                                @if ($errors->has('rut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Recordarme
                                        </label> 
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-key"></i> Ingresar
                                    </button>
                                    <!--<a class="btn btn-primary" href="{{ url('administradores/register') }}">Crear cuenta</a>-->
                                    <!--<a class="btn btn-primary" href="{{ url('alumnos/register') }}">Registrar Alumno</a>
                                     <!--<a class="btn btn-link" href="{{ url('/administrador-auth/passwords/reset') }}">Olvidaste tu Contraseña?</a>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $("input#rut").rut();
</script>
@endsection