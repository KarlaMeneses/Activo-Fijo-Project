@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <h1>Editar Mantenimiento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('mantenimientos.update', $mante->id) }}" method="post" >
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-md-6">
                        <label for="fecha_ini">Ingrese Fecha de Inicio</label>
                        <input type="date" name="fecha_ini" class="form-control" value="{{$mante->fecha_ini}}" required> 
                    </div>
                    <div class="col-md-6">
                        <label for="fecha_fin">Ingrese Fecha de Finalización</label>
                        <input type="date" name="fecha_fin" class="form-control" value="{{$mante->fecha_fin}}" required> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="problema">Ingrese la Descripción del Mantenimiento</label>
                        <input type="text" name="problema" class="form-control" value="{{$mante->problema}}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="estado">Seleccione el Estado</label>
                        <select name="estado" class=" form-control">
                                                                                                 
                                @if ($mante->estado == 'En Proceso')
                                <option value="En Proceso">En Proceso</option>
                                <option value="Finalizado">Finalizado</option>
                                @else
                                <option value="Finalizado">Finalizado</option>
                                <option value="En Proceso">En Proceso</option>
                                @endif
                            
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="solucion">Ingresar Solución</label>
                        <input type="text" name="solucion" class="form-control"value="{{$mante->solucion}}" required> 
                    </div>
                    <div class="col-md-6">
                        <label for="costo">Ingrese el Costo</label>
                        <input type="number" name="costo" class="form-control" value="{{$mante->costo}}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="id_activo">Seleccione el Activo Fijo para Mantenimiento</label>
                        <select name="id_activo" class=" form-control">
                            @foreach ($activos as $activo)
                                @if($mante->id_activo == $activo->id)
                                <option value="{{ $activo->id }}">{{ $activo->detalle }}</option>
                                @endif
                            @endforeach
                            @foreach ($activos as $activo)
                                @if(!($mante->id_activo == $activo->id))
                                <option value="{{ $activo->id }}">{{ $activo->detalle }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <br>
                <button class="btn btn-danger btn-sm" type="submit">Actualizar</button>
                <a class="btn btn-primary btn-sm" href="{{ route('mantenimientos.index') }}">Volver</a>
            </form>

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
