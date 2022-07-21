@extends('adminlte::page')
@section('title', 'Activo Fijo')


@section('content_header')
    <div class="card-header  text-center">
        <h3><b>ACTIVO FIJO</b></h3>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('activosfijo.create') }}" class="btn btn-primary btb-sm">Crear Activo fijo</a>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
                Reporte
            </button>
        </div>

    </div>



    <div class="card">
        <!--<div class="card-body">-->
        <div class="card-body " style="overflow-x: scroll">
            <table class="table table-striped" id="activo" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">FOTO</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">CATEGORIA</th>
                        <th scope="col">COSTO</th>
                        <th scope="col">PROVEEDOR</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">ACCIONES</th>
                        <th scope="col">REPORTE</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($activosfijo as $activo)
                        <tr>
                            <td>{{ $activo->id }}</td>
                            <td><img src="{{ asset($activo->foto) }}" width="100" height="80" />
                            <td style="width: 15rem">{{ $activo->nombre }}</td>
                            @foreach ($categorias as $cate)
                                @if ($cate->id == $activo->id_categoria)
                                    <td>{{ $cate->nombre }} </td>
                                @endif
                            @endforeach

                            <td>{{ $activo->costo }} Bs</td>
                            <td>{{ $activo->proveedor }}</td>
                            <td>
                                @if ($activo->estado == 'Activo')
                                    <span class="badge rounded-pill bg-success">{{ $activo->estado }}</span>
                                @else
                                    @if ($activo->estado == 'No activo')
                                        <span class="badge rounded-pill bg-danger">{{ $activo->estado }}</span>
                                    @else
                                        @if ($activo->estado == 'En mantenimiento')
                                            <span class="badge rounded-pill bg-warning">{{ $activo->estado }}</span>
                                        @else
                                            <span>{{ $activo->estado }}</span>
                                        @endif
                                    @endif
                                @endif
                            </td>

                            <td>
                                <form action="{{ route('activosfijo.destroy', $activo) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('activosfijo.show', $activo->id) }}"
                                        class="btn btn-warning btn-sm text-light rounded-pill"><i class="fas fa-eye"></i><a>



                                        </a>
                                        <a href="{{ route('activosfijo.edit', $activo) }}"
                                            class="btn btn-primary btn-sm text-light rounded-pill"><i
                                                class="fas fa-edit"></i><a>
                                                @can('editar activo fijo')
                                                @endcan
                                                <button class="btn btn-danger btn-sm text-light rounded-pill"
                                                    onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar"><i
                                                        class="fas fa-trash-alt"></i></button>
                                                @can('eliminar activo fijo')
                                                @endcan
                                </form>
                                <form action="{{ route('activosfijo.idactivo') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id_activo" class="form-control"
                                        value="{{ $activo->id }}"> <br>
                                    <button class="btn btn-danger btn-sm text-light rounded-pill"
                                        type="submit">Revalorizacion</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('activosfijo.show', $activo->id) }}"
                                    class="btn btn-warning btn-sm text-light rounded-pill" data-toggle="modal"
                                    data-target="#myModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                                    </svg>
                            </td>
                        </tr>



                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel"> Generar Reporte</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    </div>

                                    <form action="{{ route('activosfijo.reporte', $activo->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">



                                            <div class="form-group">
                                                <label for="fin">Seleccione los Atributos para el reporte</label>
                                                <br>
                                                <div class="checkbox">
                                                    <input type="checkbox" name="activo" value="true"> Datos del Activo
                                                    <br>
                                                    <input type="checkbox" name="ubicacion" value="true"> Ubicación <br>
                                                    <input type="checkbox" name="categoria" value="true"> Cateoría <br>
                                                    <input type="checkbox" name="responsable" value="true"> Responsable
                                                    <br>

                                                </div>
                                            </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Reporte</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7" language-code="es">
    </df-messenger>

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> Generar Reporte</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>

                <form action="{{ route('activosfijo.reportedina') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="codigo">Fecha de Inicio</label>
                            <div class="col-sm-10">
                                <input type="date" name="inicio" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fin">Fecha de Fin</label>
                            <div class="col-sm-10">
                                <input type="date" name="fin" class="form-control" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="fin">Seleccione los Atributos para el reporte</label>
                            <br>
                            <div class="checkbox">
                                <input type="checkbox" name="codigo" value="true"> Codigo <br>
                                <input type="checkbox" name="nombre" value="true"> Nombre <br>
                                <input type="checkbox" name="descripcio" value="true"> Descripcion <br>
                                <input type="checkbox" name="proveedor" value="true"> Proveedor <br>
                                <input type="checkbox" name="fechaingreso" value="true"> Fecha de Ingreso <br>
                                <input type="checkbox" name="costo" value="true"> Costo <br>
                                <input type="checkbox" name="valoractual" value="true"> Valos Actual <br>
                                <input type="checkbox" name="responsable" value="true"> Responsable <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fin">Seleccione el formato</label>
                            <br>
                            <div class="checkbox">
                                <select name="tipo" id="">
                                    <option value="pdf">PDF</option>
                                    <option value="excel">EXCEL</option>
                                    <option value="html">HTML</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Reporte</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bot.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#activo').DataTable();
        });
    </script>
@stop
