@extends('layouts.admin')

@section('title','Editar Alumno')

@section('content')
	
	@if(count($errors)>0)
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
            	{!! $message !!}
            @endforeach
        </div>
    @endif

	{!! Form::open(array('route' => ['alumnos.update',$alumno],'method'=>'PUT', 'files' => true)) !!}
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
	            <div class="form-group">
	                {!! Form::label('rut','Rut')!!}
	                {!! Form::text('rut', $alumno->rut, array('placeholder' => 'Rut...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group"> 
	                {!! Form::label('nombre','Nombres')!!}
	                {!! Form::text('nombre', $alumno->nombre, array('placeholder' => 'Nombre...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('apellido_paterno','Apellido Paterno')!!}
	                {!! Form::text('apellido_paterno', $alumno->apellido_paterno, array('placeholder' => 'Apellido Paterno...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('apellido_materno','Apellido Materno')!!}
	                {!! Form::text('apellido_materno', $alumno->apellido_materno, array('placeholder' => 'Apellido Materno...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('email','Correo')!!}
	                {!! Form::text('email', $alumno->email, array('placeholder' => 'Correo...','class' => 'form-control')) !!}
	            </div>

	     
                 

	            <div class="form-group">
	                {!! Form::label('sexo','Sexo')!!}
	                {!! Form::select('sexo', ['' => 'Seleccionar...','Masculino' => 'Masculino', 'Femenino' => 'Femenino'], $alumno->sexo, ['class' => 'form-control']) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('telefono','Telefono')!!}
	                {!! Form::text('telefono', $alumno->telefono, array('placeholder' => 'Telefono...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
	                {!! Form::label('fecha_nacimiento','Fecha Nacimiento')!!}
	                {!! Form::date('fecha_nacimiento', $alumno->fecha_nacimiento, array('placeholder' => 'Fecha Nacimiento...','class' => 'form-control')) !!}
	            </div>

	            

	            @if(($alumno->id_apoderado) == null)
	            <div class="form-group">
	            	{!! Form::label('id_apoderado', 'Apoderado') !!}
                    {!! Form::select('id_apoderado',$apoderados,null,array('class' => 'form-control select-apoderado', 'placeholder' => 'Seleccione un apoderado')) !!}
                </div>
               	@else
               	<div class="form-group">
                    {!! Form::label('id_apoderado', 'Apoderado') !!}
                    {!! Form::select('id_apoderado',$apoderados,$alumno->apoderado->id,array('class' => 'form-control select-apoderado', 'placeholder' => 'Seleccione un apoderado')) !!}
                </div>
                @endif   
                
	            <div class="form-group">
	                {!! Form::label('direccion','Direccion')!!}
	                {!! Form::text('direccion', $alumno->direccion, array('placeholder' => 'Direccion...','class' => 'form-control')) !!}
	            </div>

	            <div class="form-group">
					{!! Form::label('foto','Foto')!!}
					{!! Form::file('foto', null, array('placeholder' => 'Foto...','class' => 'form-control')) !!}
					@if(($alumno->foto)!="")
						<br><img src="{{ asset('imagenes/alumnos/'.$alumno->foto) }}" height="200px" width="200px">
					@endif
				</div>

				<button type="submit" class="btn btn-primary">Editar</button>    
				<a class="btn btn-danger" href="{{route('alumnos.index')}}">Cancelar</a>   	
	        </div>
		</div>
	{!! Form::close() !!}

@endsection

@section('js')
<script>
    $("input#rut").rut();
    $('.select-apoderado').chosen({no_results_text: "Apoderado no registrado", max_selected_options: 1});
    $('.select-curso').chosen({no_results_text: "Curso no existe", max_selected_options: 1});
</script>
@endsection