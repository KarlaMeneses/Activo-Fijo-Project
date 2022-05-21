@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('activosfijo.create')}}" class="btn btn-primary btb-sm">Crear Usuario</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="usuarios" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">codigo</th>
                        <th scope="col">nombre</th>
                        <th scope="col">detalle</th>
                        <th scope="col">fecha</th>
                        <th scope="col">estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($activosfijo as $activo)
                        <tr>
                            <td>{{$activo->id}}</td>
                            <td>{{$activo->codigo}}</td>
                            <td>{{$activo->nombre}}</td>
                            <td>{{$activo->detalle}}</td>
                            <td>{{$activo->fecha}}</td>
                            <td>{{$activo->estado}}</td>
                        
                            <td>
                                <form action="{{route('activosfijo.destroy', $activo)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('activosfijo.edit', $activo)}}" class="btn btn-primary btn-sm">Editar<a>
                                    <a href="{{route('activosfijo.show', $activo->id)}}" class="btn btn-success btn-sm">Ver<a>

                                    

                                        @can('editar usuario')
                                    @endcan
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar">Eliminar</button> 
                                    @can('eliminar usuario')
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
        $('#usuarios').DataTable();
        } );
    </script> 
@stop