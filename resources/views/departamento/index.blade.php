@extends('adminlte::page')

@section('title', 'Activo Fijo')

@section('content_header')
    <div class="card-header text-center">
        <h3><b>Departamentos</b></h3>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('departamentos.create') }}" class="btn btn-primary btb-sm">
                <i class="fas fa-address-book"></i> Crear Departamento</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body " style="overflow-x: scroll">

            <table class="table table-striped shadow-lg mt-4" id="roles" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($depas as $depa)
                        <tr>
                            <td>{{ $depa->id }}</td>
                            <td>{{ $depa->nombre }}</td>
                            <td>{{ $depa->descripcion }}</td>

                            <td>
                                <form action="{{ route('departamentos.destroy', $depa->id) }}" method="post">
                                <a href="{{ route('departamentos.edit', $depa->id) }}" class="btn btn-primary btn-sm text-light rounded-pill">
                                    <i class="fas fa-edit"></i><a>
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
