@if (Auth::guard('profesor')->check())

@extends('layouts.admin')

@section('title','Lista de Eventos')

@section('content')
	        	
	<a class="btn btn-success" href="{{ route('eventos.create') }}">Nuevo Evento</a>
	<!-- Buscador -->
	{!! Form::open(['route' => 'eventos.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
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
			<th>Fecha</th>
			<th>Titulo</th>
			<th>Asignatura</th>
			<th>Periodo</th>
			<th>Curso</th>
			<th>Opciones</th>
				
		</tr>
			@foreach ($mis_eventos as $e)
				<tr>
					<td>{{ Carbon\Carbon::parse($e->fecha)->format('d-m-Y') }}</td>
					<td>{{ $e->nombre }}</td>
					<td>{{ $e->asignatura->nombre }}</td>
					<td>{{ $e->asignatura->periodo}}</td>
					<td>{{ $e->asignatura->curso->nombre." / ".$e->asignatura->curso->tipo}}</td>
					<td><a href="{{route('eventos.show', $e->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a>
						<a href="{{route('eventos.edit', $e->id)}}" class="btn btn-warning"><span class="fa fa-edit" aria-hidden="true"></span></a>
						
						<a href="" data-target="#modal-delete-{{ $e->id }}"" data-toggle="modal" class="btn btn-danger"> <span class="fa fa-trash" aria-hidden="true"></span></a>
				</tr>
				@include('eventos.modal')
			@endforeach

	</table>
	

@endsection

@else

@include('layouts.error')

@endif	