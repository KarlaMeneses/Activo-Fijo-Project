@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <center>
                        <h2 class="font-weight-bold px-2">Información de Activo fijo</h2>
                    </center>
                </div>
            </div>

                <center>
                    <img src="{{ asset($activofijo->codigo) }}" width="350" height="350" />
                    <br>
                    <img height=120 width=300 data-value="{{ $activofijo->codigo }}" class="codigo"
                            id="contenedor" />
                    <br>
                    <label for="name">Vista detallada de {{ $activofijo->detalle }} </label>

                </center>
            </div>

            <div class="row">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="codigo">Ingrese el nombre de cuenta contable</label>
                        <input type="text" name="codigo" class="form-control" value="{{ $activofijo->codigo }}" disabled>

                    </div>

                    <div class="form-group col-md-6">
                        <label for="detalle">Ingrese la descripción del activo</label>
                        <input type="text" name="detalle" class="form-control" value="{{ $activofijo->detalle }}"
                            disabled>
                    </div>

                    <div class="col-md-3">
                        <label for="costo">Seleccione el tipo activo</label>
                        <input name="costo" type="tel" class="form-control" value="{{ $activofijo->costo }}" disabled>

                    </div>

                    <div class="col-md-3">
                        <label for="fecha_ingreso">Seleccione un cacateristica</label>
                        <input name="fecha_ingreso" type="tel" class="form-control"
                            value="{{ $activofijo->fecha_ingreso }}" disabled>
                    </div>

                    <div class="col-md-3">
                        <label for="proveedor">Ingrese la vida util (años)</label>
                        <input name="proveedor" type="tel" class="form-control" value="{{ $activofijo->vida_util }}"
                            disabled>
                    </div>

                    <div class="col-md-3">
                        <label for="estado">Ingrese el valor residual %</label>
                        <input type="tel" name="estado" class="form-control" value="{{ $activofijo->estado }}" disabled>

                    </div>


                    @foreach ($ubicaciones as $ubicacion)
                        @if ($activofijo->id_ubicacion == $ubicacion->id)
                            <div class="col-md-3">
                                <label for="edificio">edificio</label>
                                <input name="edificio" type="tel" class="form-control"
                                    value="{{ $ubicacion->edificio }}" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="ciudad">ciudad</label>
                                <input name="ciudad" type="tel" class="form-control" value="{{ $ubicacion->ciudad }}"
                                    disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="pais">pais</label>
                                <input name="pais" type="tel" class="form-control" value="{{ $ubicacion->pais }}"
                                    disabled>
                            </div>

                            @foreach ($departamentos as $departamento)
                                @if ($departamento->id == $ubicacion->id_departamento)
                                    <div class="col-md-3">
                                        <label for="pais">departamento</label>
                                        <input name="pais" type="tel" class="form-control"
                                            value="{{ $departamento->nombre }}" disabled>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                </div>
            </div>
            <br>
            <center>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('activosfijo.index') }}">Volver</a>
                <a href="{{ route('activosfijo.edit', $activofijo->id) }}" class="btn btn-primary btb-sm text-light">
                    Editar </a>
            </center>


        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script>
        const activo = [{
            nombre: "activo",
            precio: 20,
            codigo: "123",
        }];
        const $contenedor = document.querySelector("#contenedor");
        // Por cada producto, crear un SVG y adjuntarlo
        activo.forEach(activo => {
            const elemento = document.createElement("img");
            elemento.dataset.format = "CODE128";
            elemento.dataset.value = activo.codigo;
            elemento.dataset.text = activo.nombre + " " + activo.precio.toFixed(2);
            elemento.classList.add("codigo");
            $contenedor.appendChild(elemento);
        });
        // Al final, inicializamos
        JsBarcode(".codigo").init();
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categoria').DataTable();
        });
    </script>
@stop
