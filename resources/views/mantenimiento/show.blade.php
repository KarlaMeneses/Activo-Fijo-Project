@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Editar Mantenimiento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">


            <div class="row">
                <div class="col-md-6">
                    <label for="fecha_ini">Ingrese Fecha de Inicio</label>
                    <input type="date" name="fecha_ini" class="form-control" value="{{ $mante->fecha_ini }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="fecha_fin">Ingrese Fecha de Finalización</label>
                    <input type="date" name="fecha_fin" class="form-control" value="{{ $mante->fecha_fin }}" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="problema">Ingrese la Descripción del Mantenimiento</label>
                    <input type="text" name="problema" class="form-control" value="{{ $mante->problema }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="estado">Seleccione el Estado</label>
                    <input type="text" name="costo" class="form-control" value="{{ $mante->estado }}" readonly>


                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="solucion">Ingresar Solución</label>
                    <input type="text" name="solucion" class="form-control" value="{{ $mante->solucion }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="costo">Ingrese el Costo</label>
                    <input type="number" name="costo" class="form-control" value="{{ $mante->costo }}" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label for="id_activo">Seleccione el Activo Fijo para Mantenimiento</label>

                    @foreach ($activos as $activo)
                        @if ($mante->id_activo == $activo->id)
                            <input type="text" name="costo" class="form-control" value="{{ $activo->nombre }}" readonly>
                        @endif
                    @endforeach

                    </select>
                </div>

            </div>
            <br>
            <a class="btn btn-primary btn-sm" href="{{ route('mantenimientos.index') }}">Volver</a>


        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
