@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Editar Departamento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('departamentos.update', $depa->id) }}" method="post" novalidate>
                @csrf
                @method('put')

                <label for="nombre">Ingrese el nombre del Departamento</label>
                <input type="text" name="nombre" class="form-control" value="{{ $depa->nombre }}" placeholder="Escriba el nombre del departamento"> <br>
                @error('nombre')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                @enderror

                <label for="descripcion">Ingresar Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="{{ $depa->descripcion }}" placeholder="Escriba una descripción del departamento"> <br>
                @error('descripcion')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                @enderror


                <button class="btn btn-primary btb-sm text-light" type="submit">Actualizar Departamento</button>
                <a class="btn btn-warning btb-sm text-light" href="{{ route('departamentos.index') }}">Volver</a>

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
