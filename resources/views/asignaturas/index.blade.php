@if (Auth::guard("administrador")->check())

@extends('layouts.admin')

@section('title','Lista de Asignaturas')

@section('content')
	        	
	<a class="btn btn-success" href="{{ route('asignaturas.create') }}"> Registrar Nueva Asignatura</a>
	<!-- Buscador -->
	{!! Form::open(['route' => 'asignaturas.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
		<div class="input-group">
			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Buscar...', 'aria-describedby' => 'search']) !!}
			<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
		</div>
	{!! Form::close() !!}
	<!-- fin -->
	 
	<table class="table table-bordered"> 
		<tr>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Curso</th>
			<th>Periodo</th>
			<th>Profesor</th>
			<th>Sala</th>
			<th>Opciones</th>	
		</tr>
			@foreach ($asignaturas as $asi)
				<tr>
					<td>{{ $asi->codigo }}</td>
					<td>{{ $asi->nombre}}</td>
					@if(($asi->id_curso) == null)
					<td>Sin Curso</td>
					@else
					<td>{{ $asi->curso->nombre." - ".$asi->curso->tipo." / ".$asi->curso->created_at->year}}</td>
					@endif
					<td>{{ $asi->periodo." - ".$asi->created_at->year }}</td>
					@if(($asi->id_profesor) == null)
					<td>Sin Profesor</td>
					@else
					<td>{{ $asi->profesor->nombre." ".$asi->profesor->apellido_paterno}}</td>
					@endif
					@if(($asi->id_sala) == null)
					<td>Sin Sala</td>
					@else
					<td>{{ $asi->sala->nombre}}</td>
					@endif
					<td><a href="{{route('asignaturas.show', $asi->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>

					<a href="{{URL('showalumnosasignatura', $asi->id)}}" class="btn btn-success" ><span class="fa fa-user" aria-hidden="true"></span></a>

					<a href="{{route('asignaturas.edit', $asi->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						
					<a href="" data-target="#modal-delete-{{ $asi->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a></td>
				</tr>
				@include('asignaturas.modal')
			@endforeach

	</table>
	{!! $asignaturas->render() !!}
@endsection

@else

@include('layouts.error')

@endif