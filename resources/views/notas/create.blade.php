@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Registrar nota de compra</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @error('name')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Este usuario ya está registrado.
                </div>
            @enderror
            <form action="{{ route('notas.store') }}" method="post">
                @csrf
                <label for="proveedor">proveedor</label>
                <input type="text" name="proveedor" class="form-control"  required>

                <label for="direccion">direccion</label>
                <input type="text" name="direccion" class="form-control"  required>

                <label for="telefono">telefono</label>
                <input type="tel" name="telefono" class="form-control"  required>

                <label for="fecha_entrega">fecha_entrega</label>
                <input type="date" name="fecha_entrega" class="form-control"  required>

                <label for="totales">totales</label>
                <input type="text" name="totales" class="form-control"  required>

                <h5>DETALLE DE LA COMPRA</h5>
                <button class="btn btn-danger btn-sm" type="submit">Crear Nota</button>
                <a class="btn btn-primary btn-sm" href="{{ route('notas.index') }}">Volver</a>
            </form>
        </div>
    </div>
    <script>
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
