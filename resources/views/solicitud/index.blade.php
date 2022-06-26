@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <div class="card-header text-center">
        <h3><b>Solicitudes</b></h3>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('solicitud.create') }}" class="btn btn-primary btb-sm">
                <i class="fas fa-file-alt"></i> Crear Solicitud</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body " style="overflow-x: scroll">

            <table class="table table-striped shadow-lg mt-4" id="roles" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Solicitante</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($solis as $soli)
                        <tr>
                            <td>{{ $soli->id }}</td>
                            <td>{{ $soli->persona_sol }}</td>
                            <td>{{ $soli->concepto }}</td>
                            <td>{{ $soli->estado }}</td>
                            <td>{{ $soli->fecha }}</td>

                            <td>
                                <form action="{{ route('solicitud.destroy', $soli->id) }}" method="post">
                                    <a href="{{ route('solicitud.edit', $soli->id) }}"
                                        class="btn btn-primary btn-sm text-light rounded-pill">

                                        <i class="fas fa-edit"></i><a>

                                            <a class="btn btn-warning btn-sm text-light rounded-pill"
                                                href="{{ route('solicitud.show', $soli->id) }}">
                                                <i class="fas fa-eye"></i></a>
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit"
                                                value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                                <i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>



                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <df-messenger intent="WELCOME" chat-title="bots" agent-id="86938b5f-1e37-43dc-9f38-1bd5322b1eb7" language-code="es">
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bot.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#roles').DataTable();
        });
    </script>
@stop
