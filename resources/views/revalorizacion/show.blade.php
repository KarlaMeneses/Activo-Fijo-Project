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
                        <h2 class="font-weight-bold px-2">Información de la Revalorizacion</h2>
                    </center>
                </div>
            </div>
            <div class="row">

                <div class="form-row">

                    @foreach ($activosfijo as $activo)
                        @if ($activo->id == $revalorizacion->id_activo)
                            <div class="form-group col-md-6">
                                <label for="codigo">CODIGO</label>
                                <input type="text" name="codigo" class="form-control" value="{{ $activo->codigo }}"
                                    disabled>

                            </div>

                            <div class="form-group col-md-6">
                                <label for="nombre">DESCRIPCION</label>
                                <input type="text" name="nombre" class="form-control" value="{{ $activo->detalle }}"
                                    id="nombre" disabled>

                            </div>

                            <div class="form-group col-md-6">
                                <label for="nombre">COSTO ACTUAL</label>
                                <input type="text" name="nombre" class="form-control" value="{{ $activo->costo }}"
                                    id="nombre" disabled>

                            </div>

                            <div class="col-md-3">
                                <label for="fecha_ingreso">FECHA DE INGRESO DEL ACTIVO</label>
                                <input name="fecha_ingreso" type="tel" class="form-control"
                                    value="{{ $activo->fecha_ingreso }}" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="estado">ESTADO</label>
                                <input type="tel" name="estado" class="form-control" value="{{ $activo->estado }}" disabled>

                            </div>
                        @endif
                    @endforeach

                    <div class="form-group col-md-6">
                        <label for="nombre">TIEMPO DE VIDA ESTIMADO</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $revalorizacion->tiempo_vida }}" id="nombre" disabled>

                    </div>

                    <div class="form-group col-md-6">
                        <label for="descripcion">COSTO ESTIMADO</label>
                        <input type="text" name="descripcion" class="form-control" value="{{ $revalorizacion->valor }}" id="descripcion" disabled>
                    </div>


                </div>







            </div>


            <br>


            <center>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('revalorizacion.index') }}">Volver</a>
                <a href="{{ route('revalorizacion.edit', $revalorizacion->id) }}"
                    class="btn btn-primary btb-sm text-light">
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
