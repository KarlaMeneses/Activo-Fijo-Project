@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <h1>Reporte Mantenimiento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('mantenimiento.reporte') }}" method="post" >
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label for="fecha_ini">Ingrese Parametro Fecha Inicial</label>
                        <input type="date" name="inicio" class="form-control" required> 
                    </div>
                    <div class="col-md-6">
                        <label for="fecha_fin">Ingrese Parametro Fecha Final</label>
                        <input type="date" name="fin" class="form-control" required> 
                    </div>
                </div>

                

                
                <br>
                <button class="btn btn-danger btn-sm" type="submit">Descargar PDF</button>
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
