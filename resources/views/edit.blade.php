@extends('layouts.layout')
@section('content')
    <style>
        .form-group{
            padding: 5px;
        }
    </style>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 col-md-offset-2">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-info">
                    {{Session::get('success')}}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Empleado</h3>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <form method="POST" action="{{ route('empleado.store') }}"  role="form" id="regf">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="codigo" id="codigo" class="form-control input-sm" placeholder="Código" value="{{$empleados->codigo}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nombre" pattern="[a-zA-Z ]{2,120}" id="nombre" class="form-control input-sm" placeholder="Nombre" value="{{$empleados->nombre}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="apellidopaterno" pattern="[a-zA-Z ]{2,120}" id="apellidopaterno" class="form-control input-sm" placeholder="Apellido paterno" value="{{$empleados->apellidopaterno}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="apellidomaterno" pattern="[a-zA-Z ]{2,120}" id="apellidomaterno" class="form-control input-sm" placeholder="Apellido materno" value="{{$empleados->apellidomaterno}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="contrato" pattern="[a-zA-Z ]{2,120}" id="contrato" class="form-control input-sm" placeholder="Tipo de contrato" value="{{$empleados->contrato}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Correo" value="{{$empleados->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 30px;">
                                <div class="col-xs-4 col-sm-4 col-md-4"></div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <input type="submit"  value="Guardar" class="btn btn-success btn-block" style="width: 100%; text-align: center;">
                                    <a href="{{ route('empleado.index') }}" class="btn btn-info btn-block"  style="width: 100%; text-align: center;">Atrás</a>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
@endsection