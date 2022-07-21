@extends('adminlte::page')
@section('title', 'Activo Fijo')

@section('content_header')

    <div class="card-header  text-center">
        <h3><b>Listado de Revalorizacion</b></h3>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop
@section('content')
    {{-- }} NO ES NECESARIO CREARLO
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('revalorizacion.create') }}">
                <i class="fas fa-bookmark"></i> Registrar
                revalorizacion</a>
        </div>
    </div> --}}

    <div class="card">
        <!--<div class="card-body">-->
        <div class="card-body " style="overflow-x: scroll">

            <!-- <table class="table table-striped" id="usuarios" style="width:100%">-->
            <table class="table table-striped table-bordered shadow-lg mt-4 " id="usuarios" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Activo fijo</th>
                        <th>Valor Actual</th>
                        <th>Fecha solicitud</th>
                        <th>Costo Revaluo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($revalorizacion as $revalorizacion)
                        <tr>
                            <td>{{ $revalorizacion->id }}</td>
                            @foreach ($activosfijo as $activo)
                                @if ($activo->id == $revalorizacion->id_activo)
                                    <td>{{ $activo->nombre }}</td>
                                    <td>{{ $activo->v_actual }} Bs</td>
                                @endif
                            @endforeach
                            <td>{{ $revalorizacion->created_at }}</td>
                            <td>{{ $revalorizacion->costo_revaluo }} Bs</td>
                            <td>{{ $revalorizacion->estado }}</td>
                            <td>
                                <form action="{{ route('revalorizacion.destroy', $revalorizacion) }}" method="post">
                                    <!--<a class="btn btn-warning btn-sm text-light" href="#">-->
                                    <a class="btn btn-warning btn-sm text-light rounded-pill"
                                        href="{{ route('revalorizacion.show', $revalorizacion->id) }}">
                                        <i class="fas fa-eye"></i></a>

                                    <a href="{{ route('revalorizacion.edit', $revalorizacion) }}"
                                        class="btn btn-primary btn-sm text-light rounded-pill">
                                        <i class="fas fa-edit"></i><a>
                                            @csrf
                                            @method('delete')
                                            @can('editar revalorizacion')
                                            @endcan
                                            <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit"
                                                value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                                <i class="fas fa-trash-alt"></i></button>
                                            @can('eliminar revalorizacion')
                                            @endcan
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
        $('#revalorizacion').DataTable({
            autoWidth: false
        });
    </script>

@endsection
