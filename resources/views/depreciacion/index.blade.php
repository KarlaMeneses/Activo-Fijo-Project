@extends('adminlte::page')
@section('title', 'Activo Fijo')

@section('content_header')
    <div class="card-header  text-center">
        <h3><b>DS 24051 Reglamento del IUE Depreciación</b></h3>
    </div>
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
        <div class="card-body">
            <span class="text-primary">
                <h5>
                  
                    <div class="card">
                        <div class="card-body " style="background-color: hsl(0, 0%, 95%);">
                            DECRETO SUPREMO Nº 24051
                            REGLAMENTO AL IMPUESTO A LAS UTILIDADE,
                            dispone que los bienes del activo fijo
                            comenzarán a depreciarse impositivamente
                            desde el momento en que se inicie su utilización y uso, para lo cual se entiende ya
                            debieron estar previamente registrados o activados”.
                           
                            <br>

                            METODO DE DEPRECIACIÓN POR LÍNEA RECTA
                            <br>
                            Depreciacion = (Valor del activo - valor residual) / vida util del activo

                        </div>

                    </div>
                </h5>
            </span>
        </div>

        <!--<div class="card-body">-->
        <div class="card-body " style="overflow-x: scroll">

            <!-- <table class="table table-striped" id="usuarios" style="width:100%">-->
            <table class="table table-striped" id="depreciaciones" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">CUENTA CONTABLE BIENES</th>
                        <th scope="col">DESCRIPCION</th>
                        <th scope="col">TIPO</th>

                        <th scope="col">VIDA UTIL</th>
                        <th scope="col">COEFICIENTE</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($depres as $depre)
                        <tr>
                            <td>{{ $depre->id }}</td>
                            <td>{{ $depre->nombre }}</td>
                            <td>{{ $depre->descripcion }}</td>
                            <td>{{ $depre->tipo_activo }}</td>
                            <td>{{ $depre->vida_util }} años</td>
                            <td>{{ $depre->coeficiente }} %</td>
                            <td>
                                <form action="{{ route('depreciaciones.destroy', $depre) }}" method="post">
                                    <!--<a class="btn btn-warning btn-sm text-light" href="#">
                                        <a class="btn btn-warning btn-sm text-light rounded-pill"
                                            href="{{ route('depreciaciones.show', $depre->id) }}">
                                            <i class="fas fa-eye"></i></a>
    -->
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
        $('#depreciaciones').DataTable({
            autoWidth: false
        });
    </script>

@endsection
