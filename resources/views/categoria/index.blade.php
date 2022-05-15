@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')

    <div class="card-header  text-center">
        <h3><b>Lista Categorias</b></h3>
    </div>

@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('categorias.create') }}">
                <i class="fas fa-bookmark"></i> Registrar
                Categoria</a>
        </div>
    </div>

    <div class="card">
        <!--<div class="card-body">-->
        <div class="card-body " style="overflow-x: scroll">

            <!-- <table class="table table-striped" id="usuarios" style="width:100%">-->
            <table class="table table-striped table-bordered shadow-lg mt-4 " id="usuarios" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th>Id</th>
                        <th>Cuenta contable Bienes</th>
                        <th>Descripcion</th>
                        <th>Tipo</th>
                        <th>Cacateristica</th>
                        <th>vida util</th>
                        <th>valor residual(%)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nombre }}</td>
                            <td>{{ $categoria->descripcion }}</td>
                            <td>{{ $categoria->tipo_activo }}</td>
                            <td>{{ $categoria->cacateristica }}</td>
                            <td>{{ $categoria->vida_util }} años</td>
                            <td>{{ $categoria->valor_residual }} %</td>
                            <td>
                                <form action="{{ route('categorias.destroy', $categoria) }}" method="post">
                                    <!--<a class="btn btn-warning btn-sm text-light" href="#">-->
                                    <a class="btn btn-warning btn-sm text-light rounded-pill"
                                        href="{{ route('categorias.show', $categoria->id) }}">
                                        <i class="fas fa-eye"></i></a>

                                    <a href="{{ route('categorias.edit', $categoria) }}"
                                        class="btn btn-primary btn-sm text-light rounded-pill">
                                        <i class="fas fa-edit"></i><a>
                                            @csrf
                                            @method('delete')
                                            @can('editar categoria')
                                            @endcan
                                            <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit"
                                                value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                                <i class="fas fa-trash-alt"></i></button>
                                            @can('eliminar categoria')
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
        $('#categorias').DataTable({
            autoWidth: false
        });
    </script>

@endsection
