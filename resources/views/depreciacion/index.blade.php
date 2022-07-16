@extends('adminlte::page')
@section('title', 'Activo Fijo')

@section('content_header')
    <div class="card-header  text-center">
        <h3><b>DS 24051 Reglamento del IUE Depreciación</b></h3>
    </div>
@stop

@section('content')

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
                        <th scope="col">FOTO</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">COSTO</th>
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
                            <td>

                                <a href="{{ route('depreciaciones.show', $activo->id) }}"
                                    class="btn btn-warning btn-sm text-light rounded-pill"><i class="fas fa-eye"></i><a>
                                        <a href="{{ route('depreciaciones.edit', $activo) }}"
                                            class="btn btn-primary btn-sm text-light rounded-pill"><i
                                                class="fas fa-edit"></i><a>
                                                @can('editar activo fijo')
                                                @endcan



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
