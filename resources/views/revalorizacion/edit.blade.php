@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')

    <div class="card-header  text-center">
        <h3><b>Editar Datos De Depreciación</b></h3>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @error('nombre')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Esta categoria ya está registrada.
                </div>
            @enderror


            <form method="post" action="{{ route('revalorizacion.update', $revalorizacion->id) }}" novalidate>
                @csrf
                @method('PATCH')
                <!--@method('put')-->

                <div class="form-row">

                    @foreach ($activosfijo as $activo)
                        @if ($activo->id == $revalorizacion->id_activo)
                            <div class="form-group col-md-6">
                                <label for="nombre">Activo</label>
                                <input type="text" name="nombre" class="form-control" value="{{ $activo->detalle }}"
                                    id="nombre">

                            </div>

                            <div class="form-group col-md-6">
                                <label for="nombre">Costo Actual</label>
                                <input type="text" name="nombre" class="form-control" value="{{ $activo->costo }}"
                                    id="nombre">

                            </div>
                        @endif
                    @endforeach

                    <div class="form-group col-md-6">
                        <label for="nombre">Tiempo de vida estimado</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $revalorizacion->tiempo_vida }}"
                            id="nombre">

                    </div>

                    <div class="form-group col-md-6">
                        <label for="descripcion">Costo estimado</label>
                        <input type="text" name="descripcion" class="form-control"
                            value="{{ $revalorizacion->valor }}" id="descripcion">
                    </div>

    

                </div>


        </div>


        <br>
        <center>
            {{--el admi solo puede aprobar o rechazar--}}
            <button class="btn btn-primary btb-sm text-light" type="submit">Rechazar</button>
            <button class="btn btn-primary btb-sm text-light" type="submit">Aprobar</button>
            <button class="btn btn-primary btb-sm text-light" type="submit">Guardar</button>
            <a class="btn btn-warning btb-sm text-light" href="{{ route('revalorizacion.index') }}">Volver</a>
        </center>



        </form>
    </div>
    </div>
@stop
