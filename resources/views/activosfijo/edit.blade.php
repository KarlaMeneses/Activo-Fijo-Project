@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Actualizar Activo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @error('name')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Este usuario ya está registrado.
                </div>
            @enderror
            <form action="{{ route('activosfijo.update', $activofijo) }}" method="post" novalidate>
                @csrf
                @method('put')
                <div>
                    <center>
                        <img src="{{ asset($activofijo->codigo) }}" width="350" height="350" />
                        <br>
                        <img height=120 width=300 data-value="{{ $activofijo->codigo }}" class="codigo" id="contenedor" />
                        <br>
                        <label for="name">Vista detallada de {{ $activofijo->detalle }} </label>

                    </center>
                </div>
                <br>
                <div class="row">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="codigo">Codigo De Activo</label>
                            <input type="text" name="codigo" class="form-control" value="{{ $activofijo->codigo }}">

                        </div>

                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre Del Activo</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $activofijo->nombre }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="detalle">Descripcion Del Activo</label>
                            <input type="text" name="detalle" class="form-control" value="{{ $activofijo->detalle }}">
                        </div>

                        <div class="col-md-3">
                            <label for="tipo">Tipo De Activo</label>
                            <input name="tipo" type="text" class="form-control" value="{{ $activofijo->tipo }}">
                        </div>

                        <div class="col-md-3">
                            <label for="fecha_ingreso">Fecha Ingreso</label>
                            <input name="fecha_ingreso" type="date" class="form-control"
                                value="{{ $activofijo->fecha_ingreso }}">
                        </div>

                        <div class="col-md-3">
                            <label for="costo">Costo Activo</label>
                            <input name="costo" type="text" class="form-control" value="{{ $activofijo->costo }}">
                        </div>

                        <div class="col-md-3">
                            <label for="vida_util">Vida Util Del Activo (años/meses)</label>
                            <input name="vida_util" type="text" class="form-control"
                                value="{{ $activofijo->vida_util }}">
                        </div>

                        <div class="col-md-3">
                            <label for="v_residual">Valor Residual%</label>
                            <input type="text" name="v_residual" class="form-control"
                                value="{{ $activofijo->v_residual }}">
                        </div>

                        <div class="col-md-3">
                            <label for="estado">Estado</label>
                            <input type="text" name="estado" class="form-control" value="{{ $activofijo->estado }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="proveedor">Proveedor Del Activo</label>
                            <input type="text" name="proveedor" class="form-control"
                                value="{{ $activofijo->proveedor }}">
                        </div>

                        <div class="form-group col-md-12">
                            <br>
                            <label for="name">UBICACION DEL ACTIVO</label>
                        </div>



                        <div class="col-md-12">
                            <label for="id_ubicacion">Seleccione la Ubicacion</label>
                            <select name="id_ubicacion" class="focus border-dark  form-control">
                                <option hidden disabled selected value> -- {{ $ubicaci->edificio }} / {{ $depa->nombre }} / {{ $ubicaci->ciudad }} -- </option>
                                @foreach ($ubicaciones as $ubi)
                                    @foreach ($departamentos as $departamento)
                                        @if ($departamento->id == $ubi->id_departamento)
                                            <option value="{{ $ubi->edificio }}">
                                                {{ $ubi->edificio }} / {{ $departamento->nombre }} / {{ $ubi->ciudad }}</option>
                                        @endif
                                    @endforeach
                                @endforeach

                            </select><br>

                        </div>


                    </div>
                </div>
                <br>
                <br>

                <button class="btn btn-primary" type="submit">Actualizar Usuario</button>
                <a class="btn btn-danger" href="{{ route('activosfijo.index') }}">Volver</a>
            </form>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', cargar, false);
        let checkP = document.getElementById('check_password');
        let contra = document.getElementById('passwordInput');

        function cambiarEstado() {
            if (contra. == true) {
                contra. = false
            } else {
                if (contra. == false) {
                    contra. = true
                    contra.value = ''
                }
            }
        }
        var rol = document.getElementById('select-roles');
        var empleados = document.getElementById('select-empleados');

        function cargar() {
            contra. = true
            contra.value = ''
            empleados. = false
        }

        function habilitar() {
            if (rol.value > 0) {
                empleados. = false
            } else {
                empleados. = true
                empleados.value = 0
            }
        }
        /* function elegirE(){
            if(odontologos.value > 0){
                odontologos. = false
            }
        } */
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
