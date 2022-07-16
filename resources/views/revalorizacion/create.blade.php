@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Crear Revalorizacion</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('revalorizacion.store') }}" method="post" novalidate>
                @csrf
                <label for="tiempo_vida">tiempo_vida</label>
                <input type="text" name="tiempo_vida" class="form-control"> <br>
                @error('tiempo_vida')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                @enderror

                <label for="valor">valor</label>
                <input type="text" name="valor" class="form-control"> <br>
                @error('valor')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                @enderror

                <label for="valor">costo</label>
                <input type="decimal" name="monto" class="form-control"> <br>
                @error('monto')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                @enderror

                <label for="id_activo">id_activo</label>
                <input type="text" name="id_activo" class="form-control"> <br>
                @error('id_activo')
                    <small class="text-danger">*{{ $message }}</small>
                    <br><br>
                @enderror

                <button class="btn btn-danger btn-sm" type="submit">Crear Departamento</button>
                <a class="btn btn-primary btn-sm" href="{{ route('revalorizacion.index') }}">Volver</a>
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
