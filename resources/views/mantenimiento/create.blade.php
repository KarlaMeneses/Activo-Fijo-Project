@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Registrar Mantenimiento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('mantenimientos.store') }}" method="post" >
                @csrf

                

                <div class="row">
                    <div class="col-md-6" style="padding-bottom: 1rem">
                        <label for="fecha_ini">Fecha de Inicio</label>
                        <input type="date" name="fecha_ini" class="form-control" required> 
                    </div>
                    {{-- <div class="col-md-4">
                        <label for="fecha_fin">Fecha de Finalización</label>
                        <input type="date" name="fecha_fin" class="form-control" required> 
                    </div> --}}
                    <div class="col-md-6">
                        <label for="fecha_aprox">Fecha Apróximada de Finalización</label>
                        <input type="date" name="fecha_aprox" class="form-control" required> 
                    </div>
                </div>
              
                <div class="row">

                    <div class="col-md-6" style="padding-bottom: 1rem">
                        <label for="id_activo">Activo Fijo para Mantenimiento</label>
                        <select name="id_activo" class=" form-control">
                            @foreach ($activos as $activo)
                                <option value={{ $activo->id }}>{{ $activo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="problema">Descripción del Mantenimiento</label>
                        <input type="text" name="problema" class="form-control" required>
                    </div>
                    
                </div>
            
                <div class="row">
                    <div class="col-md-6">
                        <label for="proveedor">Proveedor</label>
                        <input type="text" name="proveedor" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tiempo">Días Esperados</label>
                        <input type="text" name="tiempo" class="form-control" required>
                    </div>
                </div>

                
                <br>
                <button class="btn btn-danger btn-sm" type="submit">Registrar</button>
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
