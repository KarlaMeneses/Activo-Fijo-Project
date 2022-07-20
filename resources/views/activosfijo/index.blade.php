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
                        <th scope="col">COSTO</th>
                        <th scope="col">PROVEEDOR</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($activosfijo as $activo)
                        <tr>
                            <td>{{ $activo->id }}</td>
                            <td><img src="{{ asset($activo->foto) }}" width="100" height="80" />
                            <td>{{ $activo->nombre }}</td>
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
                                            <a href="{{ route('activosfijo.edit', $activo) }}"
                                                class="btn btn-primary btn-sm text-light rounded-pill"><i
                                                    class="fas fa-edit"></i><a>
                                                    @can('editar activo fijo')
                                                    @endcan
                                                    <button class="btn btn-danger btn-sm text-light rounded-pill"
                                                        onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')"
                                                        value="Borrar"><i class="fas fa-trash-alt"></i></button>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7" language-code="es">
    </df-messenger>
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
