@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <div class="card-header text-center">
        <h3><b>Mantenimientos</b></h3>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('mantenimientos.create') }}" class="btn btn-primary btb-sm">
                <i class="fas fa-wrench"></i> Registrar Mantenimiento</a>
            <a href="{{ route('mantenimiento.reporte_vista') }}" class="btn btn-primary btb-sm">
                <i class="fas fa-wrench"></i> Reporte</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body " style="overflow-x: scroll">

            <table class="table table-striped shadow-lg mt-4" id="roles" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Activo Fijo</th>
                        <th scope="col">Problema</th>
                        <th scope="col">Proveedor</th>
                        {{-- <th scope="col">Costo</th>
                        <th scope="col">Duración</th> --}}
                        <th scope="col">Fecha de Inicio</th>
                        <th scope="col">Fecha de Fin</th>
                        <th scope="col">Estado</th>
                        {{-- <th scope="col">Solución</th> --}}
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($mantes as $mante)
                        <tr>
                            <td>{{ $mante->id }}</td>

                            @foreach ($activos as $activo)
                                @if ($mante->id_activo == $activo->id)
                                    <td>{{ $activo->nombre }}</td>
                                @endif
                            @endforeach

                            <td>{{ $mante->problema }}</td>
                            <td>{{ $mante->proveedor }}</td>
                            {{-- <td>{{ $mante->costo }}</td>
                            <td>{{ $mante->duracion }}</td> --}}
                            <td>{{ $mante->fecha_ini }}</td>
                            <td>{{ $mante->fecha_fin }}</td>
                            <td>{{ $mante->estado }}</td>
                            {{-- <td>{{ $mante->solucion }}</td> --}}

                            <td>


                                <form action="{{ route('mantenimientos.destroy', $mante->id) }}" method="post">
                                    <a href="{{ route('mantenimientos.edit', $mante->id) }}"
                                        class="btn btn-primary btn-sm text-light rounded-pill">
                                        <i class="fas fa-edit"></i></a>

                                    <a class="btn btn-warning btn-sm text-light rounded-pill"
                                        href="{{ route('mantenimientos.show', $mante->id) }}">
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
    </div>

@stop

@section('css')
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
