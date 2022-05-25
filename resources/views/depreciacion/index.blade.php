@extends('adminlte::page')
@section('title', 'Activo Fijo')

@section('content_header')

    <div class="card-header  text-center">
        <h3><b>DS 24051 Reglamento del IUE Depreciación</b></h3>
    </div>

@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('depreciaciones.create') }}">
                <i class="fas fa-bookmark"></i> Registrar
                Depreciación</a>


        </div>
    </div>

    <div class="card">
        <span class="text-primary">
DECRETO SUPREMO Nº 24051
REGLAMENTO AL IMPUESTO A LAS UTILIDADE,
dispone que los bienes del activo fijo 
comenzarán a depreciarse impositivamente 
desde el momento en que se inicie su utilización y uso, para lo cual se entiende ya
debieron estar previamente registrados o activados”.
        </span>
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

                    @foreach ($depres as $depre)
                        <tr>
                            <td>{{ $depre->id }}</td>
                            <td>{{ $depre->nombre }}</td>
                            <td>{{ $depre->descripcion }}</td>
                            <td>{{ $depre->tipo_activo }}</td>
                            <td>{{ $depre->cacateristica }}</td>
                            <td>{{ $depre->vida_util }} años</td>
                            <td>{{ $depre->valor_residual }} %</td>
                            <td>
                                <form action="{{ route('depreciaciones.destroy', $depre) }}" method="post">
                                    <!--<a class="btn btn-warning btn-sm text-light" href="#">-->
                                    <a class="btn btn-warning btn-sm text-light rounded-pill"
                                        href="{{ route('depreciaciones.show', $depre->id) }}">
                                        <i class="fas fa-eye"></i></a>

                                    <a href="{{ route('depreciaciones.edit', $depre) }}"
                                        class="btn btn-primary btn-sm text-light rounded-pill">
                                        <i class="fas fa-edit"></i><a>
                                            @csrf
                                            @method('delete')
                                            @can('editar depreciacion')
                                            @endcan
                                            <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit"
                                                value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                                <i class="fas fa-trash-alt"></i></button>
                                            @can('eliminar depreciacion')
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
