@extends('adminlte::page')

@section('title', 'PROSALUD+')

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
                <label for="unidad">Unidad</label>
                <input type="text" name="unidad" class="form-control" value="{{ old('unidad') }}" required>

                <label for="concepto">Concepto</label>
                <input type="text" name="concepto" class="form-control" value="{{ old('concepto') }}" required>

                <label for="precio_uni">Precio unitario</label>
                <input type="text" name="precio_uni" class="form-control" value="{{ old('precio_uni') }}" required>

    
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
