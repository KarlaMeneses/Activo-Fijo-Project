@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <h1>Crear Solicitud</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('solicitud.store') }}" method="post" novalidate>
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label for="persona_sol"> Persona Solicitante</label>
                        <input type="text" name="persona_sol" class="form-control"> <br>
                    </div>
                    {{-- <div class="col-md-6">
                        <label for="tipo_soli">Tipo Solicitud</label>
                        <input type="text" name="tipo_soli" class="form-control"> <br>
                    </div> --}}

                    <div class="col-md-6">
                        <label for="concepto">Concepto</label>
                        <input type="text" name="concepto" class="form-control"> <br>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <label for="tipo_soli">Clasificación</label>
                        <select name="clasificacion" class=" form-control">
                            <option value="Urgente">Urgente</option>
                            <option value="No Urgente">No Urgente</option>
                        </select>

                        <br>
                    </div>
                    <div class="col-md-4">
                        <label for="estado">Estado</label>
                        <select name="estado" class=" form-control">
                            <option value="En Proceso">En Proceso</option>
                            {{-- <option value="Finalizado">Finalizado</option> --}}
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" class="form-control"> <br>
                    </div>
                    
                </div>

               




                <center>
                    <button class="btn btn-primary btb-sm text-light" type="submit">Crear Solicitud</button>
                    <a class="btn btn-warning btb-sm text-light" href="{{ route('solicitud.index') }}">Volver</a>
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
