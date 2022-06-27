@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <div class="card-header  text-center">
        <h3><b>Crear Activo Fijo</b></h3>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('activosfijo.store') }}" method="post">
                @csrf


                <br>
                <div class="row">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="codigo">Codigo De Activo</label>
                            <input type="text" name="codigo" class="form-control" value="">

                        </div>

                        <div class="form-group col-md-6">
                            <label for="detalle">Nombre Del Activo</label>
                            <input type="text" name="nombre" class="form-control" value="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="detalle">Descripcion Del Activo</label>
                            <input type="text" name="detalle" class="form-control" value="">
                        </div>

                        <div class="col-md-3">
                            <label for="tipo">Tipo De Activo</label>
                            <select name="tipo" id="tipo" class="form-control" required>
                                <option hidden disabled selected> -- seleccionar-- </option>
                                <option value="Tangible">Tangible</option>
                                <option value="Intangible">Intangible</option>
                                <option value="Inversion">Inversion</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="fecha_ingreso">Fecha Ingreso</label>
                            <input type="date" name="fecha_ingreso" class="form-control"value="">
                        </div>

                        <div class="col-md-3">
                            <label for="costo">Costo Activo</label>
                            <input name="costo" type="decimal" class="form-control" value="">
                        </div>

                        <div class="col-md-3">
                            <label for="vida_util">Vida Util Del Activo (años/meses)</label>
                            <input name="vida_util" type="text" class="form-control" value="">
                        </div>

                        <div class="col-md-3">
                            <label for="estado">Seleccione El Estado</label>
                            <select name="estado" id="estado" class="form-control" required>
                                <option hidden disabled selected> -- seleccionar-- </option>
                                <option value="Activo">Activo</option>
                                <option value="En Mantenimiento">En Mantenimiento</option>
                                <option value="No Activo">No Activo</option>
                                <option value="Perdida/Extrabio">Perdidad / Extrabio</option>
                            </select>

                        </div>

                        <div class="form-group col-md-6">
                            <label for="proveedor">Proveedor Del Activo</label>
                            <input type="text" name="proveedor" class="form-control" value="">
                        </div>


                        <div class="col-md-3">
                            <label for="id_ubicacion">Seleccione la Ubicacion</label>
                            
                            <select name="id_ubicacion" class="focus border-dark  form-control">
                                <option hidden disabled selected value> -- seleccionar-- </option>
                                @foreach ($ubi as $ubi)
                                    <option value="{{ $ubi->edificio }}">{{ $ubi->edificio }}</option>
                                @endforeach

                            </select><br>
                          
                        </div>
                        <div class="col-md-6">
                            <label for="id_factura">Factura</label>
                            <input type="text" name="id_factura" class="form-control"
                                value="Automatico id al realizar la factura">
                        </div>

                    </div>
                </div>
                <br>


                <button class="btn btn-danger btn-sm" type="submit">Crear Activo</button>
                <a class="btn btn-primary btn-sm" href="{{ route('activosfijo.index') }}">Volver</a>
            </form>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', cargar, false);
        var rol = document.getElementById('select-roles');
        var empleados = document.getElementById('select-empleados');

        function habilitar() {
            if (rol.value > 0) {
                empleados = false
            } else {
                empleados = true
                empleados.value = 0
            }
        }

        function cargar() {
            if (rol.value > 0) {
                empleados = false
            } else {
                empleados = true
                empleados.value = 0
            }
        }
        /* function elegirE(){
            if(odontologos.value > 0){
                odontologos = false
            }
        } */
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
