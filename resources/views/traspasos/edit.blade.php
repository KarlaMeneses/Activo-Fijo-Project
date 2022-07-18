@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <h1>Actualización de Traspaso</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('traspasos.update', $tras->id) }}" method="post" novalidate>
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-md-12">
                        <label for="anterior">Nombre de Anterior Responsable</label>
                        <input type="text" name="anterior" value="{{ $tras->anterior }}"class="form-control" disabled>
                        <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="nuevo">Nombre de Nuevo Responsable</label>
                        <input type="text" name="nuevo" value="{{ $tras->nuevo }}" class="form-control"> <br>
                    </div>

                    <div class="col-md-4">
                        <label for="id_activo">Activos</label>
                        <select name="id_activo" class=" form-control">
                            @foreach ($activos as $activo)
                                @if ($activo->id == $tras->id_activo)
                                    <option value="{{ $activo->id }}">{{ $activo->nombre }}</option>
                                @endif
                            @endforeach
                            @foreach ($activos as $activo)
                                @if ($activo->id != $tras->id_activo)
                                    <option value="{{ $activo->id }}">{{ $activo->nombre }}</option>
                                @endif
                            @endforeach
                        </select> <br>
                    </div>

                    <div class="col-md-4">
                        <label for="fecha">Fecha Asignación</label>
                        <input type="date" name="fecha" value="{{ $tras->fecha }}" class="form-control"> <br>
                    </div>
                </div>

                <div class="row" id="descripcion">
                    <div class="col-md-12">
                        <label for="descripcion">Descripción del Traspaso</label>
                        <textarea name="descripcion" cols="10" rows="10" style="height: 5rem;width: 80rem;resize: none">{{ $tras->descripcion }}</textarea>
                    </div>
                </div>

                <br>

                <center>
                    <button class="btn btn-primary btb-sm text-light" type="submit">Actualizar Traspaso</button>
                    <a class="btn btn-warning btb-sm text-light" href="{{ route('traspasos.index') }}">Volver</a>
                </center>

            </form>

        </div>
    </div>



    </div>
    <df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7" language-code="es">
        </div>


    @stop

    @section('css')
        <link rel="stylesheet" href="{{ asset('css/bot.css') }}">
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @stop

    @section('js')
        <script type="text/javascript">
            console.log('Hi!');

            function hidexd() {
                var status = document.getElementById('estado');
                if (status.value == "Finalizado") {
                    document.getElementById('estado_fin').style.display = 'block';
                    document.getElementById('respuesta_fin').style.display = 'block';
                } else {
                    document.getElementById('estado_fin').style.display = 'none';
                    document.getElementById('respuesta_fin').style.display = 'none';
                }
            }

            /* $('.estado').change(function() {
                var responseID = $(this).val();
                if (responseID == "Finalizado") {
                    document.getElementById('estado_fin').style.display = 'block';
                }
            }) */
        </script>
    @stop
