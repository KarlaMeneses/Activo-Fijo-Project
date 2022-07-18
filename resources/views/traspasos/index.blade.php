@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <div class="card-header text-center">
        <h3><b>Traspasos</b></h3>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('traspasos.create') }}" class="btn btn-primary btb-sm">
                <i class="fas fa-file-alt"></i> Crear Traspaso</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body " style="overflow-x: scroll">

            <table class="table table-striped shadow-lg mt-4" id="roles" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Anterior</th>
                        <th scope="col">Nuevo</th>

                        <th scope="col">Fecha</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($traspasos as $tras)
                        <tr>
                            
                            <td>{{ $tras->id }}</td>
                            @foreach ($activos as $activo)
                                @if ($activo->id == $tras->id_activo)
                                    <td>{{ $activo->nombre }}</td>
                                    <td><img src="{{ asset($activo->foto) }}" class="img" width="75"
                                            height="75" />
                                @endif
                            @endforeach
                            <td>{{ $tras->anterior }}</td>
                            <td>{{ $tras->nuevo }}</td>
                            <td style="width: 5rem">{{ $tras->fecha }}</td>
                            <td>{{ $tras->descripcion }}</td>

                            <td>
                                <form action="{{ route('traspasos.destroy', $tras->id) }}" method="post">
                                    <a href="{{ route('traspasos.edit', $tras->id) }}"
                                        class="btn btn-primary btn-sm text-light rounded-pill">

                                        <i class="fas fa-edit"></i><a>

                                            {{-- <a class="btn btn-warning btn-sm text-light rounded-pill"
                                                href="{{ route('solicitud.show', $soli->id) }}">
                                                <i class="fas fa-eye"></i></a> --}}
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
