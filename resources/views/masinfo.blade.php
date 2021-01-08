@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Información detallada</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4" style="padding-left:40px;">
                            <h5>Información personal:</h5>
                            <p>Código: <span>{{$empleados->codigo}}</span></p>
                            <p>Nombre:
                                <span>{{$empleados->nombre." ".$empleados->apellidopaterno." ".$empleados->apellidomaterno}}</span>
                            </p>
                            <p>Salario: <span>{{$empleados->salario}}</span></p>
                            <p>Direccion: <span>{{$empleados->direccion}}</span></p>
                            <p>Telefono: <span>{{$empleados->telefono}}</span></p>
                            <p>Correo: <span>{{$empleados->email}}</span></p>
                            <p>Tipo de Contrato: <span>{{$empleados->contrato}}</span></p>
                            <p>Status:
                                <span>
                                        @if($empleados->status)
                                        Activo
                                    @else
                                        Inactivo
                                    @endif
                                    </span>
                            </p>
                            <p></p>
                        </div>
                        <div class="col-md-6">
                            <h4>Información monetaria</h4>
                            <p>Los salarios de todos los empleados crecen cada mes, debajo puedes calcular la constante
                                <strong>3% por defecto.</strong></p>
                            <div class="table-container">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Mes</th>
                                        <th scope="col">Pesos</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><p id="mes1pesos"></p></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td><p id="mes2pesos"></p></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td><p id="mes3pesos"></p></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td><p id="mes4pesos"></p></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td><p id="mes5pesos"></p></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td><p id="mes6pesos"></p></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <label for="constante">Constante Multiplicativa (Insertar en décimal)</label>
                            <input id="constante" name="constante" type="decimal" class="form-control input-sm"
                                   value="0.03" onkeyup="calculo();">
                        </div>
                    </div>
                </div>
                <a href="{{ route('empleado.index') }}" class="btn btn-info btn-block">Atrás</a>
            </div>
        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function () {
            calculo();
        });

        function calculo() {
            //definimos los primeros dos meses en la tabla
            var mes1pes = {{$empleados->salario}};
            $("#mes1pesos").text(mes1pes);
            var constante = $("#constante").val();
            //Se realiza el ciclo para los cálculos inmediatos
            for (var i = 2; i < 7; i++) {
                mes1pes += mes1pes * constante;
                var pesos = "mes" + i + "pesos";
                var columna = document.getElementById(pesos);
                columna.innerHTML = "" + Math.round(mes1pes);
            }
        }
    </script>