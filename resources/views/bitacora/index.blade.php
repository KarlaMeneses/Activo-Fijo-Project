@extends('adminlte::page')

@section('title', 'Bitacora')

@section('content_header')
    {{-- <h1>Bitacora</h1> --}}
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h2><b>Registro de Bitacora</b>
                <h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="container">
                <div class="img-factura row ">
                    <div class="col">
                        <figure>
                            <img src={{ asset('img/logo.png') }} class="figure-img img-fluid rounded"
                                alt="A generic square placeholder image with rounded corners in a figure." width="130"
                                height="120" />
                        </figure>

                    </div>
                    <div class="col">
                        <figcaption class="figure-caption ">
                            <h5><i class="fa fa-building-o pr-1" aria-hidden="true"></i>Empresa: ACTIVO FIJO CORP. </h5>
                            <h5><i class="fa fa-building-o pr-1" aria-hidden="true"></i>Nit :2995623</h5>
                            <h5><i class="fa fa-phone pr-1" aria-hidden="true"></i>Telf : (+591) 62152145</h5>
                            <h5><i class="fa fa-envelope-o pr-1" aria-hidden="true"></i> evilcord@gmail.com</h5>
                        </figcaption>
                    </div>
                </div>
            </div>
            <table class="table table-striped" id="bitacora" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Autor ID</th>
                        <th scope="col">Apartado</th>
                        <th scope="col">Acción</th>
                        {{-- <th scope="col">subject type</th> --}}
                        <th scope="col">ID Implicado</th>
                        {{-- <th scope="col">causer type</th> --}}
                        <th scope="col">Fecha</th>
                        {{-- <th scope="col">properties</th> --}}
                    </tr>
                </thead>

                <tbody>
                    @foreach ($actividades as $actividad)
                        <tr>
                            <td>{{ $actividad->id }}</td>
                            <td>{{ $actividad->name }}</td>
                            <td>{{ $actividad->causer_id }}</td>
                            <td>{{ $actividad->log_name }}</td>
                            <td>{{ $actividad->description }}</td>
                            <td>{{ $actividad->subject_id }}</td>
                            <td>{{ $actividad->created_at }}</td>
                            {{-- <td>{{$actividad->properties}}</td>
                            <td>{{$actividad->causer_type}}</td>
                            <td>{{$actividad->subject_type}}</td> --}}

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
            $('#bitacora').DataTable();
        });
    </script>
@stop
