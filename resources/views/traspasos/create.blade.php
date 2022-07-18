@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <h1>Registrar Traspaso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('traspasos.store') }}" method="post" novalidate>
                @csrf



                <div class="row">
                    <div class="col-md-4">
                        <label for="nuevo">Nombre de Nuevo Responsable</label>
                        <input type="text" name="nuevo" class="form-control"> <br>
                    </div>

                    <div class="col-md-4">
                        <label for="id_activo">Activos</label>
                        <select name="id_activo" class=" form-control">
                            @foreach ($activos as $activo)
                                <option value="{{ $activo->id }}">{{ $activo->nombre }}</option>
                            @endforeach
                        </select> <br>
                    </div>

                    <div class="col-md-4">
                        <label for="fecha">Fecha Asignación</label>
                        <input type="date" name="fecha" class="form-control"> <br>
                    </div>
                </div>

                <div class="row" id="descripcion">
                    <div class="col-md-12">
                        <label for="descripcion">Descripción del Traspaso</label>
                        <textarea name="descripcion" cols="10" rows="10" style="height: 5rem;width: 80rem;resize: none"></textarea>
                    </div>
                </div>

                <br>

                <center>
                    <button class="btn btn-primary btb-sm text-light" type="submit">Registrar Traspaso</button>
                    <a class="btn btn-warning btb-sm text-light" href="{{ route('traspasos.index') }}">Volver</a>
                </center>


            </form>

        </div>
        <df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7" language-code="es">
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bot.css') }}">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
