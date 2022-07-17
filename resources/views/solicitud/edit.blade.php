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
                        <input type="text" name="persona_sol" value="{{ $soli->persona_sol }}" class="form-control">
                        <br>
                    </div>
                    {{-- <div class="col-md-6">
                        <label for="tipo_soli">Tipo Solicitud</label>
                        <input type="text" name="tipo_soli" value="{{ $soli->tipo_soli }}" class="form-control"> <br>
                    </div> --}}
                    <div class="col-md-6">
                        <label for="concepto">Concepto</label>
                        <input type="text" name="concepto" value="{{ $soli->concepto }}" class="form-control"> <br>
                    </div>


                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label for="clasificacion">Clasificación</label>
                        <select name="clasificacion" class=" form-control">
                            @if ($soli->clasificacion == 'Urgente')
                                <option value="Urgente">Urgente</option>
                                <option value="No Urgente">No Urgente</option>
                            @else
                                <option value="No Urgente">No Urgente</option>
                                <option value="Urgente">Urgente</option>
                            @endif

                        </select> <br>
                    </div>

                    <div class="col-md-6">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" value="{{ $soli->fecha }}" class="form-control"> <br>
                    </div>



                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="estado">Estado</label>
                        <select name="estado" class=" form-control" onchange="hidexd()" id="estado">

                            @if ($soli->estado == 'En Proceso')
                                <option value="En Proceso">En Proceso</option>
                                @can('Solicitud-Fin')
                                    <option value="Finalizado">Finalizado</option>
                                @endcan
                            @else
                                @can('Solicitud-Fin')
                                    <option value="Finalizado">Finalizado</option>
                                @endcan
                                <option value="En Proceso">En Proceso</option>
                            @endif

                        </select>
                    </div>


                    <div class="col-md-6" id="estado_fin" style="display: none">
                        <label for="estado_fin">Aprobación</label>
                        <select name="estado_fin" class=" form-control">
                            @if ($soli->estado_fin == 'Aprobado')
                                <option value="Aprobado">Aprobado</option>
                                <option value="No Aprobado">No Aprobado</option>
                            @else
                                <option value="No Aprobado">No Aprobado</option>
                                <option value="Aprobado">Aprobado</option>
                            @endif

                        </select> <br>
                    </div>
                </div>

                

                <div class="row" id="respuesta_fin" style="display: none">
                    <div class="col-md-12">
                        <label for="respuesta_fin">Respuesta Solicitud</label>
                        <textarea name="respuesta_fin" cols="10" rows="10" style="height: 5rem;width: 80rem;resize: none">{{ $soli->respuesta_fin }}</textarea>
                    </div>
                </div>

                <br>

                <center>
                    <button class="btn btn-primary btb-sm text-light" type="submit">Actualizar Solicitud</button>
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
                        <th scope="col">Acciones</th>
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
                                <td>
                                    <center>
                                        <form action="{{ route('solicitud.destroy_act', $soli_act->id) }}"
                                            method="post">

                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit"
                                                value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                                <i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </center>

                                </td>

                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <br>
            <div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    Agregar Item
                </button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"> Agregar Item </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>

                            <form action="{{ route('solicitud.store_act', $soli->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="cantidad">Item:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="item" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="detalle">Unidad:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="unidad" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="precio_uni">Cantidad</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="cantidad" class="form-control" required>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Agregar Item</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                </d>

            </div>
            <df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7"
                language-code="es">
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
