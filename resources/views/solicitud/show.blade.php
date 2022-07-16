@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <h1>Actualizar Solicitud</h1>
@stop

@section('content')
    <div class="card">
        {{-- <div class="card-header">
            <a href="{{ route('solicitud.store_act', $soli->id) }}" class="btn btn-primary btb-sm">
                <i class="fas fa-file-alt"></i> Añadir Item </a>
        </div> --}}
        <div class="card-body">
            <form action="{{ route('solicitud.update', $soli->id) }}" method="post" novalidate>
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-md-6">
                        <label for="persona_sol"> Persona Solicitante</label>
                        <input type="text" name="persona_sol" value="{{ $soli->persona_sol }}" class="form-control"
                            readonly>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <label for="tipo_soli">Tipo Solicitud</label>
                        <input type="text" name="tipo_soli" value="{{ $soli->tipo_soli }}" class="form-control"
                            readonly> <br>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label for="clasificacion">Clasificación</label>
                        <input type="text" name="clasificacion" value="{{ $soli->clasificacion }}" class="form-control"
                            readonly> <br>
                    </div>
                    <div class="col-md-6">
                        <label for="concepto">Concepto</label>
                        <input type="text" name="concepto" value="{{ $soli->concepto }}" class="form-control" readonly>
                        <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="estado">Seleccione el Estado</label>
                        <input type="text" name="estado" value="{{ $soli->estado }}" class="form-control" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" value="{{ $soli->fecha }}" class="form-control" readonly>
                        <br>
                    </div>
                    <div class="col-md-4" id="estado_fin" >
                        <label for="estado_fin">Aprobación Final</label>
                        <select name="estado_fin" class=" form-control" disabled>
                            @if ($soli->estado_fin == 'Aprobado')
                                <option value="Aprobado">Aprobado/option>
                                <option value="No Aprobado">No Aprobado</option>
                            @else
                                <option value="No Aprobado">No Aprobado</option>
                                <option value="Aprobado">Aprobado</option>
                            @endif

                        </select> <br>
                    </div>
                </div>




                <br>

                <center>
                    <a class="btn btn-warning btb-sm text-light" href="{{ route('solicitud.index') }}">Volver</a>
                </center>


            </form>

            <table class="table table-striped shadow-lg mt-4" id="roles" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Item</th>
                        <th scope="col">Unidad</th>
                        <th scope="col">Cantidad</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($soli_acts as $soli_act)
                        @if ($soli_act->id_sol == $soli->id)
                            <tr>
                                <td>{{ $soli_act->id }}</td>
                                <td>{{ $soli_act->item }}</td>
                                <td>{{ $soli_act->unidad }}</td>
                                <td>{{ $soli_act->cantidad }}</td>


                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>


            <df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7"
                language-code="es">
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
