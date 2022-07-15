@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')

    <div class="card-header  text-center">
        <h3><b>Editar Datos De Revalorizacion</b></h3>
    </div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop --}}

@section('content')
    <div class="card">
        <div class="card-body">
            @error('nombre')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Esta Revalorizacion ya está registrada.
                </div>
            @enderror


            <form method="post" action="{{ route('revalorizacion.update', $revalorizacion->id) }}" novalidate>
                @csrf
                @method('PUT')


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
                                            <label for="codigo">CODIGO</label>
                                            <input type="text" name="codigo" class="form-control"
                                                value="{{ $activo->codigo }}" disabled>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nombre">DESCRIPCION</label>
                                            <input type="text" name="nombre" class="form-control"
                                                value="{{ $activo->detalle }}" id="nombre" disabled>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nombre">COSTO ACTUAL</label>
                                            <input type="text" name="nombre" class="form-control"
                                                value="{{ $activo->costo }}" id="nombre" disabled>

                                        </div>

                                        <div class="col-md-3">
                                            <label for="fecha_ingreso">FECHA DE INGRESO DEL ACTIVO</label>
                                            <input name="fecha_ingreso" type="tel" class="form-control"
                                                value="{{ $activo->fecha_ingreso }}" disabled>
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
                                    <h5 class="font-weight-bold px-2">DATOS DE REVALORIZACION</h5>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="valor">VALOR REVALUO</label>
                                    <input type="text" name="valor" class="form-control"
                                        value="{{ $revalorizacion->valor }}" id="valor" >
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="tiempo_vida">VIDA UTIL</label>
                                    <input type="text" name="tiempo_vida" class="form-control"
                                        value="{{ $revalorizacion->tiempo_vida }}" id="tiempo_vida" >

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="estado">ESTADO</label>
                                    <select name="estado" class="form-control">
                                        @if ($revalorizacion->estado == 'Aprobado')
                                            <option selected value> {{ $revalorizacion->estado }}</option>
                                            <option value="En espera">En espera</option>
                                        @else
                                            <option selected value> {{ $revalorizacion->estado }}</option>
                                            <option value="Aprobado">Aprobado</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <center>
                    {{-- el admi solo puede aprobar o rechazar
                        <button class="btn btn-primary btb-sm text-light" type="submit">Rechazar</button>
                        <button class="btn btn-primary btb-sm text-light" type="submit">Aprobar</button> --}}
                    <button class="btn btn-primary btb-sm text-light" type="submit">Guardar</button>
                    <a class="btn btn-warning btb-sm text-light" href="{{ route('revalorizacion.index') }}">Volver</a>
                </center>

            </form>
        </div>
    </div>
@stop
