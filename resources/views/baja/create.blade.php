@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
   

    <div class="card-header  text-center">
        <h3><b>Registrar Baja</b></h3>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subir.css') }}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @error('name')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Esta baja ya está registrada.
                </div>
            @enderror
            <form action="{{ route('baja.store') }}" method="post">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="causadebaja">Causa</label>
                        <input type="text" name="causadebaja" class="form-control" required>
        
                        <label for="comprador">Seleccionar el Activo</label>
                        <select name="idactivo" id="select-room" class="form-control" onchange="habilitar()" >
                            <option value="nulo">Activos</option>

                            @foreach ($activos as $activo)

                                <option value="{{$activo->id}}">

                                   <spam>{{$activo->id}}. {{$activo->nombre}} {{$activo->detalle}}</spam>

                                </option>

                            @endforeach
                        </select>

                       
                        <input type="hidden" name="fechasolicitada" value="{{ \Carbon\Carbon::now() }}" class="form-control" required>

                        <input type="hidden" name="estado" value="En espera" class="form-control" required>

                   



                    </div>
            
            <br>

            <center>
                <button class="btn btn-primary btb-sm text-light" type="submit">Crear Baja</button>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('baja.index') }}">Volver</a>
            </center>
        </form>

    </div>
</div>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
