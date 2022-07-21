@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Crear Departamento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('departamentos.store') }}" method="post" novalidate>
                @csrf
                   <div class="form-group col-md-6">
                <label for="nombre">Ingrese el nombre del Departamento</label>
                <input type="text" name="nombre" class="form-control" placeholder="Escriba el nombre del departamento"> <br>
                @error('nombre')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                @enderror

                <label for="descripcion">Ingresar Descripción</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Escriba una descripción del departamento"> <br>
                @error('descripcion')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                @enderror
                   </div>

                <button class="btn btn-primary btb-sm text-light" type="submit">Crear Departamento</button>
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
