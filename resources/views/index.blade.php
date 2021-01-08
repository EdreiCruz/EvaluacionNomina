@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left"><h3>Lista de empleados</h3></div>
                    <div class="float-right">
                        <a href="{{route('empleado.create')}}" class="btn btn-success">Crear empleado</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <table id="tablaempleados" class="table table-bordered table-striped">
                            <thead>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>E-Mail</th>
                                <th>Contrato</th>
                                <th>Status</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                <th>Más info</th>
                            </thead>
                            <tbody>
                            @if($empleados->count())
                                @foreach($empleados as $empleado)
                                    <tr>
                                        <td>{{$empleado->codigo}}</td>
                                        <td>{{$empleado->nombre." ".$empleado->apellidopaterno." ".$empleado->apellidomaterno}}</td>
                                        <td>{{$empleado->email}}</td>
                                        <td>{{$empleado->contrato}}</td>
                                        <td>
                                            @if($empleado->status == 0)
                                                <a class="btn btn-danger btn-xs" href="{{action('empleadoController@cambiostat',$empleado->id)}}">Inactivo</a>
                                            @else
                                                <a class="btn btn-success btn-xs" href="{{action('empleadoController@cambiostat',$empleado->id)}}">Activo</a>
                                            @endif
                                        </td>
                                        <td><a class="btn btn-primary" href="{{action('empleadoController@edit',$empleado->id)}}">Editar</a></td>
                                        <td>
                                            <form action="{{action('empleadoController@destroy',$empleado->id)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                        <td><a href="{{action('empleadoController@status',$empleado->id)}}" class="btn btn-info">Información</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">No existen registros</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$empleados->links()}}
            </div>
        </div>
    </div>
@endsection