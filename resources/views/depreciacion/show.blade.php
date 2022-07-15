@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
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
                        <h2 class="font-weight-bold px-2">Información de la Depreciación</h2>
                    </center>
                </div>
            </div>
            <div class="card">
                <div class="card-body" style="background-color: #00AA9E;">
                    <div class="row">
                        <div class="form-row">
                            <div class="card-header form-group col-md-12">
                                <h5 class="font-weight-bold px-2">DATOS DEL ACTIVO</h5>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="codigo">Codigo De Activo</label>
                                <input type="text" name="codigo" class="form-control" value="{{ $activofijo->codigo }}" disabled>

                            </div>

                            <div class="form-group col-md-6">
                                <label for="detalle">Nombre Del Activo</label>
                                <input type="text" name="detalle" class="form-control" value="{{ $activofijo->nombre }}" disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="detalle">Descripcion Del Activo</label>
                                <input type="text" name="detalle" class="form-control" value="{{ $activofijo->detalle }}" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="costo">Tipo De Activo</label>
                                <input name="costo" type="tel" class="form-control" value="{{ $activofijo->tipo }}" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="fecha_ingreso">Fecha Ingreso</label>
                                <input name="fecha_ingreso" type="tel" class="form-control" value="{{ $activofijo->fecha_ingreso }}" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="costo">Costo Activo</label>
                                <input name="costo" type="tel" class="form-control" value="{{ $activofijo->costo }}" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="estado">Estado</label>
                                <input type="tel" name="estado" class="form-control" value="{{ $activofijo->estado }}" disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="detalle">Proveedor Del Activo</label>
                                <input type="text" name="detalle" class="form-control" value="{{ $activofijo->proveedor }}" disabled>
                            </div>

                            <div class="col-md-3">
                                <label>Responsable</label>
                                <input class="form-control" value="{{ $activofijo->responsable }}" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="d_anual">Depreciacion anual</label>
                                <input type="text" name="d_anual" class="form-control" value="{{ $activofijo->d_anual }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <br>
            <center>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('depreciaciones.index') }}">Volver</a>
                <a href="{{ route('depreciaciones.edit', $activofijo->id) }}" class="btn btn-primary btb-sm text-light">
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categoria').DataTable();
        });
    </script>
@stop
