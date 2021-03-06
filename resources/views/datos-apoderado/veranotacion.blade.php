@if (Auth::guard('apoderado')->check())

@extends('layouts.admin')

@section('title','Listado de Anotaciones')

@section('content')
		

           <strong>Alumno : </strong><a>{{$alumno->nombre." ".$alumno->apellido_paterno." ".$alumno->apellido_materno}}</a><br>
           <strong>Rut: </strong><a>{{$alumno->rut}}</a><br><br>
                            <table class="table table-bordered">
                                <tr>
                                	<th>Fecha : </th>
                                	<th>Asignatura : </th>
                                	
                                    <th>Tipo : </th>
                                    <th>Descripcion : </th>
                                </tr>
                                @foreach($mis_anotaciones as $anotacion)
                                <tr>
                                    <td>{{Carbon\Carbon::parse($anotacion->created_at)->format('d-m-Y')}}</td>
                                    <td>{{$anotacion->asignatura->nombre." - ".$anotacion->asignatura->periodo}}</td>
                                   
                                    <td>{{$anotacion->tipo}}</td>
                                    <td>{{$anotacion->descripcion}}</td>    
                                </tr>
                                @endforeach
                            </table>

@endsection

@else

@include('layouts.error')

@endif