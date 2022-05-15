@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Registrar Categoria</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            @error('nombre')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> Esta categoria ya está registrada.
                </div>
            @enderror
            <form method="post" action="{{ route('categorias.store') }}">
                @csrf

                <h5>Grupo:</h5>
                <input type="text" name="nombre" class="focus border-primary  form-control" required>
                <h5>Descripcion:</h5>
                <input type="text" name="descripcion" class="focus border-primary  form-control" required>
                <h5>Tipo Activo:</h5>
                <input type="text" name="tipo_activo" class="focus border-primary  form-control" required>



                <br>
                <button class="btn btn-primary" type="submit">Registrar</button>
                <a class="btn btn-danger" href="{{ route('categorias.index') }}">Volver</a>
            </form>

        </div>
    </div>
@stop
