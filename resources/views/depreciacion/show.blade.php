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
                <div class="card-body">

                    <div class="row">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombre">NOMBRE DE CUENTA CONTABLE</label>
                                <input type="text" name="name" class="form-control" value="{{ $depres->nombre }}"
                                    disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="descripcion">DESCRIPCIÓN DE LA CUENTA</label>
                                <input type="text" name="descripcion" class="form-control"
                                    value="{{ $depres->descripcion }}" disabled>
                            </div>

                            <div class="col-md-4">
                                <label for="tipo_activo">TIPO DE CUENTA</label>
                                <input name="tipo_activo" type="tel" class="form-control"
                                    value="{{ $depres->tipo_activo }}" disabled>
                            </div>

                            <div class="col-md-4">
                                <label for="vida_util">VIDA UTIL (AÑOS)</label>
                                <input name="vida_util" type="tel" class="form-control"
                                    value="{{ $depres->vida_util }}" disabled>
                            </div>

                            <div class="col-md-4">
                                <label for="valor_residual">VALOR RESIDUAL %</label>
                                <input type="tel" name="valor_residual" class="form-control"
                                    value="{{ $depres->vida_util }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <center>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('depreciaciones.index') }}">Volver</a>
                <a href="{{ route('depreciaciones.edit', $depres->id) }}" class="btn btn-primary btb-sm text-light">
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
