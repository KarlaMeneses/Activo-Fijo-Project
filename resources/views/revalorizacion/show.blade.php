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


            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-row">
                            <div class="card-header form-group col-md-12">
                                <h5 class="font-weight-bold px-2">DATOS DEL ACTIVO FIJO</h5>
                            </div>
                            @foreach ($activosfijo as $activo)
                                @if ($activo->id == $revalorizacion->id_activo)
                                    <div class="form-group col-md-6">
                                        <label for="codigo">CODIGO DE ACTIVO</label>
                                        <input type="text" name="codigo" class="form-control"
                                            value="{{ $activo->codigo }}" disabled>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="detalle">NOMBRE DEL ACTIVO</label>
                                        <input type="text" name="detalle" class="form-control"
                                            value="{{ $activo->nombre }}" disabled>
                                    </div>


                                    <div class="col-md-3">
                                        <label for="costo">TIPO DE ACTIVO</label>
                                        <input name="costo" type="tel" class="form-control"
                                            value="{{ $activo->tipo }}" disabled>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="fecha_ingreso">FECHA DE INGRESO DEL ACTIVO</label>
                                        <input name="fecha_ingreso" type="tel" class="form-control"
                                            value="{{ $activo->fecha_ingreso }}" disabled>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="costo">COSTO ACTUAL</label>
                                        <input name="costo" type="tel" class="form-control"
                                            value="{{ $activo->costo }}" disabled>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="estado">ESTADO</label>
                                        <input type="tel" name="estado" class="form-control"
                                            value="{{ $activo->estado }}" disabled>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-row">
                            <div class="card-header form-group col-md-12">
                                <h5 class="font-weight-bold px-2">DATOS DEL
                                    ACTIVO REVALORIZADO POR EL EXPERTO</h5>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="descripcion">VALOR REVALUO</label>
                                <input type="text" name="descripcion" class="form-control"
                                    value="{{ $revalorizacion->valor }}" id="descripcion" disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="nombre">VIDA UTIL</label>
                                <input type="text" name="nombre" class="form-control"
                                    value="{{ $revalorizacion->tiempo_vida }}" id="nombre" disabled>
        
                            </div>
        
                           
                            <div class="form-group col-md-4">
                                <label for="estado">ESTADO</label>
                                <input type="text" name="estado" class="form-control"
                                    value="{{ $revalorizacion->estado }}" id="descripcion" disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="estado">FECHA SOLICITUD</label>
                                <input type="text" name="estado" class="form-control"
                                    value="{{ $revalorizacion->created_at }}" id="descripcion" disabled>
                            </div>
                        </div>
                        <h3>SUBIR INFORME TECNICO </h3>
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
