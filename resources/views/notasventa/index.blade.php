@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <h1>Nota de compra</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('notasventa.create') }}" class="btn btn-primary btb-sm">Crear nota de compra</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped" id="notas" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Adquirente</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Fecha de venta</th>
                        <th scope="col">Encargado</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Totales</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($notas as $nota)
                        @if ($nota->tipo == 'venta')
                            <tr>
                                <td>{{ $nota->adquirente }}</td>
                                <td>{{ $nota->telefono }}</td>
                                <td>{{ $nota->fecha_venta }}</td>
                                <td>{{ $nota->encargado }}</td>
                                <td>{{ $nota->cargo }}</td>
                                <td>{{ $nota->totales }}</td>
                                <td>
                                    <form action="{{ route('notasventa.destroy', $nota) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('notasventa.edit', $nota) }}" class="btn btn-primary btn-sm">Editar<a>
                                                <a href="{{ route('notasventa.show', $nota->id) }}"
                                                    class="btn btn-success btn-sm">Ver<a>

                                                        @can('editar nota')
                                                        @endcan
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')"
                                                            value="Borrar">Eliminar</button>
                                                        @can('eliminar nota')
                                                        @endcan
                                    </form>
                                </td>
                            </tr>
                        @endif
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
            $('#notas').DataTable();
        });
    </script>
@stop
