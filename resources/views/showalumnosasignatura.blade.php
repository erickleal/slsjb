@extends('layouts.admin')

@section('title','Listado de Alumnos')

@section('content')
	        	
	 <strong>Asignatura :   </strong>   <a>  {{$asignatura->nombre}}</a><br>
	 <strong>Curso : </strong> <a>{{$asignatura->curso->nombre." / ".$asignatura->curso->tipo}}</a><br>
	 <strong>Periodo :	  </strong> <a>{{$asignatura->periodo." - ".$asignatura->created_at->year}}</a><br>
	 <strong>Horario : 	  </strong> <a>{{$asignatura->horario}}</a><br><br>
	
	 
	<table class="table table-bordered">
		<tr>
			<th>N°</th>
			<th>Rut</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Correo</th>
			<th>Información</th>
			<th>Anotaciones</th>	
		</tr>

			@foreach ($alumnos as $alu)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $alu->rut }}</td>
					<td>{{ $alu->nombre}}</td>
					<td>{{ $alu->apellido_paterno." ".$alu->apellido_materno}}</td>
					<td>{{ $alu->email}}</td>

					<td><a href="{{route('alumnos.show', $alu->id)}}" class="btn btn-info" ><span class="fa fa-eye" aria-hidden="true"></span></a><br><br></td>
					
					<td><a href="{{URL('datos-profesor/veranotacion',array($alu->id, $asignatura->id ))}}" class="btn btn-warning" ><span class="fa fa-file-text" aria-hidden="true"> </span></a>
				
					<a href="{{URL('agregar/anotacion', array($alu->id, $asignatura->id ))}}" class="btn btn-danger" ><span class="fa fa-plus-square" aria-hidden="true"></span></a></td>

				</tr>
			@endforeach

	</table>

@endsection