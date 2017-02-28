@extends('layouts.admin')
@section('title','Editar Apoderado : ' . $apoderado->nombre." ".$apoderado->apellido_paterno)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-0">
                <div class="panel panel-default">
                    
                    @if($errors->has())
                        <div class='alert alert-danger'>
                            @foreach ($errors->all('<p>:message</p>') as $message)
                                {!! $message !!}
                            @endforeach
                        </div>
                    @endif
                    <div class="panel-body">
                        {!! Form::open(['route' => ['apoderados.update', $apoderado], 'method' => 'PUT', 'files' => true]) !!}
                         
                         <div class="form-group">
                            {!! Form::label('rut', 'Rut',['class'=>'control-label']) !!}
                            {!! Form::text('rut', $apoderado->rut, ['class' => 'form-control']) !!}
                        </div>
                         
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre',['class'=>'control-label']) !!}
                            {!! Form::text('nombre', $apoderado->nombre, ['class' => 'form-control']) !!}
                        </div>
                          <div class="form-group">
                            {!! Form::label('apellido_paterno','Apellido Paterno',['class'=>'control-label']) !!}
                            {!! Form::text('apellido_paterno', $apoderado->apellido_paterno,['class'=>'form-control']) !!}
                        </div>
                          <div class="form-group">
                            {!! Form::label('apellido_materno','Apellido Materno',['class'=>'control-label']) !!}
                            {!! Form::text('apellido_materno', $apoderado->apellido_materno,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email','Correo Electronico',['class'=>'control-label']) !!}
                            {!! Form::text('email', $apoderado->email,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('sexo','Sexo')!!}
                            {!! Form::select('sexo', ['' => 'Seleccionar...','Masculino' => 'Masculino', 'Femenino' => 'Femenino'], $apoderado->sexo, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('telefono','Telefono')!!}
                            {!! Form::text('telefono', $apoderado->telefono, array('placeholder' => 'Telefono...','class' => '       form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('fecha_nacimiento','Fecha Nacimiento')!!}
                            {!! Form::date('fecha_nacimiento', $apoderado->fecha_nacimiento, array('placeholder' => 'Fecha       Nacimiento...','class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('edad','Edad')!!}
                            {!! Form::text('edad', $apoderado->edad, array('placeholder' => 'Edad...','class' => 'form-control')) !!}
                        </div>
        
                        <div class="form-group">
                            {!! Form::label('direccion','Direccion')!!}
                            {!! Form::text('direccion', $apoderado->direccion, array('placeholder' => 'Direccion...','class' => '        form-control')) !!}
                        </div>    

                        <div class="form-group">
                            {!! Form::label('foto','Foto')!!}
                            {!! Form::file('foto', null, array('placeholder' => 'Foto...','class' => 'form-control')) !!}
                            @if(($apoderado->foto)!="")
                                <br><img src="{{ asset('imagenes/apoderados/'.$apoderado->foto) }}" height="200px" width="200px">
                            @endif
                        </div>  
                           
                        <div class="form-group">
                            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
                            <a class="btn btn-danger" href="{{url('home')}}">Cancelar</a>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection