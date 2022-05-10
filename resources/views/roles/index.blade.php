@extends('adminlte::page')

@section('title', 'SI-ActivoFijo')

@section('content_header')
    <div class="card-header text-center">
        <h3><b>Roles</b></h3>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('roles.create') }}" class="btn btn-primary btb-sm">
                <i class="fas fa-address-book"></i> Crear Rol</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body " style="overflow-x: scroll">
            <div class="container">
                <div class="img-factura row ">
                    <div class="col">
                        <figure>
                            <img src={{ asset('img/logo.png') }} class="figure-img img-fluid rounded"
                                alt="logo activo fijo." width="120" height="120" />
                        </figure>
                    </div>
                    <div class="col">
                        <figcaption class="figure-caption ">
                            <h5><i class="fa fa-building-o pr-1" aria-hidden="true"></i> Nombre del software</h5>
                            <h5><i class="fa fa-phone pr-1" aria-hidden="true"></i> (+591) 7xxxxxxx</h5>
                            <h5><i class="fa fa-envelope-o pr-1" aria-hidden="true"></i> activofijo@gmail.com</h5>
                        </figcaption>
                    </div>
                </div>
            </div>
            <table class="table table-striped shadow-lg mt-4" id="roles" style="width:100%">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre de Rol</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $rol)
                        <tr>
                            <td>{{ $rol->id }}</td>
                            <td>{{ $rol->name }}</td>


                            <td>
                                <form action="{{ url('/roles/' . $rol->id) }}" method="post">
                                    <!--<a class="btn btn-warning btn-sm text-light" href="#">
                                                    <i class="fas fa-eye"></i> Ver </a>-->
                                    <a href="{{ route('roles.edit', $rol) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Editar<a>
                                            @csrf
                                            @method('delete')
                                            @can('editar rol')
                                            @endcan
                                            <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit"
                                                value="Borrar" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt" style="margin-right: 5px">Eliminar</i></button>
                                            @can('eliminar rol')
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
        $(document).ready(function() {
            $('#roles').DataTable();
        });
    </script>
@stop
